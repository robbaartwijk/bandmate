<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

use App\Models\Act;
use App\Models\Genre;
use App\Models\Instrument;
use App\Models\Vacancy;

class HomeController extends Controller
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
    public function index()
    {
        $barchartuserregistrations = $this->createChartDataForMonthlyUsers();
        $barchartvacanciesperinstrument = $this->createVacancyChartData();
        $barchartactregistrations = $this->createChartDataForMonthlyActs();

        return view('dashboard', compact('barchartuserregistrations', 'barchartvacanciesperinstrument', 'barchartactregistrations'));
    }

    /**
     * Generates chart data for monthly uer registrations.
     *
     * This function creates and returns data that can be used to generate a chart
     * representing the number of users registered for each month.
     *
     * @return array The chart data for monthly user registrations.
     */
    function createChartDataForMonthlyUsers() {

        $start = Carbon::parse(User::min("created_at"));
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, "1 month", $end);

        $usersPerMonth = collect($period)->map(function ($date) {
            $endDate = $date->copy()->endOfMonth();

            return [
                "count" => User::where("created_at", "<=", $endDate)->count(),
                "month" => $endDate->format("Y-m-d")
            ];
        });

        $data = $usersPerMonth->pluck("count")->toArray();

        $labels = $usersPerMonth->pluck("month")->map(function ($date) {
            return Carbon::parse($date)->format("F");
        })->toArray();

        $chart = Chartjs::build()
            ->name("UserRegistrationsChart")
            ->type("bar")
            ->size(["width" => "75%", "height" => "50%"])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "User Registrations",
                    "backgroundColor" => "blue",
                    "borderColor" => "white",
                    "data" => $data
                ]
            ])
            ->options([
                'scales' => [
                    'xAxes' => [[
                        'type' => 'category',
                    ]],
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Monthly User Registrations'
                ]
            ]);

            return $chart;
    }


    /**
     * Generates chart data for vacancies per instrument
     *
     * This function creates and returns data that can be used to generate a chart
     * representing the number of vancaies per instrument.
     *
     * @return array The chart data for vacancies per instrument.
     */
    function createVacancyChartData() {

        $vacancies = Vacancy::get();

        foreach ($vacancies as $vacancy) {
            $vacancy->instrument = Instrument::find($vacancy->instrument_id);
        }

        $vacanciesPerInstrument = $vacancies->groupBy('instrument_id')->map(function ($group, $instrumentId) {
            return [
                "count" => $group->count(),
                "instrument" => $group->first()->instrument->name
            ];
        })->values();

        $data = $vacanciesPerInstrument->pluck("count")->toArray();
        $labels = $vacanciesPerInstrument->pluck("instrument")->toArray();

        $chart = Chartjs::build()
            ->name("VacanciesPerInstrument")
            ->type("bar")
            ->size(["width" => "75%", "height" => "50%"])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Vacancies per instrument",
                    "backgroundColor" => "blue",
                    "borderColor" => "white",
                    "data" => $data
                ]
            ])
            ->options([
                'scales' => [
                    'xAxes' => [[
                        'type' => 'category',
                    ]],
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Vacancies per instrument'
                ]
            ]);

            return $chart;
    }

    /**
     * Generates chart data for monthly act registrations.
     *
     * This function creates and returns data that can be used to generate a chart
     * representing the number of acts registered for each month.
     *
     * @return array The chart data for monthly act registrations.
     */
    function createChartDataForMonthlyActs() {

        $start = Carbon::parse(User::min("created_at"));
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, "1 month", $end);

        $actsPerMonth = collect($period)->map(function ($date) {
            $endDate = $date->copy()->endOfMonth();

            return [
                "count" => Act::where("created_at", "<=", $endDate)->count(),
                "month" => $endDate->format("Y-m-d")
            ];
        });

        $data = $actsPerMonth->pluck("count")->toArray();

        $labels = $actsPerMonth->pluck("month")->map(function ($date) {
            return Carbon::parse($date)->format("F");
        })->toArray();

        $chart = Chartjs::build()
            ->name("ActRegistrationsChart")
            ->type("doughnut")
            ->size(["width" => "75%", "height" => "50%"])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Act Registrations",
                    "backgroundColor" => "blue",
                    "borderColor" => "white",
                    "data" => $data
                ]
            ])
            ->options([
                'scales' => [
                    'xAxes' => [[
                        'type' => 'category',
                    ]],
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Monthly Acts Registrations'
                ]
            ]);

            return $chart;
    }

}
