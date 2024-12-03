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
    public function index(Request $request)
    {
        if ($request->has('sort')) {
            $sort = $request->input('sort');
        } else {
            $sort = 'name';
        }

        $query = Rehearsalroom::query()->orderBy($sort);

        if ($request->private == true) {
            $query->where('user_id', Auth::user()->id);
        }

        $rehearsalrooms = $query->get();

        if (request()->has('search')) {
            $search = request()->input('search');
            $rehearsalrooms = $rehearsalrooms->filter(function ($rehearsalroom) use ($search) {
                return (stripos($rehearsalroom->name, $search) !== false) ||
                    (stripos($rehearsalroom->city, $search) !== false) ||
                    (stripos($rehearsalroom->country, $search) !== false) ||
                    (stripos($rehearsalroom->created_at, $search) !== false) ||
                    (stripos($rehearsalroom->updated_at, $search) !== false); 
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
        ]);

        $rehearsalroom = new Rehearsalroom();

        $rehearsalroom->user_id = Auth::user()->id;
        $rehearsalroom->fill($request->all());

        $rehearsalroom->save();
        return redirect()->route('rehearsalrooms.index');
    }
 
    /**
     * Display the specified resource.
     */
    public function show(Rehearsalroom $rehearsalroom)
    {
        return view('rehearsalrooms.show', compact('rehearsalroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rehearsalroom $rehearsalroom)
    {
        if (!Auth::user()->is_admin && $rehearsalroom->user_id !== Auth::user()->id) {
            return redirect()->route('rehearsalrooms.index')
            ->with('status', 'You are not authorized to edit this rehearsal room.');
        };

        return view('rehearsalrooms.edit', compact('rehearsalroom'));
    } 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rehearsalroom $rehearsalroom)
    {
        if (!Auth::user()->is_admin && $rehearsalroom->user_id !== Auth::user()->id) {
            return redirect()->route('rehearsalrooms.index')
            ->with('status', 'You are not authorized to edit this rehearsal room.');
        };

        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        // dd($request->all());


        $rehearsalroom->update($request->all());

        return redirect()->route('rehearsalrooms.index')
            ->with('status', 'Rehearsal room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rehearsalroom $rehearsalroom)
    {
        if (!Auth::user()->is_admin && $rehearsalroom->user_id !== Auth::user()->id) {
            return redirect()->route('rehearsalrooms.index')
            ->with('status', 'You are not authorized to delete this rehearsal room.');
        };

        $rehearsalroom->delete();

        return redirect()->route('rehearsalrooms.index')
            ->with('status', 'Rehearsal room deleted successfully');
    }
}
