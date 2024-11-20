<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Instrument;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacanciesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('sort')) {
            $sort = request()->input('sort');
        } else {
            $sort = 'act_name';
        }

        $vacancies = Vacancy::all();

        foreach ($vacancies as $vacancy) {
            $user = User::find($vacancy->user_id);
            $vacancy->user_name = $user->name;

            $act = Act::find($vacancy->act_id);
            $vacancy->act_name = $act->name;

            $instrument = Instrument::find($vacancy->instrument_id);
            $vacancy->instrument_name = $instrument->name;

            $vacancy->description = substr($vacancy->description, 0, 35) . '...';
        }

        $vacancies = $vacancies->sortBy($sort);

        return view('vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $instruments = Instrument::all()->sortBy(['type', 'name']);

        return view('vacancies.create', compact('instruments'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
