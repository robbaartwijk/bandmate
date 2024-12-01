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
    public function index(Request $request)
    {
        if ($request->has('sort')) {
            $sort = $request->input('sort');
        } else {
            $sort = 'name';
        }

        $query = Venue::query()->orderBy($sort);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('website', 'like', '%'.$search.'%')
                    ->orWhere('city', 'like', '%'.$search.'%');
            });
        }

        $venues = $query->get();

        return view('venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('venues.index')
            ->with('status', 'You are not authorized to add a venue.');
        };

        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'phone' => $request->phone ?? '',
            'email' => $request->email ?? '',
        ]);

        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'description' => 'required',
        ]);

        $venue = new Venue();

        $venue->user_id = Auth::user()->id;
        $venue->fill($request->all());
        $venue->save();
        return redirect()->route('venues.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        return view('venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('venues.index')
            ->with('status', 'You are not authorized to edit a venue.');
        };

        return view('venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venue $venue)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('venues.index')
            ->with('status', 'You are not authorized to update a venue.');
        };

        $request->merge([
            'phone' => $request->phone ?? '',
            'email' => $request->email ?? '',
        ]);

        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'description' => 'required',
        ]);



        $venue->update($request->all());

        return redirect()->route('venues.index')
            ->with('status', 'Venue updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('venues.index')
            ->with('status', 'You are not authorized to delete a venue.');
        };

        $venue->delete();

        return redirect()->route('venues.index')
            ->with('status', 'Venue deleted successfully');
    }
}
