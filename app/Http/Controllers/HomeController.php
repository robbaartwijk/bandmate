<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\User;
use App\Models\Genre;
use App\Models\Instrument;
use App\Models\Vacancy;
use App\Models\Availablemusician;
use App\Models\Rehearsalroom;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

use Illuminate\Http\Request;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $recentActs = $this->getRecentActs();
        $recentVacancies = $this->getRecentVacancies();
        $recentAvailablemusicians = $this->getRecentAvailablemusicians();
        $recentRehearsalrooms = $this->getRecentRehearsalrooms();

        return view('welcome' , compact(['recentActs', 'recentVacancies', 'recentAvailablemusicians', 'recentRehearsalrooms']));
    }

    public function getRecentActs()
    {
        $recentActs = Act::orderBy('created_at', 'desc')->with('genre')->take(5)->get();
        return $recentActs;
    }

    public function getRecentVacancies()
    {
        $recentVacancies = Vacancy::orderBy('created_at', 'desc')->with(['act', 'instrument'])->take(5)->get();
        foreach ($recentVacancies as $vacancy) {
            $vacancy->genre_name = Genre::find($vacancy->act->genre_id)->name;
            $vacancy->instrument_name = Instrument::find($vacancy->instrument_id)->name;
        }
        return $recentVacancies;
    }

    public function getRecentAvailablemusicians()
    {

        $recentAvailablemusicians = Availablemusician::orderBy('created_at', 'desc')->with(['user', 'instrument', 'genre'])->take(5)->get();
        return $recentAvailablemusicians;
    }

    public function getRecentRehearsalrooms()
    {
        $recentRehearsalrooms = Rehearsalroom::orderBy('created_at', 'desc')->take(5)->get();
        return $recentRehearsalrooms;
    }
}