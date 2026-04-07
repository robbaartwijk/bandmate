<?php
 
namespace App\Http\Controllers;
 
use App\Models\Act;
use App\Models\Instrument;
use App\Models\Vacancy;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use Illuminate\Http\Request;
use App\Services\NotificationService;
 
class VacancyController extends BaseController
{
    public function __construct(
        private readonly NotificationService $notificationService
        ) {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $select = $request->input('selectrecords') ?? 25;
        $sort = $request->input('sort') ?? 'act_name';
        $search = $request->input('search') ?? '';
        $private = $request->boolean('private') ?? false;
 
        $vacancies = Vacancy::with(['instrument', 'act', 'act.genre'])
            ->select('vacancies.*', 'instruments.name as instrument_name', 'acts.name as act_name', 'genres.name as genre_name')
            ->join('instruments', 'vacancies.instrument_id', '=', 'instruments.id')
            ->join('acts', 'vacancies.act_id', '=', 'acts.id')
            ->leftJoin('genres', 'acts.genre_id', '=', 'genres.id')
            ->when($request->filled('search'), function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('vacancies.description', 'like', "%{$search}%")
                      ->orWhere('instruments.name', 'like', "%{$search}%")
                      ->orWhere('acts.name', 'like', "%{$search}%");
                });
            })
            ->when($private, function ($query) {
                return $query->where('vacancies.user_id', '=', auth()->id());
            })
            ->when(true, function ($query) use ($sort) {
                return match ($sort) {
                    'instrument_name' => $query->orderBy('instruments.name'),
                    'genre_name'      => $query->orderBy('genres.name'),
                    'city'            => $query->orderBy('vacancies.city'),
                    'country'         => $query->orderBy('vacancies.country'),
                    'updated_at'      => $query->orderBy('vacancies.updated_at'),
                    default           => $query->orderBy('acts.name'),
                };
            })
            ->paginate($select)
            ->onEachSide(1);
 
        return view('vacancies.index', compact('vacancies'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Vacancy::class);
 
        $acts = auth()->user()->acts->sortBy('name');
        $instruments = Instrument::all()->sortBy(['type', 'name']);
 
        return view('vacancies.create', compact(['instruments', 'acts']));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyRequest $request)
    {
        $vacancy = new Vacancy;
        $vacancy->fill($request->validated());
        $vacancy->user_id = auth()->id();

        $vacancy->save();

        if ($request->hasFile('vacancypic')) {
            $vacancy->addMediaFromRequest('vacancypic')->toMediaCollection('images/VacancyPics');
        }

        $this->notificationService->dispatchModuleNotification(
            templateName: 'email_notification_vacancies',
            moduleColumn: 'email_notification_vacancies',
            variables: [
                'act_name'        => $vacancy->act->name,
                'instrument_name' => $vacancy->instrument->name,
                'vacancy_url'     => route('vacancies.show', $vacancy),
            ]
        );

        return redirect()
            ->route('vacancies.index')
            ->with('status', 'Vacancy created successfully.');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        $this->authorize('view', $vacancy);

        $vacancy->load('act.genre', 'instrument', 'user');

        $vacancy->user_name = $vacancy->user->name;
        $vacancy->act_name = $vacancy->act->name;
        $vacancy->instrument_name = $vacancy->instrument->name;

        return view('vacancies.show', compact('vacancy'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);
 
        $vacancy->user_name = $vacancy->user->name;
        $vacancy->act_name = $vacancy->act->name;

        $acts = Act::where('user_id', auth()->id())
            ->orWhere('id', $vacancy->act_id)
            ->orderBy('name')
            ->get();
        $instruments = Instrument::all()->sortBy(['type', 'name']);
        $vacancy->instrument_id = $vacancy->instrument->id;
 
        return view('vacancies.edit', compact('vacancy', 'instruments', 'acts'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        $vacancy->fill($request->validated());
        $vacancy->save();

        if ($request->hasFile('vacancypic')) {
            $vacancy->clearMediaCollection('images/VacancyPics');
            $vacancy->addMediaFromRequest('vacancypic')->toMediaCollection('images/VacancyPics');
        }

        return redirect()->route('vacancies.index')
            ->with('status', 'Vacancy updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        $this->authorize('delete', $vacancy);
 
        $vacancy->delete();
 
        return redirect()->route('vacancies.index')
            ->with('status', 'Vacancy deleted successfully');
    }
}