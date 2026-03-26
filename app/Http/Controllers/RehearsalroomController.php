<?php

namespace App\Http\Controllers;

use App\Models\Rehearsalroom;
use Illuminate\Http\Request;
use App\Services\NotificationService;

class RehearsalroomController extends BaseController
{
    public function __construct(
        private readonly NotificationService $notificationService
    ) {
        parent::__construct();
    }

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
            $query->where('user_id', auth()->id());
        }

        $rehearsalrooms = $query->paginate($select)->onEachSide(1);

        return view('rehearsalrooms.index', compact('rehearsalrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Rehearsalroom::class);

        return view('rehearsalrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Rehearsalroom::class);

        $request->validate([
            'name'              => 'required',
            'city'              => 'required',
            'country'           => 'required',
            'price'             => ['nullable', 'numeric', 'min:0'],
            'website'           => ['nullable', 'url'],
            'rehearsalroompic'  => ['nullable', 'image', 'max:4096'],
        ]);

        $rehearsalroom = new Rehearsalroom;
        $rehearsalroom->user_id = auth()->id();
        $rehearsalroom->fill($request->only([
            'name', 'city', 'country', 'price', 'description',
        ]));
        $rehearsalroom->save();

        if ($request->hasFile('rehearsalroompic')) {
            $this->storeRehearsalroomImage($request, $rehearsalroom);
        }

        $this->notificationService->dispatchModuleNotification(
            templateName: 'email_notification_rehearsalrooms',
            moduleColumn: 'email_notification_rehearsalrooms',
            variables: [
                'rehearsalroom_name' => $rehearsalroom->name,
                'rehearsalroom_city' => $rehearsalroom->city,
                'rehearsalroom_url'  => route('rehearsalrooms.show', $rehearsalroom),
            ]
        );

        return redirect()->route('rehearsalrooms.index')
            ->with('status', 'Rehearsal room created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rehearsalroom $rehearsalroom)
    {
        $this->authorize('view', $rehearsalroom);

        $rehearsalroom->image = $rehearsalroom->getFirstMedia('images/RehearsalroomPics');

        return view('rehearsalrooms.show', compact('rehearsalroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rehearsalroom $rehearsalroom)
    {
        $this->authorize('update', $rehearsalroom);

        return view('rehearsalrooms.edit', compact('rehearsalroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rehearsalroom $rehearsalroom)
    {
        $this->authorize('update', $rehearsalroom);

        $request->validate([
            'name'              => 'required',
            'city'              => 'required',
            'country'           => 'required',
            'price'             => ['nullable', 'numeric', 'min:0'],
            'website'           => ['nullable', 'url'],
            'rehearsalroompic'  => ['nullable', 'image', 'max:4096'],
        ]);

        $rehearsalroom->fill($request->only([
            'name', 'city', 'country', 'price', 'description',
        ]))->save();

        if ($request->hasFile('rehearsalroompic')) {
            $this->clearRehearsalroomImage($rehearsalroom);
            $this->storeRehearsalroomImage($request, $rehearsalroom);
        }

        return redirect()->route('rehearsalrooms.show', $rehearsalroom)
            ->with('status', 'Rehearsal room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rehearsalroom $rehearsalroom)
    {
        $this->authorize('delete', $rehearsalroom);

        $rehearsalroom->clearMediaCollection('images/RehearsalroomPics');
        $rehearsalroom->delete();

        return redirect()->route('rehearsalrooms.index')
            ->with('status', 'Rehearsal room deleted successfully');
    }

    /**
     * Store a newly created image resource in storage.
     */
    public function storeRehearsalroomImage(Request $request, Rehearsalroom $rehearsalroom): void
    {
        $rehearsalroom->addMediaFromRequest('rehearsalroompic')
            ->toMediaCollection('images/RehearsalroomPics');
    }

    /**
     * Remove the specified image resource from storage.
     */
    public function clearRehearsalroomImage(Rehearsalroom $rehearsalroom): void
    {
        $rehearsalroom->clearMediaCollection('images/RehearsalroomPics');
    }
}