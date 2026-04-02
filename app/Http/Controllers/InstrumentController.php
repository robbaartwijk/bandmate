<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstrumentRequest;
use App\Http\Requests\UpdateInstrumentRequest;
use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = in_array($request->input('sort'), ['name', 'type']) ? $request->input('sort') : 'name';

        $query = Instrument::query()->orderBy($sort);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('type', 'like', '%'.$search.'%');
            });
        }

        $instruments = $query->paginate(50);

        return view('instruments.index', compact('instruments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Instrument::class);

        return view('instruments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * FIX: Switched to StoreInstrumentRequest FormRequest so that $request->validated()
     * returns the actual validated data instead of an empty array (which happened
     * when validate() was called on a plain Request and validated() was then called).
     */
    public function store(StoreInstrumentRequest $request)
    {
        Instrument::create($request->validated());

        return redirect()->route('instruments.index')
            ->with('status', 'Instrument created successfully.');
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
        $this->authorize('update', $instrument);

        return view('instruments.edit', compact('instrument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * FIX: Switched to UpdateInstrumentRequest FormRequest so that $request->validated()
     * returns the actual validated data instead of an empty array, making the
     * update a no-op (bug was: validate() result was discarded, validated() returned []).
     */
    public function update(UpdateInstrumentRequest $request, Instrument $instrument)
    {
        $this->authorize('update', $instrument);

        $instrument->update($request->validated());

        return redirect()->route('instruments.index')
            ->with('status', 'Instrument updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instrument $instrument)
    {
        $this->authorize('delete', $instrument);

        $instrument->delete();

        return redirect()->route('instruments.index')
            ->with('status', 'Instrument deleted successfully');
    }
}