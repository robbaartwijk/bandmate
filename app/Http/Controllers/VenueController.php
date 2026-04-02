<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Services\NotificationService;

class VenueController extends BaseController
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
        // Whitelist allowed sort columns to prevent SQL injection via orderBy()
        $allowedSorts = ['name', 'city', 'country', 'capacity', 'created_at', 'updated_at'];
        $sort = in_array($request->input('sort'), $allowedSorts) ? $request->input('sort') : 'name';
        $select = $request->input('selectrecords') ?? 25;

        $query = Venue::with('media')->orderBy($sort);

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%'.$search.'%')
                    ->orWhere('description', 'like', '%'.$search.'%');
            });
        }

        if ($request->boolean('private')) {
            $query->where('user_id', auth()->id());
        }

        $venues = $query->paginate($select)->onEachSide(1);

        return view('venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Venue::class);

        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVenueRequest $request)
    {
        $venue = new Venue;
        $venue->user_id = auth()->id();
        $venue->fill($request->validated());
        $venue->save();

        if ($request->hasFile('venuepic')) {
            $this->storeVenueImage($request, $venue);
        }

        $this->notificationService->dispatchModuleNotification(
            templateName: 'email_notification_venues',
            moduleColumn: 'email_notification_venues',
            variables: [
                'venue_name' => $venue->name,
                'venue_city' => $venue->city,
                'venue_url'  => route('venues.show', $venue),
            ],
        );

        return redirect()->route('venues.index')
            ->with('status', 'Venue created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venue $venue)
    {
        $this->authorize('view', $venue);    // ← add this line
        $venue->image = $venue->getFirstMedia('images/VenuePics');
        return view('venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
    {
        $this->authorize('update', $venue);

        return view('venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVenueRequest $request, Venue $venue)
    {
        $venue->fill($request->validated())->save();

        if ($request->hasFile('venuepic')) {
            $this->clearVenueImage($venue);
            $this->storeVenueImage($request, $venue);
        }

        return redirect()->route('venues.show', $venue)
            ->with('status', 'Venue updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        $this->authorize('delete', $venue);

        $venue->clearMediaCollection('images/VenuePics');
        $venue->delete();

        return redirect()->route('venues.index')
            ->with('status', 'Venue deleted successfully');
    }

    /**
     * Store the uploaded venue image via Spatie Media Library.
     */
    public function storeVenueImage(Request $request, Venue $venue): void
    {
        $venue->addMediaFromRequest('venuepic')
            ->toMediaCollection('images/VenuePics');
    }

    /**
     * Remove the venue image media collection.
     */
    public function clearVenueImage(Venue $venue): void
    {
        $venue->clearMediaCollection('images/VenuePics');
    }
}