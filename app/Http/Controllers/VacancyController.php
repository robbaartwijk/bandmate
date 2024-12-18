<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Instrument;
use App\Models\Act;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $select = $request->input('selectrecords') ?? 25;
        $sort = $request->input('sort') ?? 'name';

        $query = Vacancy::with('user');

        if ($request->boolean('private')) {
            $query->where('user_id', Auth::user()->id);
        }

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($query) use ($search) {
                $query->where('description', 'like', "%{$search}%")
                    ->orWhere('created_at', 'like', "%{$search}%")
                    ->orWhere('updated_at', 'like', "%{$search}%");
            });
        }

        $vacancies = $query->paginate($select)->onEachSide(1);
        $vacancies->appends(['selectrecords' => $select]);

        foreach ($vacancies as $vacancy) {
            $vacancy->user_name = $vacancy->user->name;

            if (! $vacancy->act) {
                $vacancy->act_name = '* Act not found, may have been deleted *';
            } else {
                $vacancy->act_name = $vacancy->act->name;
            }
            
            $vacancy->instrument_name = Instrument::find($vacancy->instrument_id)->name;
        }

        return view('vacancies.index', compact('vacancies'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $acts = Auth::user()->acts->sortBy('name');
        $instruments = Instrument::all()->sortBy(['type', 'name']);

        return view('vacancies.create', compact(['instruments', 'acts']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'act_id' => 'required',
            'instrument_id' => 'required',
        ]);

        $vacancy = new Vacancy;
        $vacancy->fill($request->all());
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
        $user = User::find($vacancy->user_id);
        $vacancy->user_name = $user->name;

        $act = Act::find($vacancy->act_id);
        $vacancy->act_name = $act->name;

        $instrument = Instrument::find($vacancy->instrument_id);
        $vacancy->instrument_name = $instrument->name;

        return view('vacancies.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        if (!Auth::user()->is_admin && $vacancy->user_id !== Auth::user()->id) {
            return redirect()->route('vacancies.index')
                ->with('status', 'You are not authorized to edit this vacancy.');
        }

        $user = User::find($vacancy->user_id);
        $vacancy->user_name = $user->name;

        $act = Act::find($vacancy->act_id);
        $vacancy->act_name = $act->name;

        $acts = Auth::user()->acts->sortBy('name');
        
        $instruments = Instrument::all()->sortBy(['type', 'name']);

        $instrument = Instrument::find($vacancy->instrument_id);
        $vacancy->instrument_id = $instrument->id;

        return view('vacancies.edit', compact('vacancy', 'instruments', 'acts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        if (!Auth::user()->is_admin && $vacancy->user_id !== Auth::user()->id) {
            return redirect()->route('vacancies.index')
                ->with('status', 'You are not authorized to update this vacancy.');
        }

        $request->validate([
            'act_id' => 'required',
            'instrument_id' => 'required',
        ]);

        $vacancy->fill($request->all());
        if (! $request->filled('description')) {
            $vacancy->description = '';
        }

        $vacancy->save();

        return redirect()->route('vacancies.index')
            ->with('status', 'Vacancy updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        if (!Auth::user()->is_admin && $vacancy->user_id !== Auth::user()->id) {
            return redirect()->route('vacancies.index')
                ->with('status', 'You are not authorized to delete this vacancy.');
        }

        $vacancy->delete();

        return redirect()->route('vacancies.index')
            ->with('status', 'Vacancy deleted successfully');
    }

    /**
     * Check if the user is authorized to perform an action on the vacancy.
     */
    private function isAuthorized(Vacancy $vacancy)
    {
        return Auth::user()->is_admin || $vacancy->user_id === Auth::user()->id;
    }

}
