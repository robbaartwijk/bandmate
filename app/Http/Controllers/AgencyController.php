<?php
 
namespace App\Http\Controllers;
 
use App\Models\Agency;
use Illuminate\Http\Request;
 
class AgencyController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort') ?? 'name';
        $select = $request->input('selectrecords') ?? 25;
 
        $query = Agency::with('user')->orderBy($sort);
 
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('country', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            });
        }
 
        if ($request->boolean('private')) {
            $query->where('user_id', auth()->id());
        }
 
        $agencies = $query->paginate($select)->onEachSide(1);
 
        return view('agencies.index', compact('agencies'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Agency::class);
 
        return view('agencies.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Agency::class);
 
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
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'soundcloud' => ['nullable', 'url'],
            'spotify' => ['nullable', 'url'],
        ]);
 
        $agency = new Agency;
        $agency->fill($request->validated());
        $agency->save();
 
        return redirect()->route('agencies.index')
            ->with('status', 'Agency created successfully.');
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
        $this->authorize('update', $agency);
 
        return view('agencies.edit', compact('agency'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agency $agency)
    {
        $this->authorize('update', $agency);
 
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
            'facebook' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'soundcloud' => ['nullable', 'url'],
            'spotify' => ['nullable', 'url'],
        ]);
 
        $agency->update($request->validated());
 
        return redirect()->route('agencies.index')
            ->with('status', 'Agency updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        $this->authorize('delete', $agency);
 
        $agency->delete();
 
        return redirect()->route('agencies.index')
            ->with('status', 'Agency deleted successfully');
    }
}
 