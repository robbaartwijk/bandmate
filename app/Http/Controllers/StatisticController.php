<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Availablemusician;
use App\Models\User;
use App\Models\Vacancy;
use Carbon\Carbon;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Illuminate\Support\Facades\DB;

class StatisticController extends BaseController
{
    // -------------------------------------------------------------------------
    // Shared chart options
    // -------------------------------------------------------------------------

    /**
     * Base Chart.js options shared by every chart (axes colours, legend, etc.).
     */
    private function baseOptions(string $title): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'labels'  => ['color' => 'white'],
                ],
                'colors' => ['forceOverride' => true, 'enabled' => false],
            ],
            'scales' => [
                'y' => [
                    'ticks' => ['color' => 'white', 'beginAtZero' => true],
                    'grid'  => ['color' => 'grey'],
                ],
                'x' => [
                    'ticks' => ['color' => 'white', 'beginAtZero' => true],
                ],
            ],
            'xAxes' => ['type' => 'category'],
            'title' => [
                'display'  => true,
                'text'     => $title,
                'fontsize' => '60',
            ],
        ];
    }

    private array $palette = [
        'blue', 'red', 'green', 'yellow', 'purple',
        'orange', 'brown', 'grey', 'cyan', 'lime',
    ];

    // -------------------------------------------------------------------------
    // Shared helpers
    // -------------------------------------------------------------------------

    /**
     * Return new-registrations-per-month for any model, as a
     * year-month-keyed collection: ['2024-11' => 3, '2024-12' => 7, ...].
     *
     * A single GROUP BY query replaces the previous loop of COUNT(*) queries.
     */
    private function countPerMonth(string $model): \Illuminate\Support\Collection
    {
        return $model::query()
            ->select(
                DB::raw('YEAR(created_at)  AS year'),
                DB::raw('MONTH(created_at) AS month'),
                DB::raw('COUNT(*)          AS total')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->keyBy(fn ($row) => sprintf('%04d-%02d', $row->year, $row->month));
    }

    /**
     * Build a continuous month sequence from the first record to today,
     * filling any gaps with zero, and return [$labels, $data] ready for Chart.js.
     *
     * @param  \Illuminate\Support\Collection  $counts  keyed by 'YYYY-MM'
     */
    private function buildMonthSeries(\Illuminate\Support\Collection $counts): array
    {
        if ($counts->isEmpty()) {
            return [[], []];
        }

        $start = Carbon::createFromFormat('Y-m', $counts->keys()->first())->startOfMonth();
        $end   = Carbon::now()->startOfMonth();

        $labels = [];
        $data   = [];

        for ($date = $start->copy(); $date->lte($end); $date->addMonth()) {
            $key      = $date->format('Y-m');
            $labels[] = $date->format('F Y');
            $data[]   = (int) ($counts->get($key)?->total ?? 0);
        }

        return [$labels, $data];
    }

    // -------------------------------------------------------------------------
    // Chart 1 — cumulative user registrations per month
    // -------------------------------------------------------------------------

    public function chart1()
    {
        $counts = $this->countPerMonth(User::class);
        [$labels, $data] = $this->buildMonthSeries($counts);

        $chartuserregistrations = Chartjs::build()
            ->name('UserRegistrationsChart')
            ->type('line')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([[
                'label'           => 'New registrations',
                'backgroundColor' => $this->palette,
                'borderColor'     => 'white',
                'data'            => $data,
            ]])
            ->options($this->baseOptions('User registrations per month'));

        return view('statistics.chart1', compact('chartuserregistrations'));
    }

    // -------------------------------------------------------------------------
    // Chart 2 — vacancies per instrument
    // -------------------------------------------------------------------------

    public function chart2()
    {
        // Single query: join instruments so we get the name in one round-trip,
        // count at the DB level, and sort alphabetically there too.
        $rows = Vacancy::query()
            ->select(
                'instruments.name AS instrument',
                DB::raw('COUNT(*) AS total')
            )
            ->join('instruments', 'vacancies.instrument_id', '=', 'instruments.id')
            ->groupBy('instruments.id', 'instruments.name')
            ->orderBy('instruments.name')
            ->get();

        $labels = $rows->pluck('instrument')->toArray();
        $data   = $rows->pluck('total')->map(fn ($v) => (int) $v)->toArray();

        $chartvacanciesperinstrument = Chartjs::build()
            ->name('VacanciesPerInstrument')
            ->type('bar')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([[
                'label'           => 'Vacancies for instrument',
                'backgroundColor' => $this->palette,
                'borderColor'     => 'white',
                'data'            => $data,
            ]])
            ->options($this->baseOptions('Vacancies per instrument'));

        return view('statistics.chart2', compact('chartvacanciesperinstrument'));
    }

    // -------------------------------------------------------------------------
    // Chart 3 — act registrations per month
    // -------------------------------------------------------------------------

    public function chart3()
    {
        $counts = $this->countPerMonth(Act::class);
        [$labels, $data] = $this->buildMonthSeries($counts);

        $chartactregistrations = Chartjs::build()
            ->name('ActRegistrationsChart')
            ->type('line')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([[
                'label'           => 'Act registrations',
                'backgroundColor' => $this->palette,
                'borderColor'     => 'white',
                'data'            => $data,
            ]])
            ->options($this->baseOptions('Act registrations per month'));

        return view('statistics.chart3', compact('chartactregistrations'));
    }

    // -------------------------------------------------------------------------
    // Chart 4 — available musician registrations per month
    // -------------------------------------------------------------------------

    public function chart4()
    {
        $counts = $this->countPerMonth(Availablemusician::class);
        [$labels, $data] = $this->buildMonthSeries($counts);

        $chartavailablemusiciansregistrations = Chartjs::build()
            ->name('AvailablemusiciansRegistrationsChart')
            ->type('bar')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([[
                'label'           => 'Available musicians registered',
                'backgroundColor' => $this->palette,
                'borderColor'     => 'white',
                'data'            => $data,
            ]])
            ->options($this->baseOptions('Available musicians per month'));

        return view('statistics.chart4', compact('chartavailablemusiciansregistrations'));
    }

    // -------------------------------------------------------------------------
    // Chart 5 — available musicians per instrument
    // -------------------------------------------------------------------------

    public function chart5()
    {
        // Same pattern as chart2: single join + groupBy query.
        $rows = Availablemusician::query()
            ->select(
                'instruments.name AS instrument',
                DB::raw('COUNT(*) AS total')
            )
            ->join('instruments', 'availablemusicians.instrument_id', '=', 'instruments.id')
            ->groupBy('instruments.id', 'instruments.name')
            ->orderBy('instruments.name')
            ->get();

        $labels = $rows->pluck('instrument')->toArray();
        $data   = $rows->pluck('total')->map(fn ($v) => (int) $v)->toArray();

        $chartavailablemusiciansperinstrument = Chartjs::build()
            ->name('AvailablemusiciansPerInstrument')
            ->type('bar')
            ->size(['width' => '75%', 'height' => '75%'])
            ->labels($labels)
            ->datasets([[
                'label'           => 'Available musicians per instrument',
                'backgroundColor' => $this->palette,
                'borderColor'     => 'white',
                'data'            => $data,
            ]])
            ->options($this->baseOptions('Available musicians per instrument'));

        return view('statistics.chart5', compact('chartavailablemusiciansperinstrument'));
    }
}