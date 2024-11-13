<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::all();

        return view('artists.index', compact('artists'));
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
    public function show(artists $artists)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(artists $artists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, artists $artists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(artists $artists)
    {
        //
    }
}
