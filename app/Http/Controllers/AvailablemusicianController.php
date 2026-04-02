<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\StoreAvailablemusicianRequest;
use App\Http\Requests\UpdateAvailablemusicianRequest;
use App\Models\Availablemusician;
use App\Models\Genre;
use App\Models\Instrument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\NotificationService;

class AvailablemusicianController extends BaseController
{
    public function __construct(
        private readonly NotificationService $notificationService
    ) {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $sort = $request->input('sort') ?? 'musician_name';
        $select = $request->input('selectrecords') ?? 25;
 
        $query = $this->buildQuerySelection($request, $sort);
        $availablemusicians = $query->paginate($select)->onEachSide(1);
 
        return view('availablemusicians.index', compact(['availablemusicians']));
    }
 
    public function create()
    {
        $this->authorize('create', Availablemusician::class);
 
        $availablemusician = new Availablemusician;
        $availablemusician->instruments = Instrument::all();
        $availablemusician->genres = Genre::orderBy('group', 'desc')->orderBy('name')->get();
        $availablemusician->user = Auth::user();
 
        return view('availablemusicians.create', compact('availablemusician'));
    }
 
    /**
     * FIX: Added null-safe operators (?->) on instrument and genre relationships
     * before accessing ->name. If either is missing (e.g. soft-deleted), the original
     * code would fatal with "Attempt to read property on null".
     */
    public function store(StoreAvailablemusicianRequest $request)
    {
        $availablemusician = new Availablemusician;
        $availablemusician->fill($request->validated());
        $availablemusician->user_id = auth()->id();
        $availablemusician->save();

        if ($request->hasFile('availablemusicianpic')) {
            $availablemusician->addMediaFromRequest('availablemusicianpic')
                ->toMediaCollection('images/AvailablemusicianPics');
        }

        $this->notificationService->dispatchModuleNotification(
            templateName: 'email_notification_availablemusicians',
            moduleColumn: 'email_notification_availablemusicians',
            variables: [
                'musician_name'   => auth()->user()->name,
                'instrument_name' => $availablemusician->instrument?->name ?? '',
                'genre_name'      => $availablemusician->genre?->name ?? '',
                'musician_url'    => route('availablemusicians.show', $availablemusician),
            ]
        );

        return redirect()
            ->route('availablemusicians.index')
            ->with('status', 'Available musician created successfully.');
    }
 
    public function show(Availablemusician $availablemusician)
    {
        $this->authorize('view', $availablemusician);
 
        $availablemusician->image = $availablemusician->getFirstMedia('images/AvailablemusicianPics');
 
        return view('availablemusicians.show', compact('availablemusician'));
    }
 
    public function edit(Availablemusician $availablemusician)
    {
        $this->authorize('update', $availablemusician);
 
        $availablemusician->instruments = Instrument::all();
        $availablemusician->genres = Genre::orderBy('group', 'desc')->orderBy('name')->get();
        $availablemusician->user = $availablemusician->user;
 
        return view('availablemusicians.edit', compact('availablemusician'));
    }
 
    public function update(UpdateAvailablemusicianRequest $request, Availablemusician $availablemusician)
    {
        $availablemusician->fill($request->validated());
        $availablemusician->save();
 
        if ($request->hasFile('availablemusicianpic')) {
            $this->clearAvailablemusicianImage($availablemusician);
            $this->storeAvailablemusicianImage($request, $availablemusician);
        }
 
        return redirect()->route('availablemusicians.index')
            ->with('status', 'Available musician updated successfully');
    }
 
    public function destroy(Availablemusician $availablemusician)
    {
        $this->authorize('delete', $availablemusician);
 
        $availablemusician->clearMediaCollection('images/AvailablemusicianPics');
        $availablemusician->delete();
 
        return redirect()->route('availablemusicians.index')
            ->with('status', 'Available musician deleted successfully');
    }
 
    public function storeAvailablemusicianImage(Request $request, Availablemusician $availablemusician): void
    {
        $availablemusician->addMediaFromRequest('availablemusicianpic')
            ->toMediaCollection('images/AvailablemusicianPics');
    }
 
    public function clearAvailablemusicianImage(Availablemusician $availablemusician): void
    {
        $availablemusician->clearMediaCollection('images/AvailablemusicianPics');
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
 
    /**
     * FIX: Changed INNER JOINs on genres and instruments to LEFT JOINs.
     * The original INNER JOINs silently excluded any availablemusician whose
     * genre_id or instrument_id pointed to a soft-deleted (or missing) row,
     * causing listings to disappear from the index without any error.
     */
    public function buildJoinParameters($query)
    {
        $query->join('users', 'availablemusicians.user_id', '=', 'users.id')
            ->leftJoin('genres', 'availablemusicians.genre_id', '=', 'genres.id')
            ->leftJoin('instruments', 'availablemusicians.instrument_id', '=', 'instruments.id');
        return $query;
    }
 
    public function buildSortParameters($query, $sort)
    {
        switch ($sort) {
            case 'description':    $query->orderBy('availablemusicians.description'); break;
            case 'genre_name':     $query->orderBy('genres.name'); break;
            case 'instrument_name':$query->orderBy('instruments.name'); break;
            case 'city_name':      $query->orderBy('availablemusicians.city'); break;
            case 'country_name':   $query->orderBy('availablemusicians.country'); break;
            case 'musician_name':  $query->orderBy('users.name'); break;
            case 'available_from': $query->orderBy('available_from'); break;
            case 'available_until':$query->orderBy('available_until'); break;
            case 'created_at':     $query->orderBy('created_at'); break;
            case 'updated_at':     $query->orderBy('updated_at'); break;
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
                    ->orWhere('availablemusicians.city', 'like', '%'.$search.'%')
                    ->orWhere('availablemusicians.country', 'like', '%'.$search.'%')
                    ->orWhere('genres.name', 'like', '%'.$search.'%');
            });
        }
        return $query;
    }
 
    public function buildPrivateParameter($request, $query)
    {
        if ($request->boolean('private')) {
            $query->where('user_id', auth()->id());
        }
        return $query;
    }
}