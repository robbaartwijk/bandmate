<?php
 
namespace App\Http\Controllers;
 
use App\Http\Requests\StoreActRequest;
use App\Http\Requests\UpdateActRequest;
use App\Models\Act;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Services\NotificationService;
 
class ActController extends BaseController
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
 
        $query = $this->buildQuerySelection($request, $sort);
 
        $acts = $query->paginate($select)->onEachSide(1);
 
        return view('acts.index', compact(['acts']));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Act::class);
 
        $genres = Genre::orderBy('group', 'desc')->orderBy('name')->get();
 
        return view('acts.create', compact('genres'));
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActRequest $request)
{
        $act = new Act;
        $act->user_id = auth()->id();
        $act->fill($request->validated());

        $act->rehearsal_room = $request->rehearsal_room === 'on' ? 1 : 0;
        $act->active = $request->active === 'on' ? 1 : 0;
        $act->youtubedemo = str_replace('watch?v=', 'embed/', $request->youtubedemo);

        $act->save();

        if ($request->hasFile('actpic')) {
            $this->storeActImage($request, $act);
        }

        $template = \App\Models\EmailTemplate::where('name', 'email_notification_acts')
            ->where('status', 'active')
            ->first();

        $recipients = \App\Models\User::where('email_notification_acts', true)
            ->orWhere('email_notification_all', true)
            ->whereNotNull('email')
            ->get(['email', 'name']);

        $this->notificationService->dispatchModuleNotification(
            templateName: 'email_notification_acts',
            moduleColumn: 'email_notification_acts',
            variables: [
                'act_name' => $act->name,
                'act_genre' => $act->genre?->name ?? '',
                'act_url'  => route('acts.show', $act),
            ]
        );

    return redirect()->route('acts.show', $act)->withStatus('Act added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Act $act)
    {
        $this->authorize('view', $act);
 
        $genre = $act->genre;
 
        $act->image = $act->getFirstMedia('images/ActPics');
 
        return view('acts.show', compact(['act', 'genre']));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Act $act)
    {
        $this->authorize('update', $act);
 
        $genres = Genre::orderBy('group')->orderByDesc('name')->get();
 
        return view('acts.edit', compact(['act', 'genres']));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActRequest $request, Act $act)
    {
        // Authorization is handled by UpdateActRequest::authorize()

        $act->fill($request->validated());
 
        $act->rehearsal_room = $request->rehearsal_room === 'on' ? 1 : 0;
        $act->active = $request->active === 'on' ? 1 : 0;
        $act->youtubedemo = str_replace('watch?v=', 'embed/', $request->youtubedemo);
 
        if ($request->hasFile('actpic')) {
            $this->clearActImage($act);
            $this->storeActImage($request, $act);
        }
 
        $act->update();
 
        return redirect()->route('acts.show', $act)->withStatus('Act updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Act $act)
    {
        $this->authorize('delete', $act);
 
        $act->clearMediaCollection('images/ActPics');
 
        foreach ($act->vacancy as $vacancy) {
            $vacancy->delete();
        }
 
        $act->delete();
 
        return redirect()->route('acts.index')
            ->with('status', 'Act deleted successfully');
    }
 
    /**
     * Store a newly created image resource in storage.
     */
    public function storeActImage(Request $request, Act $act): void
    {
        $act->addMediaFromRequest('actpic')->toMediaCollection('images/ActPics');
    }
 
    /**
     * Remove the specified image resource from storage.
     */
    public function clearActImage(Act $act): void
    {
        $act->clearMediaCollection('images/ActPics');
    }
 
    public function buildQuerySelection($request, $sort)
    {
        $query = Act::with(['genre']);
 
        $query = $this->buildQuerySelect($query);
        $query = $this->buildJoinParameters($query);
        $query = $this->buildSortParameters($query, $sort);
        $query = $this->buildSearchParameter($request, $query);
        $query = $this->buildPrivateParameter($request, $query);
 
        return $query;
    }
 
    public function buildQuerySelect($query)
    {
        $query->select('acts.*', 'genres.name as genre_name');
 
        return $query;
    }
 
    public function buildJoinParameters($query)
    {
        $query = Act::with(['genre'])
            ->select('acts.*', 'genres.name as genre_name')
            ->join('genres', 'acts.genre_id', '=', 'genres.id');
 
        return $query;
    }
 
    public function buildSortParameters($query, $sort)
    {
        switch ($sort) {
            case 'name':
                $query->orderBy('name');
                break;
            case 'description':
                $query->orderBy('description');
                break;
            case 'genre_name':
                $query->orderBy('genres.name');
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
                $q->where('acts.description', 'like', '%'.$search.'%')
                  ->orWhere('acts.name', 'like', '%'.$search.'%')
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