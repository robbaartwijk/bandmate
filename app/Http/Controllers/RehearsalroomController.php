<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rehearsalroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RehearsalroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $query = $request->query();

        if (request()->has('sort')) {
            $sort = request()->input('sort');
        } else {
            $sort = 'name';
        }

        $rehearsalrooms = Rehearsalroom::all();

        if (request()->has('search')) {
            $search = request()->input('search');
            $rehearsalrooms = $rehearsalrooms->filter(function ($rehearsalroom) use ($search) {
                return (stripos($rehearsalroom->name, $search) !== false) ||
                    (stripos($rehearsalroom->city, $search) !== false);
            });
        }

        if (request()->has('sort')) {
            $rehearsalrooms = $rehearsalrooms->sortBy($sort);
        }

        $rehearsalrooms->count = $rehearsalrooms->count();

        return view('rehearsalrooms.index', compact('rehearsalrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rehearsalrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rehearsalroom = new Rehearsalroom();

        $rehearsalroom->user_id = Auth::user()->id;
        $rehearsalroom->fill($request->all());
        $rehearsalroom->save();
        return redirect()->route('rehearsalrooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(rehearsalroom $rehearsalroom)
    {
        return view('rehearsalrooms.show', compact('rehearsalroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rehearsalroom $rehearsalroom)
    {
        return view('rehearsalrooms.edit', compact('rehearsalroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rehearsalroom $rehearsalroom)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);

        $rehearsalroom->update($request->all());

        return redirect()->route('rehearsalrooms.index')
            ->with('success', 'Rehearsal room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rehearsalroom $rehearsalroom)
    {
        $rehearsalroom->delete();

        return redirect()->route('rehearsalrooms.index')
            ->with('success', 'Rehearsal room deleted successfully');
    }
}
