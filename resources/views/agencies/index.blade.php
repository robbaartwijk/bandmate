@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Agencies</h2>
        @if($user->is_admin)
        <a href="{{ route('agencies.create') }}" class="bm-btn bm-btn-primary bm-btn-sm">
            <i class="fas fa-plus"></i> Add agency
        </a>
        @endif
    </div>

    <div class="bm-card-body">

        {{-- Toolbar --}}
        <div class="flex flex-wrap items-center gap-2 mb-4">
            @if($user->is_admin)
                @if(request()->has('private') && request()->private)
                    <a href="{{ route('agencies.index', ['private' => false]) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                        <i class="fas fa-globe"></i> Show all agencies
                    </a>
                @else
                    <a href="{{ route('agencies.index', ['private' => true]) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                        <i class="fas fa-user"></i> Show only my agencies
                    </a>
                @endif
            @endif

            <form action="{{ route('agencies.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <select name="selectrecords" class="bm-select text-sm py-1.5" style="width:120px;" onchange="this.form.submit()">
                    <option value="25"  {{ (!request()->selectrecords || request()->selectrecords == '25')  ? 'selected' : '' }}>25 agencies</option>
                    <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 agencies</option>
                    <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 agencies</option>
                </select>
                <input type="text" name="search" value="{{ request()->search }}"
                       class="bm-input text-sm py-1.5" style="width:160px;" placeholder="Search...">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:185px;" onchange="this.form.submit()">
                    <option value="name"        {{ request()->sort == 'name'        ? 'selected' : '' }}>Sort by name</option>
                    <option value="country"     {{ request()->sort == 'country'     ? 'selected' : '' }}>Sort by country</option>
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
                        <th class="hidden sm:table-cell">Country</th>
                        <th class="hidden md:table-cell">Description</th>
                        <th class="hidden lg:table-cell">Added</th>
                        <th class="hidden lg:table-cell">Updated</th>
                        @if($user->is_admin)
                        <th></th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($agencies as $agency)
                    <tr>
                        <td><a href="{{ route('agencies.show', $agency->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $agency->name }}</a></td>
                        <td class="hidden sm:table-cell">{{ Str::limit($agency->country, 20) }}</td>
                        <td class="hidden md:table-cell">{{ Str::limit($agency->description, 40) }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $agency->created_at }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $agency->updated_at }}</td>
                        @if($user->is_admin)
                        <td class="whitespace-nowrap">
                            <a href="{{ route('agencies.edit', $agency->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('agencies.destroy', $agency->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('Delete this agency?')) this.closest('form').submit()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-white/40 text-center">No agencies found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between mt-4">
            <span class="text-white/40 text-xs">{{ $agencies->count() }} {{ $agencies->count() == 1 ? 'agency' : 'agencies' }} found</span>
            {{ $agencies->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links() }}
        </div>

    </div>
</div>

@endsection