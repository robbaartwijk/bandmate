<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
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

        $genres = $query->paginate(50);

        return view('genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Genre::class);

        return view('genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * FIX: Switched to StoreGenreRequest FormRequest so that $request->validated()
     * returns the actual validated data instead of an empty array (which happened
     * when validate() was called on a plain Request and validated() was then called).
     */
    public function store(StoreGenreRequest $request)
    {
        Genre::create($request->validated());

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
        $this->authorize('update', $genre);

        return view('genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * FIX: Switched to UpdateGenreRequest FormRequest so that $request->validated()
     * returns the actual validated data instead of an empty array, making the
     * update a no-op (bug was: validate() result was discarded, validated() returned []).
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        $this->authorize('update', $genre);

        $genre->update($request->validated());

        return redirect()->route('genres.index')
            ->with('status', 'Genre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $this->authorize('delete', $genre);

        $genre->delete();

        return redirect()->route('genres.index')
            ->with('status', 'Genre deleted successfully');
    }
}