<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort') ?? 'name';

        $query = Agency::query()->orderBy($sort);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                ->orWhere('country', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            });
        }

        $agencies = $query->get();

        return view('agencies.index', compact('agencies'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('agencies.index')
            ->with('status', 'You are not authorized to add an agency.');
        };

        return view('agencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'soundcloud' => ['nullable', 'url'],
            'spotify' => ['nullable', 'url'],
        ]);
        
        $agency = new Agency();

        $agency->fill($request->all());
        $agency->save();
        return redirect()->route('agencies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        return view('agencies.show', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('agencies.index')
            ->with('status', 'You are not authorized to edit an agency.');
        };

        return view('agencies.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('acts.index')
            ->with('status', 'You are not authorized to update this agency.');
        };

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'soundcloud' => ['nullable', 'url'],
            'spotify' => ['nullable', 'url'],
        ]);

        $agency->update($request->all());

        return redirect()->route('agencies.index')
            ->with('status', 'Agency updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        if (!Auth::user()->is_admin) {
            return redirect()->route('agencies.index')
            ->with('status', 'You are not authorized to delete an agency.');
        };

        $agency->delete();

        return redirect()->route('agencies.index')
            ->with('status', 'Agency deleted successfully');
    }
}
