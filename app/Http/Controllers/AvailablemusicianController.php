<?php

namespace App\Http\Controllers;

use App\Models\Availablemusician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AvailablemusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort') ?? 'description';
        $select = $request->input('selectrecords') ?? 25;

        $query = Availablemusician::with(['genre', 'instrument', 'user']);

        if($sort == 'instrument_name') {
            $query->join('instruments', 'availablemusicians.instrument_id', '=', 'instruments.id')
                  ->select('availablemusicians.*')
                  ->orderBy('instruments.name');
        } else {
            $query->orderBy($sort);
        }

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('description', 'like', '%'.$search.'%');
            });
        }

        if ($request->boolean('private')) {
            $query->where('user_id', Auth::user()->id);
        }

        // dd($query);

        $availablemusicians = $query->paginate($select)->onEachSide(1);

        return view('availablemusicians.index', compact(['availablemusicians']));
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
    public function show(Availablemusician $availablemusician)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Availablemusician $availablemusician)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Availablemusician $availablemusician)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Availablemusician $availablemusician)
    {
        //
    }
}
