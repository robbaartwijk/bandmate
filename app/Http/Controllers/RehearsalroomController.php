<?php

namespace App\Http\Controllers;

use App\Models\Rehearsalroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RehearsalroomController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort') ?? 'name';
        $select = $request->input('selectrecords') ?? 25;

        $query = Rehearsalroom::with('user')->orderBy($sort);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                ->orWhere('city', 'like', '%'.$search.'%')
                ->orWhere('country', 'like', '%'.$search.'%');
            });
        }

        if ($request->boolean('private')) {
            $query->where('user_id', Auth::user()->id);
        }

        $rehearsalrooms = $query->paginate($select)->onEachSide(1);

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

        $rehearsalroom = new Rehearsalroom;

        $rehearsalroom->user_id = Auth::user()->id;
        $rehearsalroom->fill($request->all());
        $rehearsalroom->fill($request->only([
            'name', 'address', 'zip', 'city', 'state', 'country', 'phone', 'email', 'website',
        ]));
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
        if (! $this->isAuthorized($rehearsalroom)) {
            return redirect()->route('rehearsalrooms.index')
                ->with('status', 'You are not authorized to edit this rehearsal room.');
        }

        return view('rehearsalrooms.edit', compact('rehearsalroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rehearsalroom $rehearsalroom)
    {
        if (! $this->isAuthorized($rehearsalroom)) {
            return redirect()->route('rehearsalrooms.index')
                ->with('status', 'You are not authorized to edit this rehearsal room.');
        }

        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $rehearsalroom->fill($request->only([
            'name', 'address', 'zip', 'city', 'state', 'country', 'phone', 'email', 'website', 'description'
        ]))->save();

        return redirect()->route('rehearsalrooms.index')
            ->with('status', 'Rehearsal room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rehearsalroom $rehearsalroom)
    {
        if (! $this->isAuthorized($rehearsalroom)) {
            return redirect()->route('rehearsalrooms.index')
                ->with('status', 'You are not authorized to delete this rehearsal room.');
        }

        $rehearsalroom->delete();

        return redirect()->route('rehearsalrooms.index')
            ->with('status', 'Rehearsal room deleted successfully');
    }

    /**
     * Check if the user is authorized to perform an action on the rehearsal room.
     */
    private function isAuthorized(Rehearsalroom $rehearsalroom)
    {
        return Auth::user()->is_admin || $rehearsalroom->user_id === Auth::user()->id;
    }
}
