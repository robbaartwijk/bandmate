<?php

namespace App\Http\Controllers;

use App\Models\Act;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort') ?? 'name';

        $query = Act::with('genre')->orderBy($sort);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            });
        }

        if ($request->boolean('private')) {
            $query->where('user_id', Auth::user()->id);
        }

        $acts = $query->get();

        return view('acts.index', compact('acts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::orderBy('group', 'desc')->orderBy('name')->get();

        return view('acts.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $act = new Act;

        $act->user_id = Auth::user()->id;
        $act->fill($request->all());

        $request->validate([
            'name' => 'required',
            'genre_id' => 'required',
            'number_of_members' => 'required',
            'email' => ['required', 'email'],
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'soundcloud' => ['nullable', 'url'],
            'spotify' => ['nullable', 'url'],
        ]);

        $act->rehearsal_room = $request->rehearsal_room === 'on' ? 1 : 0;
        $act->active = $request->active === 'on' ? 1 : 0;

        $act->save();

        if ($request->hasFile('ActPic')) {
            $this->storeActImage($request, $act);
        }

        return redirect()->route('acts.index')
            ->with('status', 'Act created successfully.');
    }

    /**
     * Store a newly created image resource in storage.
     */
    public function storeActImage(Request $request, Act $act)
    {
        $currentUserId = Auth::user()->id;

        $folder = $currentUserId . '/ActPics' . '/' . $act->id;

        $path = storage_path('/app/public/uploads/'.$folder);

        $file = $request->file('ActPic');

        $filename = $file->getClientOriginalName();

        if ($request->hasFile('ActPic')) {
            $file->move($path, $filename);
        }

        if (isset($folder)) {

            $folder = $folder . '/' . $filename;
            $act->addMedia(storage_path('app/public/uploads/' . $folder))->toMediaCollection('images/ActPics');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Act $act)
    {
        $currentUserId = Auth::user()->id;
        
        $genre = Genre::find($act->genre_id);

        $actImage = $act->getFirstMedia($currentUserId . '/ActPics');

        // $actImage = $act->getFirstMedia('uploads/' . $act->id . '/ActPics');
        
        // dd($actImage);

        $act->image = $actImage->getUrl(); 
        $act->imageFullUrl = $actImage->getFullUrl(); 
        $act->imagePath = $actImage->getPath(); 
        
        dd($act);
        
        return view('acts.show', compact(['act', 'genre']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Act $act)
    {
        if (! Auth::user()->is_admin && $act->user_id !== Auth::user()->id) {
            return redirect()->route('acts.index')
                ->with('status', 'You are not authorized to edit this act.');
        }

        $genres = Genre::orderBy('group')->orderByDesc('name')->get();

        return view('acts.edit', compact(['act', 'genres']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Act $act)
    {
        if (! Auth::user()->is_admin && $act->user_id !== Auth::user()->id) {
            return redirect()->route('acts.index')
                ->with('status', 'You are not authorized to update this act.');
        }

        $request->validate([
            'name' => 'required',
            'genre_id' => 'required',
            'number_of_members' => 'required',
            'email' => 'required', 'email',
            'website' => ['nullable', 'url'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
            'soundcloud' => ['nullable', 'url'],
            'spotify' => ['nullable', 'url'],
        ]);

        $act->fill($request->all());

        $act->rehearsal_room = $request->rehearsal_room === 'on' ? 1 : 0;
        $act->active = $request->active === 'on' ? 1 : 0;

        $act->update();

        return redirect()->route('acts.index')
            ->with('status', 'Act updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Act $act)
    {
        if (! Auth::user()->is_admin && $act->user_id !== Auth::user()->id) {
            return redirect()->route('acts.index')
                ->with('status', 'You are not authorized to delete this act.');
        }

        $vacancies = $act->vacancy;
        foreach ($vacancies as $vacancy) {
            $vacancy->delete();
        }
        $act->delete();

        return redirect()->route('acts.index')
            ->with('status', 'Act deleted successfully');
    }
}
