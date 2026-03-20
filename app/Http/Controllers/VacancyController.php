<?php
 
namespace App\Http\Controllers;
 
use App\Models\Act;
use App\Models\Instrument;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 
class VacancyController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $select = $request->input('selectrecords') ?? 25;
        $sort = $request->input('sort') ?? 'act_name';
        $search = $request->input('search') ?? '';
        $private = $request->input('private') ?? false;
 
        $vacancies = Vacancy::with(['instrument', 'act'])
            ->select('vacancies.*', 'instruments.name as instrument_name', 'acts.name as act_name')
            ->join('instruments', 'vacancies.instrument_id', '=', 'instruments.id')
            ->join('acts', 'vacancies.act_id', '=', 'acts.id')
            ->where(function ($query) use ($search) {
                $query->where('vacancies.description', 'like', "%{$search}%")
                    ->orWhere('instruments.name', 'like', "%{$search}%")
                    ->orWhere('acts.name', 'like', "%{$search}%");
            })
            ->when($private, function ($query) {
                return $query->where('vacancies.user_id', '=', Auth::user()->id);
            })
            ->orderBy($sort, 'asc')
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
 
        $acts = Auth::user()->acts->sortBy('name');
        $instruments = Instrument::all()->sortBy(['type', 'name']);
 
        return view('vacancies.create', compact(['instruments', 'acts']));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Vacancy::class);
 
        $request->validate([
            'act_id' => 'required',
            'instrument_id' => 'required',
        ]);
 
        $vacancy = new Vacancy;
        $vacancy->fill($request->validated());
        $vacancy->user_id = Auth::user()->id;
        $vacancy->save();
 
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
 
        $acts = Auth::user()->acts->sortBy('name');
        $instruments = Instrument::all()->sortBy(['type', 'name']);
        $vacancy->instrument_id = $vacancy->instrument->id;
 
        return view('vacancies.edit', compact('vacancy', 'instruments', 'acts'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);
 
        $request->validate([
            'act_id' => 'required',
            'instrument_id' => 'required',
        ]);
 
        $vacancy->fill($request->validated());
        $vacancy->description = $request->input('description');
        $vacancy->save();
 
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
 