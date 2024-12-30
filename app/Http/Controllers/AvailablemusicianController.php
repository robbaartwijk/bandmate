<?php

namespace App\Http\Controllers;

use App\Models\Availablemusician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AvailablemusicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort') ?? 'musician_name';
        $select = $request->input('selectrecords') ?? 25;

        $query = $this->buildQuerySelection($request, $sort);
        $availablemusicians = $query->paginate($select)->onEachSide(1);

        return view('availablemusicians.index', compact(['availablemusicians']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $availablemusician = new Availablemusician;
        $availablemusician->instruments = Instrument::all();
        $availablemusician->genres = Genre::all();
        $availablemusician->user = Auth::user();

        return view('availablemusicians.create', compact('availablemusician'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'instrument_id' => 'required',
            'genre_id' => 'required',
        ]);

        $availablemusician = new Availablemusician;
        $availablemusician->fill($request->all());
        $availablemusician->user_id = Auth::user()->id;
        $availablemusician->description = $request->input('description');
        $availablemusician->available_from = $request->input('available_from');
        $availablemusician->available_until = $request->input('available_until');
        $availablemusician->created_at = now();
        $availablemusician->updated_at = now();
        $availablemusician->save();

        return redirect()
            ->route('availablemusicians.index')
            ->with('status', 'Available musician created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Availablemusician $availablemusician)
    {
        return view('availablemusicians.show', compact('availablemusician'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Availablemusician $availablemusician)
    {
        if (! Auth::user()->is_admin) {
            return redirect()->route('availablemusicians.index')
                ->with('status', 'You are not authorized to edit an avilable musician.');
        }

        $availablemusician->instruments = Instrument::all();
        $availablemusician->genres = Genre::all();
        $availablemusician->user = User::find($availablemusician->user_id);

        return view('availablemusicians.edit', compact('availablemusician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Availablemusician $availablemusician)
    {
        if (! Auth::user()->is_admin && $availablemusician->user_id !== Auth::user()->id) {
            return redirect()->route('availablemusicians.index')
                ->with('status', 'You are not authorized to update this available musician.');
        }

        $request->validate([
            'instrument_id' => 'required',
            'genre_id' => 'required',
        ]);

        $availablemusician->fill($request->all());
        $availablemusician->description = $request->input('description');
        $availablemusician->available_from = $request->input('available_from');
        $availablemusician->available_until = $request->input('available_until');
        $availablemusician->updated_at = now();

        $availablemusician->save();

        return redirect()->route('availablemusicians.index')
            ->with('status', 'Available musician updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Availablemusician $availablemusician)
    {
        if (! Auth::user()->is_admin && $availablemusician->user_id !== Auth::user()->id) {
            return redirect()->route('availablemusicians.index')
                ->with('status', 'You are not authorized to delete this available musician.');
        }

        $availablemusician->delete();

        return redirect()->route('availablemusicians.index')
            ->with('status', 'Available musician deleted successfully');
    }

    public function buildQuerySelection($request, $sort)
    {
        $query = Availablemusician::with(['genre', 'instrument', 'user']);

        $query = $this->buildQuerySelect($query);
        $query = $this->buildJoinParameters($query);
        $query = $this->buildSortParameters($query, $sort);
        $query = $this->buildSearchParameter($request, $query);
        $query = $this->buildPrivateParameter($request, $query);

        return $query;
    }

    public function buildQuerySelect($query)
    {        
        $query->select('availablemusicians.*', 'users.name as musician_name', 'instruments.name as instrument_name', 'genres.name as genre_name');

        return $query;
    }

    public function buildJoinParameters($query)
    {
        $query->join('users', 'availablemusicians.user_id', '=', 'users.id');
        $query->join('genres', 'availablemusicians.genre_id', '=', 'genres.id');
        $query->join('instruments', 'availablemusicians.instrument_id', '=', 'instruments.id');

        return $query;
    }

    public function buildSortParameters($query, $sort)
    {
        switch ($sort) {
            case 'description':
                $query->orderBy('availablemusicians.description');
                break;
            case 'genre_name':
                $query->orderBy('genres.name');
                break;
            case 'instrument_name':
                $query->orderBy('instruments.name');
                break;
            case 'musician_name':
                $query->orderBy('users.name');
                break;
            case 'available_from':
                $query->orderBy('available_from');
                break;
            case 'available_until':
                $query->orderBy('available_until');
                break;
            case 'created_at':
                $query->orderBy('created_at');
                break;
            case 'updated_at':
                $query->orderBy('updated_at');
                break;
        }

        return $query;
    }

    public function buildSearchParameter($request, $query)
    {
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('availablemusicians.description', 'like', '%'.$search.'%')
                    ->orWhere('users.name', 'like', '%'.$search.'%')
                    ->orWhere('instruments.name', 'like', '%'.$search.'%')
                    ->orWhere('genres.name', 'like', '%'.$search.'%');
            });
        }

        return $query;
    }

    public function buildPrivateParameter($request, $query)
    {
        if ($request->boolean('private')) {
            $query->where('user_id', Auth::user()->id);
        }

        return $query;
    }
}
