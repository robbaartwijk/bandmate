@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Acts</h2>
        <a href="{{ route('acts.create') }}" class="bm-btn bm-btn-primary bm-btn-sm">
            <i class="fas fa-plus"></i> Add act
        </a>
    </div>

    <div class="bm-card-body">

        {{-- Toolbar --}}
        <div class="flex flex-wrap items-center gap-2 mb-4">
            @if(request()->has('private') && request()->private)
                <a href="{{ route('acts.index', ['private' => false]) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                    <i class="fas fa-globe"></i> Show all acts
                </a>
            @else
                <a href="{{ route('acts.index', ['private' => true]) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                    <i class="fas fa-user"></i> Show only my acts
                </a>
            @endif

            <form action="{{ route('acts.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <select name="selectrecords" class="bm-select text-sm py-1.5" style="width:110px;" onchange="this.form.submit()">
                    <option value="25"  {{ (!request()->selectrecords || request()->selectrecords == '25')  ? 'selected' : '' }}>25 acts</option>
                    <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 acts</option>
                    <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 acts</option>
                </select>
                <input type="text" name="search" value="{{ request()->search }}"
                       class="bm-input text-sm py-1.5" style="width:160px;" placeholder="Search...">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:170px;" onchange="this.form.submit()">
                    <option value="name"        {{ request()->sort == 'name'        ? 'selected' : '' }}>Sort by name</option>
                    <option value="genre_name"  {{ request()->sort == 'genre_name'  ? 'selected' : '' }}>Sort by genre</option>
                    <option value="description" {{ request()->sort == 'description' ? 'selected' : '' }}>Sort by description</option>
                    <option value="created_at"  {{ request()->sort == 'created_at'  ? 'selected' : '' }}>Sort by date added</option>
                    <option value="updated_at"  {{ request()->sort == 'updated_at'  ? 'selected' : '' }}>Sort by last update</option>
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
                        <th class="hidden sm:table-cell">Members</th>
                        <th>Genre</th>
                        <th class="hidden md:table-cell">Description</th>
                        <th class="hidden lg:table-cell">Added</th>
                        <th class="hidden lg:table-cell">Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($acts as $act)
                    <tr>
                        <td><a href="{{ route('acts.show', $act->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $act->name }}</a></td>
                        <td class="hidden sm:table-cell">{{ $act->number_of_members }}</td>
                        <td>
                            @if($act->genre)
                                <a href="{{ route('genres.show', $act->genre->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $act->genre->name }}</a>
                            @else
                                <span class="text-white/30">N/A</span>
                            @endif
                        </td>
                        <td class="hidden md:table-cell">{{ Str::limit($act->description, 41) }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $act->created_at }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $act->updated_at }}</td>
                        <td class="whitespace-nowrap">
                            @if($user->is_admin || $user->id == $act->user_id)
                            <a href="{{ route('acts.edit', $act->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('acts.destroy', $act->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('Delete this act?')) this.closest('form').submit()">
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
            <span class="text-white/40 text-xs">{{ $acts->count() }} {{ $acts->count() == 1 ? 'act' : 'acts' }} found</span>
            {{ $acts->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links() }}
        </div>

    </div>
</div>

@endsection