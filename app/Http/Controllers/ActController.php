<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\User;
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

        if ($request->private == true) {
            $query->where('user_id', Auth::user()->id);
        }

        $acts = $query->get();

        return view('acts.index', compact('acts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('acts.index')
            ->with('status', 'You are not authorized to add an agency.');
        };

        $genres = Genre::all()->sortByDesc('name')->sortBy('group');

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
            'number_of_members' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'soundcloud' => ['nullable', 'url'],
            'spotify' => ['nullable', 'url'],
        ]);

        $act->rehearsal_room = $request->rehearsal_room == 'on' ? 1 : 0;
        $act->active = $request->active == 'on' ? 1 : 0;

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
        if (!Auth::user()->is_admin && $act->user_id !== Auth::user()->id) {
            return redirect()->route('acts.index')
            ->with('status', 'You are not authorized to edit this act.');
        };

        $genres = Genre::all()->sortBy('name')->sortByDesc('group');

        return view('acts.edit', compact(['act', 'genres']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Act $act)
    {
        if (!Auth::user()->is_admin && $act->user_id !== Auth::user()->id) {
            return redirect()->route('acts.index')
                ->with('status', 'You are not authorized to update this act.');
        }

        $request->validate([
            'name' => 'required',
            'genre_id' => 'required',
            'number_of_members' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'soundcloud' => ['nullable', 'url'],
            'spotify' => ['nullable', 'url'],
        ]);

        $act->fill($request->all());

        $act->rehearsal_room = $request->rehearsal_room == 'on' ? 1 : 0;
        $act->active = $request->active == 'on' ? 1 : 0;

        $act->update();
        
        return redirect()->route('acts.index')
            ->with('status', 'Act updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Act $act)
    {
        if (!Auth::user()->is_admin && $act->user_id !== Auth::user()->id) {
            return redirect()->route('acts.index')
                ->with('status', 'You are not authorized to delete this act.');
        }

        $vacancies = $act->vacancy;
        foreach ($vacancies as $vacancy) {
            $vacancy->delete();
        }
        $act->delete();

        return redirect()->route('acts.index')
            ->with('status', 'Act deleted successfully');
    }
}
