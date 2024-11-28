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
        $barchartvacanciesperinstrument = $this->createChartDataForVacanciesPerInstrument();

        return view('dashboard', compact('barchartuserregistrations', 'barchartvacanciesperinstrument'));

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
            ->size(["width" => "75%", "height" => "20%"])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "User Registrations",
                    "backgroundColor" => "darkblue",
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
    function createChartDataForVacanciesPerInstrument() {

        $start = Carbon::parse(Vacancy::min("created_at"));
        
        $vacanciesPerInstrument = collect(Vacancy::all())->map(function ($vacancy) {
            $instrument = Instrument::find($vacancy->instrument_id);
            return [
                "count" => Vacancy::where('instrument_id', $vacancy->instrument_id)->count(),
                "instrument" => $instrument->name
            ];
        });

        $data = $vacanciesPerInstrument->pluck("count")->toArray();
        $labels = $vacanciesPerInstrument->pluck("instrument")->toArray();

        $chart = Chartjs::build()
            ->name("Vacancies per instrument")
            ->type("bar")
            ->size(["width" => "75%", "height" => "20%"])
            ->labels($labels)
            ->datasets([
                [
                    "label" => "Vacancies per instrument",
                    "backgroundColor" => "darkblue",
                    "borderColor" => "white",
                    "data" => $data
                ]
            ])
            ->options([
                'scales' => [
                    'xAxes' => [[
                        'type' => 'time',
                        'time' => [
                            'unit' => 'month',
                            'min' => $start->format("Y-m-d"),
                            'tooltipFormat' => 'YYYY-MM-DD',
                        ],
                    ]],
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Vacancies per instrument'
                ]
            ]);

            return $chart;
    }

}
