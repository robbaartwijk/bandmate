<?php
 
namespace App\Http\Controllers;
 
use App\Models\Act;
use App\Models\Availablemusician;
use App\Models\Rehearsalroom;
use App\Models\Vacancy;
use Illuminate\Http\Request;
 
class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    /**
     * Show the application dashboard.
     */
    public function dashboard(Request $request): \Illuminate\View\View
    {
        $recentActs = $this->getRecentActs();
        $recentVacancies = $this->getRecentVacancies();
        $recentAvailablemusicians = $this->getRecentAvailablemusicians();
        $recentRehearsalrooms = $this->getRecentRehearsalrooms();

        return view('dashboard', compact([
            'recentActs',
            'recentVacancies',
            'recentAvailablemusicians',
            'recentRehearsalrooms',
        ]));
    }

    /**
     * Show the home/welcome page.
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
        // Eager load act.genre to avoid N+1 — genre_name and instrument_name
        // are accessible via relationships without extra queries
        return Vacancy::with(['act.genre', 'instrument'])->latest()->take(5)->get();
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