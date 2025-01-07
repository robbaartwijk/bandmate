<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Instrument;
use App\Models\User;
use App\Models\Vacancy;
use App\Models\AvailableMusician;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;

class StatisticController extends BaseController
{
    /**
     * Generates chart data for monthly uer registrations.
     *
     * This function creates and returns data that can be used to generate a chart
     * representing the number of users registered for each month.
     *
     * @return array The chart data for monthly user registrations.
     */
    public function chart1()
    {
        $start = Carbon::parse(User::min('created_at'));
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, '1 month', $end);

        $usersPerMonth = collect($period)->map(function ($date) {
            $endDate = $date->copy()->endOfMonth();

            return [
                'count' => User::where('created_at', '<=', $endDate)->count(),
                'month' => $endDate->format('Y-m-d'),
            ];
        });

        $data = $usersPerMonth->pluck('count')->toArray();

        $labels = $usersPerMonth->pluck('month')->map(function ($date) {
            return Carbon::parse($date)->format('F');
        })->toArray();

        $chartuserregistrations = Chartjs::build()
            ->name('UserRegistrationsChart')
            ->type('line')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([
                [
                    'label' => 'Registered Users',
                    'backgroundColor' => [
                        'blue',
                        'red',
                        'green',
                        'yellow',
                        'purple',
                        'orange',
                        'brown',
                        'grey',
                        'cyan',
                        'lime',
                    ],
                    'borderColor' => 'white',
                    'data' => $data,
                ],

            ])
            ->options([
                'plugins' => [
                    'datalabels' => [
                        'color' => '#FFCE56',
                    ],
                    'colors' => [
                        'forceOverride' => true,
                        'enabled' => false,
                    ],
                ],

            ])
            ->options([
                'scales' => [
                    'myScale' => [
                        'type' => 'logarithmic',
                        'position' => 'right',
                        'ticks' => [
                            'min' => 1,
                            'max' => 1000,
                        ],
                    ],
                ],
            ])

            ->options([
                'plugins' => [
                    'legend' => [
                        'labels' => [
                            'fontColor' => 'white',
                        ],
                        'display' => true,
                        'labels' => [
                            'color' => 'white',
                        ],
                    ],
                    'colors' => [
                        'forceOverride' => true,
                        'enabled' => false,
                    ],
                ],
                'scales' => [
                    'y' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                        'grid' => ['color' => 'grey'],
                    ],
                    'x' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                    ],
                ],
                'xAxes' => [
                    'type' => 'category',
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Vacancies per instrument',
                    'fontsize' => '60',
                ],
            ]);

        return view('statistics.chart1', compact('chartuserregistrations'));
    }

    /**
     * Generates chart data for vacancies per instrument
     *
     * This function creates and returns data that can be used to generate a chart
     * representing the number of vancaies per instrument.
     *
     * @return array The chart data for vacancies per instrument.
     */
    public function chart2()
    {
        $vacancies = Vacancy::get();

        foreach ($vacancies as $vacancy) {
            $vacancy->instrument = Instrument::find($vacancy->instrument_id);
        }

        $vacanciesPerInstrument = $vacancies->groupBy('instrument_id')->map(function ($group, $instrumentId) {
            return [
                'count' => $group->count(),
                'instrument' => $group->first()->instrument->name,
            ];
        })->values();

        $vacanciesPerInstrument = $vacanciesPerInstrument->sortBy('instrument')->values();
        
        $data = $vacanciesPerInstrument->pluck('count')->toArray();
        $labels = $vacanciesPerInstrument->pluck('instrument')->toArray();
        
        $chartvacanciesperinstrument = Chartjs::build()
            ->name('VacanciesPerInstrument')
            ->type('bar')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([
                [
                    'backgroundColor' => [
                        'blue',
                        'red',
                        'green',
                        'yellow',
                        'purple',
                        'orange',
                        'brown',
                        'grey',
                        'cyan',
                        'lime',
                    ],
                    'label' => 'Vacancies for instrument',
                    'borderColor' => 'white',
                    'data' => $data,
                ],
            ])
            ->options([
                'plugins' => [
                    'legend' => [
                        'labels' => [
                            'fontColor' => 'white',
                        ],
                        'display' => true,
                        'labels' => [
                            'color' => 'white',
                        ],
                    ],
                    'colors' => [
                        'forceOverride' => true,
                        'enabled' => false,
                    ],
                ],
                'scales' => [
                    'y' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                        'grid' => ['color' => 'grey'],
                    ],
                    'x' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                    ],
                ],
                'xAxes' => [
                    'type' => 'category',
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Vacancies per instrument',
                    'fontsize' => '60',
                ],
            ]);

        return view('statistics.chart2', compact('chartvacanciesperinstrument'));
    }

    /**
     * Generates chart data for monthly act registrations.
     *
     * This function creates and returns data that can be used to generate a chart
     * representing the number of acts registered for each month.
     *
     * @return array The chart data for monthly act registrations.
     */
    public function chart3()
    {

        $start = Carbon::parse(User::min('created_at'));
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, '1 month', $end);

        $actsPerMonth = collect($period)->map(function ($date) {
            $endDate = $date->copy()->endOfMonth();

            return [
                'count' => Act::where('created_at', '<=', $endDate)->count(),
                'month' => $endDate->format('Y-m-d'),
            ];
        });

        $data = $actsPerMonth->pluck('count')->toArray();

        $labels = $actsPerMonth->pluck('month')->map(function ($date) {
            return Carbon::parse($date)->format('F');
        })->toArray();

        $chartactregistrations = Chartjs::build()
            ->name('ActRegistrationsChart')
            ->type('line')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([
                [
                    'backgroundColor' => [
                        'blue',
                        'red',
                        'green',
                        'yellow',
                        'purple',
                        'orange',
                        'brown',
                        'grey',
                        'cyan',
                        'magenta',
                        'lime',
                    ],
                    'label' => 'Act Registrations',
                    'borderColor' => 'white',
                    'data' => $data,
                ],
            ])
            ->options([
                'plugins' => [
                    'legend' => [
                        'labels' => [
                            'fontColor' => 'white',
                        ],
                        'display' => true,
                        'labels' => [
                            'color' => 'white',
                        ],
                    ],
                    'colors' => [
                        'forceOverride' => true,
                        'enabled' => false,
                    ],
                ],
                'scales' => [
                    'y' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                        'grid' => ['color' => 'grey'],
                    ],
                    'x' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                    ],
                ],
                'xAxes' => [
                    'type' => 'category',
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Vacancies per instrument',
                    'fontsize' => '60',
                ],
            ]);

        return view('statistics.chart3', compact('chartactregistrations'));
    }

    /**
     * Generates chart data for available musicians
     *
     * This function creates and returns data that can be used to generate a chart
     * representing the number of available musicians registered for each month.
     *
     * @return array The chart data for monthly available musicians registrations.
     */
    public function chart4()
    {
        $start = Carbon::parse(User::min('created_at'));
        $end = Carbon::now();
        $period = CarbonPeriod::create($start, '1 month', $end);

        $availablemusiciansPerMonth = collect($period)->map(function ($date) {
            $endDate = $date->copy()->endOfMonth();

            return [
                'count' => Act::where('created_at', '<=', $endDate)->count(),
                'month' => $endDate->format('Y-m-d'),
            ];
        });

        $data = $availablemusiciansPerMonth->pluck('count')->toArray();

        $labels = $availablemusiciansPerMonth->pluck('month')->map(function ($date) {
            return Carbon::parse($date)->format('F');
        })->toArray();

        $chartavailablemusiciansregistrations = Chartjs::build()
            ->name('AvailablemusiciansRegistrationsChart')
            ->type('bar')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([
                [
                    'backgroundColor' => [
                        'blue',
                        'red',
                        'green',
                        'yellow',
                        'purple',
                        'orange',
                        'brown',
                        'grey',
                        'cyan',
                        'magenta',
                        'lime',
                    ],
                    'label' => 'Available musicians Registrations',
                    'borderColor' => 'white',
                    'data' => $data,
                ],
            ])
            ->options([
                'plugins' => [
                    'legend' => [
                        'labels' => [
                            'fontColor' => 'white',
                        ],
                        'display' => true,
                        'labels' => [
                            'color' => 'white',
                        ],
                    ],
                    'colors' => [
                        'forceOverride' => true,
                        'enabled' => false,
                    ],
                ],
                'scales' => [
                    'y' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                        'grid' => ['color' => 'grey'],
                    ],
                    'x' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                    ],
                ],
                'xAxes' => [
                    'type' => 'category',
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Available musicians',
                    'fontsize' => '60',
                ],
            ]);

        return view('statistics.chart4', compact('chartavailablemusiciansregistrations'));
    }

    /**
     * Generates chart data for available musicians per instrument
     *
     * This function creates and returns data that can be used to generate a chart
     * representing the number of available musicians per instrument.
     *
     * @return array The chart data for available musicians per instrument.
     */
    public function chart5()
    {
        $availablemusicians = Availablemusician::get();

        foreach ($availablemusicians as $availablemusician) {
            $availablemusician->instrument = Instrument::find($availablemusician->instrument_id);
        }

        $availablemusiciansPerInstrument = $availablemusicians->groupBy('instrument_id')->map(function ($group, $instrumentId) {
            return [
                'count' => $group->count(),
                'instrument' => $group->first()->instrument->name,
            ];
        })->values();

        $availablemusiciansPerInstrument =  $availablemusiciansPerInstrument->sortBy('instrument')->values();
        
        $data =  $availablemusiciansPerInstrument->pluck('count')->toArray();
        $labels =  $availablemusiciansPerInstrument->pluck('instrument')->toArray();
        
        $chartavailablemusiciansperinstrument = Chartjs::build()
            ->name('AvailablemusiciansPerInstrument')
            ->type('bar')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([
                [
                    'backgroundColor' => [
                        'blue',
                        'red',
                        'green',
                        'yellow',
                        'purple',
                        'orange',
                        'brown',
                        'grey',
                        'cyan',
                        'lime',
                    ],
                    'label' => 'Available musicians per instrument',
                    'borderColor' => 'white',
                    'data' => $data,
                ],
            ])
            ->options([
                'plugins' => [
                    'legend' => [
                        'labels' => [
                            'fontColor' => 'white',
                        ],
                        'display' => true,
                        'labels' => [
                            'color' => 'white',
                        ],
                    ],
                    'colors' => [
                        'forceOverride' => true,
                        'enabled' => false,
                    ],
                ],
                'scales' => [
                    'y' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                        'grid' => ['color' => 'grey'],
                    ],
                    'x' => [
                        'ticks' => ['color' => 'white', 'beginAtZero' => true],
                    ],
                ],
                'xAxes' => [
                    'type' => 'category',
                ],
                'title' => [
                    'display' => true,
                    'text' => 'Available musicians per instrument',
                    'fontsize' => '60',
                ],
            ]);

        return view('statistics.chart5', compact('chartavailablemusiciansperinstrument'));
    }
}
