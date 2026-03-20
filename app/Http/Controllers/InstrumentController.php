<?php
 
namespace App\Http\Controllers;
 
use App\Models\Instrument;
use Illuminate\Http\Request;
 
class InstrumentController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'name');
 
        $query = Instrument::query()->orderBy($sort);
 
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('type', 'like', '%'.$search.'%');
            });
        }
 
        $instruments = $query->get();
 
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
     */
    public function store(Request $request)
    {
        $this->authorize('create', Instrument::class);
 
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);
 
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
     */
    public function update(Request $request, Instrument $instrument)
    {
        $this->authorize('update', $instrument);
 
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);
 
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
 