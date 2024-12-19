<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort') ?? 'name';
        $select = $request->input('selectrecords') ?? 25;

        $query = Venue::orderBy($sort);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            });
        }

        if ($request->boolean('private')) {
            $query->where('user_id', Auth::user()->id);
        }

        $venues = $query->paginate($select)->onEachSide(1);

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
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'website' => ['nullable', 'url'],
            'phone' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'email' => 'email',
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
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'website' => ['nullable', 'url'],
            'phone' => ['regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'email' => 'email',
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
