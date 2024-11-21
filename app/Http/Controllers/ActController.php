<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort') ?? 'name';

        $query = Act::with('genre')->orderBy($sort);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            });
        }

        $acts = $query->get();

        // dd($acts);

        return view('acts.index', compact('acts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all()->sortByDesc(['group', 'name']);

        return view('acts.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $act = new Act;

        $act->user_id = Auth::user()->id;
        $act->fill($request->all());

        $request->validate([
            'name' => 'required',
            'genre_id' => 'required',
            'rehearsal_room' => 'required',
            'number_of_members' => 'required',
            'active' => 'required',
            'website' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $rehearsal_room = $request->rehearsal_room == 'Yes' ? 1 : 0;
        $act->rehearsal_room = $rehearsal_room;

        $active = $request->active == 'yes' ? 1 : 0;
        $act->active = $active;

        $act->save();

        return redirect()->route('acts.index')
            ->with('status', 'Act created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Act $act)
    {
        $genre = Genre::find($act->genre_id);

        return view('acts.show', compact(['act', 'genre']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Act $act)
    {
        return view('acts.edit', compact('act'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Act $act)
    {
        $request->validate([
            'name' => 'required',
            'genre_id' => 'required',
            'rehearsal_room' => 'required',
            'number_of_members' => 'required',
            'active' => 'required',
            'website' => 'required',
            'description' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $rehearsal_room = $request->rehearsal_room == 'Yes' ? 1 : 0;
        $act->rehearsal_room = $rehearsal_room;

        $active = $request->active == 'yes' ? 1 : 0;
        $act->active = $active;

        $act->update($request->all());

        return redirect()->route('acts.index')
            ->with('status', 'Act updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Act $act)
    {
        $act->delete();

        return redirect()->route('acts.index')
            ->with('status', 'Act deleted successfully');
    }
}
