<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request = request();
        $query = $request->query();

        if ($request->has('sort')) {
            $sort = $request->input('sort');
        } else {
            $sort = 'name';
        }

        $agencies = Agency::all();

        if (request()->has('search')) {
            $search = request()->input('search');
            $agencies = $agencies->filter(function ($agency) use ($search) {
                return (stripos($agency->name, $search) !== false) ||
                    (stripos($agency->country, $search) !== false);
            });
        }

        $agencies = $agencies->sortBy($sort);

        $agencies->count = $agencies->count();

        return view('agencies.index', compact('agencies'));
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
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agency $agency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        //
    }
}
