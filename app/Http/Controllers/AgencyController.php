<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Http\Requests\StoreAgencyRequest;
use App\Http\Requests\UpdateAgencyRequest;
use Illuminate\Http\Request;
use App\Services\NotificationService;

class AgencyController extends BaseController
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
        $allowedSorts = ['name', 'city', 'country', 'created_at', 'updated_at'];
        $sort = in_array($request->input('sort'), $allowedSorts) ? $request->input('sort') : 'name';
        $select = $request->input('selectrecords') ?? 25;

        $query = Agency::with('user', 'media')->orderBy($sort);

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
    public function store(StoreAgencyRequest $request)
    {
        $agency = new Agency;
        $agency->user_id = auth()->id();
        $agency->fill($request->validated());
        $agency->save();

        if ($request->hasFile('agencypic')) {
            $this->storeAgencyImage($request, $agency);
        }

        $this->notificationService->dispatchModuleNotification(
            templateName: 'email_notification_agencies',
            moduleColumn: 'email_notification_agencies',
            variables: [
                'agency_name' => $agency->name,
                'agency_city' => $agency->city,
                'agency_url'  => route('agencies.show', $agency),
            ]
         );

        return redirect()->route('agencies.index')
            ->with('status', 'Agency created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Agency $agency)
    {
        $this->authorize('view', $agency);

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
    public function update(UpdateAgencyRequest $request, Agency $agency)
    {
        $agency->update($request->validated());

        if ($request->hasFile('agencypic')) {
            $this->clearAgencyImage($agency);
            $this->storeAgencyImage($request, $agency);
        }

        return redirect()->route('agencies.index')
            ->with('status', 'Agency updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agency $agency)
    {
        $this->authorize('delete', $agency);

        $agency->clearMediaCollection('images/AgencyPics');

        $agency->delete();

        return redirect()->route('agencies.index')
            ->with('status', 'Agency deleted successfully');
    }

    /**
     * Store the uploaded agency image via Spatie Media Library.
     */
    public function storeAgencyImage(Request $request, Agency $agency): void
    {
        $agency->addMediaFromRequest('agencypic')
            ->toMediaCollection('images/AgencyPics');
    }

    /**
     * Remove the agency image media collection.
     */
    public function clearAgencyImage(Agency $agency): void
    {
        $agency->clearMediaCollection('images/AgencyPics');
    }
}
