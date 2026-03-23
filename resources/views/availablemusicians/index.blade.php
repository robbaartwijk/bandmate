@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Available musicians'), 'pageSlug' => 'availablemusicians'])

@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Available musicians</h2>
        <a href="{{ route('availablemusicians.create') }}" class="bm-btn bm-btn-primary bm-btn-sm">
            <i class="fas fa-plus"></i> Add listing
        </a>
    </div>
    <div class="bm-card-body">

        <div class="flex flex-wrap items-center gap-2 mb-4">
            @if(request()->has('private') && request()->private)
                <a href="{{ route('availablemusicians.index', ['private' => false]) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-globe"></i> Show all</a>
            @else
                <a href="{{ route('availablemusicians.index', ['private' => true]) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-user"></i> Show mine</a>
            @endif
            <form action="{{ route('availablemusicians.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <select name="selectrecords" class="bm-select text-sm py-1.5" style="width:130px;" onchange="this.form.submit()">
                    <option value="25"  {{ (!request()->selectrecords || request()->selectrecords == '25')  ? 'selected' : '' }}>25 musicians</option>
                    <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 musicians</option>
                    <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 musicians</option>
                </select>
                <input type="text" name="search" value="{{ request()->search }}" class="bm-input text-sm py-1.5" style="width:160px;" placeholder="Search...">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:180px;" onchange="this.form.submit()">
                    <option value="musician_name"   {{ request()->sort == 'musician_name'   ? 'selected' : '' }}>Sort by name</option>
                    <option value="instrument_name" {{ request()->sort == 'instrument_name' ? 'selected' : '' }}>Sort by instrument</option>
                    <option value="genre_name"      {{ request()->sort == 'genre_name'      ? 'selected' : '' }}>Sort by genre</option>
                    <option value="available_from"  {{ request()->sort == 'available_from'  ? 'selected' : '' }}>Sort by available from</option>
                    <option value="available_until" {{ request()->sort == 'available_until' ? 'selected' : '' }}>Sort by available until</option>
                    <option value="created_at"      {{ request()->sort == 'created_at'      ? 'selected' : '' }}>Sort by date added</option>
                </select>
                <button type="submit" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-search"></i></button>
            </form>
        </div>

        @if(session('status'))
        <div class="bm-alert bm-alert-success mb-4" id="status-alert"><i class="fas fa-check-circle"></i> {{ session('status') }}</div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        <div class="overflow-x-auto">
            <table class="bm-table">
                <thead><tr>
                    <th>Musician</th>
                    <th>Instrument</th>
                    <th class="hidden sm:table-cell">Genre</th>
                    <th class="hidden md:table-cell">Description</th>
                    <th class="hidden lg:table-cell">From</th>
                    <th class="hidden lg:table-cell">Until</th>
                    <th></th>
                </tr></thead>
                <tbody>
                    @foreach ($availablemusicians as $availablemusician)
                    <tr>
                        <td class="font-medium text-white/80">{{ $availablemusician->user->name }}</td>
                        <td>{{ $availablemusician->instrument->name }}</td>
                        <td class="hidden sm:table-cell">
                            <a href="{{ route('genres.show', $availablemusician->genre->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $availablemusician->genre->name }}</a>
                        </td>
                        <td class="hidden md:table-cell">
                            <a href="{{ route('availablemusicians.show', $availablemusician->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ Str::limit($availablemusician->description, 35) }}</a>
                        </td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $availablemusician->available_from }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $availablemusician->available_until }}</td>
                        <td class="whitespace-nowrap">
                            @if($user->is_admin || $user->id == $availablemusician->user_id)
                            <a href="{{ route('availablemusicians.edit', $availablemusician->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('availablemusicians.destroy', $availablemusician->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('Delete this listing?')) this.closest('form').submit()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mt-4">
            <span class="text-white/40 text-xs">{{ $availablemusicians->count() }} {{ $availablemusicians->count() == 1 ? 'musician' : 'musicians' }} found</span>
            {{ $availablemusicians->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links() }}
        </div>
    </div>
</div>
@endsection