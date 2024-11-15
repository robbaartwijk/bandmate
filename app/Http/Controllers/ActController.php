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
        $acts = Act::all()->sortBy('name');;
        return view('acts.index', compact('acts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(bands $bands)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bands $bands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bands $bands)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bands $bands)
    {
        //
    }
}
