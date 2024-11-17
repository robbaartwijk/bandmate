<?php

namespace App\Http\Controllers;

use App\Models\Act;
use Illuminate\Http\Request;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acts = Act::all()->sortBy('name');
        return view('acts.index', compact('acts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('acts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
            'phone' => 'required'
        ]);

        Act::create($request->all());

        return redirect()->route('acts.index')
            ->with('success', 'Act created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Act $act)
    {
        return view('acts.show', compact('act'));
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
            'number_of_members' => 'required',
            'genre_id' => 'required',
            'decscription' => 'required'
        ]);

        $act->update($request->all());

        return redirect()->route('acts.index')
            ->with('success', 'Act updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Act $act)
    {
        $act->delete();

        return redirect()->route('acts.index')
            ->with('success', 'Act deleted successfully');
    }
}
