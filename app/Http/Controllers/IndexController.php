<?php
 
namespace App\Http\Controllers;
 
use App\Models\Act;
use App\Models\Availablemusician;
use App\Models\Rehearsalroom;
use App\Models\Vacancy;
use Illuminate\Http\Request;
 
class IndexController extends BaseController
{
    /**
     * Display the public landing page.
     */
    public function index(Request $request): \Illuminate\View\View
    {
        $recentActs = $this->getRecentActs();
        $recentVacancies = $this->getRecentVacancies();
        $recentAvailablemusicians = $this->getRecentAvailablemusicians();
        $recentRehearsalrooms = $this->getRecentRehearsalrooms();
 
        return view('welcome', compact([
            'recentActs',
            'recentVacancies',
            'recentAvailablemusicians',
            'recentRehearsalrooms',
        ]));
    }
 
    private function getRecentActs()
    {
        return Act::with('genre')->latest()->take(5)->get();
    }
 
    private function getRecentVacancies()
    {
        // Use withTrashed() on the act and instrument relationships so that
        // vacancies whose act or instrument has been soft-deleted still show
        // their name instead of rendering as null/empty.
        return Vacancy::with([
            'act'        => fn ($q) => $q->withTrashed(),
            'act.genre'  => fn ($q) => $q->withTrashed(),
            'instrument' => fn ($q) => $q->withTrashed(),
        ])->latest()->take(5)->get();
    }
 
    private function getRecentAvailablemusicians()
    {
        return Availablemusician::with(['user', 'instrument', 'genre'])->latest()->take(5)->get();
    }
 
    private function getRecentRehearsalrooms()
    {
        return Rehearsalroom::latest()->take(5)->get();
    }
}