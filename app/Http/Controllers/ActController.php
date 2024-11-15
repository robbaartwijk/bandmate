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
        ]);

        Act::create($request->all());

        return redirect()->route('acts.index')
            ->with('success', 'Act created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(act $act)
    {
        return view('acts.show', compact('act'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(acts $acts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, acts $acts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(acts $acts)
    {
        //
    }
}
