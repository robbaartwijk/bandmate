<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruments = Instrument::all()->sortBy(['type', 'name']);

        $instruments->count = $instruments->count();

        return view('instruments.index', compact('instruments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instruments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        Instrument::create($request->all());

        return redirect()->route('instruments.index')
            ->with('success', 'Instrument created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Instrument $instrument)
    {
        return view('instruments.show', compact('instrument'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instrument $instrument)
    {
        return view('instruments.edit', compact('instrument'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instrument $instrument)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $instrument->update($request->all());

        return redirect()->route('instruments.index')
            ->with('success', 'Instrument updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instrument $instrument)
    {
        $instrument->delete();

        return redirect()->route('instruments.index')
            ->with('success', 'Instrument deleted successfully');
    }
}
