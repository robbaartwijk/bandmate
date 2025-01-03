<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('sort')) {
            $sort = request()->input('sort');
        } else {
            $sort = 'name';
        }

        $query = Genre::query()->orderBy($sort);

        if (request()->has('search')) {
            $search = request()->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('group', 'like', '%'.$search.'%');
            });
        }
    
        $genres = $query->get();

        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'group' => 'required',
        ]);

        Genre::create($request->all());

        return redirect()->route('genres.index')
            ->with('status', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return view('genres.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'name' => 'required',
            'group' => 'required',
        ]);

        $genre->update($request->all());

        return redirect()->route('genres.index')
            ->with('status', 'Genre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index')
            ->with('status', 'Genre deleted successfully');
    }
}
