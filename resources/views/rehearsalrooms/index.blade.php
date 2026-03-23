@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Rehearsal rooms</h2>
        <a href="{{ route('rehearsalrooms.create') }}" class="bm-btn bm-btn-primary bm-btn-sm">
            <i class="fas fa-plus"></i> Add rehearsal room
        </a>
    </div>

    <div class="bm-card-body">

        {{-- Toolbar --}}
        <div class="flex flex-wrap items-center gap-2 mb-4">
            @if(request()->has('private') && request()->private)
                <a href="{{ route('rehearsalrooms.index', ['private' => false]) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                    <i class="fas fa-globe"></i> Show all rehearsal rooms
                </a>
            @else
                <a href="{{ route('rehearsalrooms.index', ['private' => true]) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                    <i class="fas fa-user"></i> Show only my rehearsal rooms
                </a>
            @endif

            <form action="{{ route('rehearsalrooms.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <select name="selectrecords" class="bm-select text-sm py-1.5" style="width:110px;" onchange="this.form.submit()">
                    <option value="25"  {{ (!request()->selectrecords || request()->selectrecords == '25')  ? 'selected' : '' }}>25 rooms</option>
                    <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 rooms</option>
                    <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 rooms</option>
                </select>
                <input type="text" name="search" value="{{ request()->search }}"
                       class="bm-input text-sm py-1.5" style="width:160px;" placeholder="Search...">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:185px;" onchange="this.form.submit()">
                    <option value="name"       {{ request()->sort == 'name'       ? 'selected' : '' }}>Sort by name</option>
                    <option value="city"       {{ request()->sort == 'city'       ? 'selected' : '' }}>Sort by city</option>
                    <option value="country"    {{ request()->sort == 'country'    ? 'selected' : '' }}>Sort by country</option>
                    <option value="created_at" {{ request()->sort == 'created_at' ? 'selected' : '' }}>Sort by date added</option>
                    <option value="updated_at" {{ request()->sort == 'updated_at' ? 'selected' : '' }}>Sort by last update</option>
                </select>
                <button type="submit" class="bm-btn bm-btn-secondary bm-btn-sm">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        {{-- Flash --}}
        @if (session('status'))
        <div class="bm-alert bm-alert-success" id="status-alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
        </div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="bm-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th class="hidden sm:table-cell">Country</th>
                        <th class="hidden lg:table-cell">Added</th>
                        <th class="hidden lg:table-cell">Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rehearsalrooms as $rehearsalroom)
                    <tr>
                        <td><a href="{{ route('rehearsalrooms.show', $rehearsalroom->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $rehearsalroom->name }}</a></td>
                        <td>{{ $rehearsalroom->city }}</td>
                        <td class="hidden sm:table-cell">{{ $rehearsalroom->country }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $rehearsalroom->created_at }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $rehearsalroom->updated_at }}</td>
                        <td class="whitespace-nowrap">
                            @if ($user->is_admin || $user->id == $rehearsalroom->user_id)
                            <a href="{{ route('rehearsalrooms.edit', $rehearsalroom->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('rehearsalrooms.destroy', $rehearsalroom->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('Delete this rehearsal room?')) this.closest('form').submit()">
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
            <span class="text-white/40 text-xs">{{ $rehearsalrooms->count() }} {{ $rehearsalrooms->count() == 1 ? 'rehearsal room' : 'rehearsal rooms' }} found</span>
            {{ $rehearsalrooms->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links() }}
        </div>

    </div>
</div>

@endsection