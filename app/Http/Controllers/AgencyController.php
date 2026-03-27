<?php

namespace App\Http\Controllers;

use App\Models\Agency;
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
        // Whitelist allowed sort columns to prevent SQL injection via orderBy()
        $allowedSorts = ['name', 'city', 'country', 'created_at', 'updated_at'];
        $sort = in_array($request->input('sort'), $allowedSorts) ? $request->input('sort') : 'name';
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

        // FIX: validation now matches the form fields (address/zip/state/phone/email are not
        // in the create form so they cannot be required here — they are nullable instead)
        $request->validate([
            'name'        => 'required',
            'city'        => 'required',
            'country'     => 'required',
            'description' => 'nullable|string',
            'address'     => 'nullable|string',
            'zip'         => 'nullable|string',
            'state'       => 'nullable|string',
            'phone'       => 'nullable|string',
            'email'       => 'nullable|email',
            'website'     => ['nullable', 'url'],
            'facebook'    => ['nullable', 'url'],
            'twitter'     => ['nullable', 'url'],
            'instagram'   => ['nullable', 'url'],
            'youtube'     => ['nullable', 'url'],
            'soundcloud'  => ['nullable', 'url'],
            'spotify'     => ['nullable', 'url'],
        ]);

        $agency = new Agency;
        $agency->user_id = auth()->id();
        $agency->fill($request->only([
            'name', 'city', 'country', 'description',
            'address', 'zip', 'state', 'phone', 'email',
            'website', 'facebook', 'twitter',
            'instagram', 'youtube', 'soundcloud', 'spotify',
        ]));
        $agency->save();

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
     * Note: intentionally has no authorization check — agencies are publicly visible
     * to all authenticated users, consistent with how the index listing works.
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
            'name'        => 'required',
            'city'        => 'required',
            'country'     => 'required',
            'description' => 'nullable|string',
            'address'     => 'nullable|string',
            'zip'         => 'nullable|string',
            'state'       => 'nullable|string',
            'phone'       => 'nullable|string',
            'email'       => 'nullable|email',
            'website'     => ['nullable', 'url'],
            'facebook'    => ['nullable', 'url'],
            'twitter'     => ['nullable', 'url'],
            'instagram'   => ['nullable', 'url'],
            'youtube'     => ['nullable', 'url'],
            'soundcloud'  => ['nullable', 'url'],
            'spotify'     => ['nullable', 'url'],
        ]);

        $agency->update($request->only([
            'name', 'city', 'country', 'description',
            'address', 'zip', 'state', 'phone', 'email',
            'website', 'facebook', 'twitter',
            'instagram', 'youtube', 'soundcloud', 'spotify',
        ]));

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