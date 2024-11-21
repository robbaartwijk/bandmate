<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

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
        return view('agencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        return view('agencies.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'description' => 'required',
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
        $agency->delete();

        return redirect()->route('agencies.index')
            ->with('status', 'Agency deleted successfully');
    }
}
