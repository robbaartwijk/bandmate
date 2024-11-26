<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Instrument;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Request as FacadeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Vacancy::with(['user', 'act']);

        $vacancies = $query->get();

        foreach ($vacancies as $vacancy) {
            $vacancy->user_name = $vacancy->user->name;
            $vacancy->act_name = $vacancy->act->name;
            $vacancy->instrument_name = Instrument::find($vacancy->instrument_id)->name;
        }

        if (request()->has('sort')) {
            $sort = request()->input('sort');
        } else {
            $sort = 'act_name';
        }
        $vacancies = $vacancies->sortBy($sort);

        if (request()->has('search')) {
            $search = request()->input('search');
            $vacancies = $vacancies->filter(function ($vacancy) use ($search) {
                return stripos($vacancy->user_name, $search) !== false
                || stripos($vacancy->act_name, $search) !== false
                || stripos($vacancy->instrument_name, $search) !== false;
            });
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
        $vacancy = new Vacancy;


        $vacancy->act_id = $request->input('act_id');
        $vacancy->user_id = Auth::user()->id;
        $vacancy->instrument_id = $request->input('instrument_id');

        $request->validate([
            'act_id' => 'required',
            'instrument_id' => 'required',
            'description' => 'required',
        ]);

        $vacancy->fill($request->all());

        // dd($vacancy);

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

        $user = User::find($vacancy->user_id);
        $vacancy->user_name = $user->name;

        $act = Act::find($vacancy->act_id);
        $vacancy->act_name = $act->name;

        $instrument = Instrument::find($vacancy->instrument_id);
        $vacancy->instrument_name = $instrument->name;

        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacancy $vacancy)
    {

        $vacancy->update($request->all());

        return redirect()->route('vacancies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {

        $vacancy->delete();

        return redirect()->route('vacancies.index');
    }
}
