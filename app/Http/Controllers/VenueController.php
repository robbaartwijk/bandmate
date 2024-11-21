<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $query = $request->query();

        if ($request->has('sort')) {
            $sort = $request->input('sort');
        } else {
            $sort = 'name';
        }

        $venues = Venue::all();

        if (request()->has('search')) {
            $search = request()->input('search');
            $venues = $venues->filter(function ($venue) use ($search) {
                return (stripos($venue->name, $search) !== false) ||
                    (stripos($venue->city, $search) !== false);
            });
        }

        $venues = $venues->sortBy($sort);

        $venues->count = $venues->count();

        return view('venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $venue = new Venue();

        $venue->user_id = Auth::user()->id;
        $venue->fill($request->all());
        $venue->save();
        return redirect()->route('venues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(venue $venue)
    {
        return view('venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(venue $venue)
    {
        return view('venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, venue $venue)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);

        $venue->update($request->all());

        return redirect()->route('venues.index')
            ->with('status', 'Venue updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(venue $venue)
    {
        $venue->delete();

        return redirect()->route('venues.index')
            ->with('status', 'Venue deleted successfully');
    }
}
