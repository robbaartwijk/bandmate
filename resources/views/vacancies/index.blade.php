@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Vacancies</h2>
        <a href="{{ route('vacancies.create') }}" class="bm-btn bm-btn-primary bm-btn-sm">
            <i class="fas fa-plus"></i> Add vacancy
        </a>
    </div>

    <div class="bm-card-body">

        {{-- Toolbar --}}
        <div class="flex flex-wrap items-center gap-2 mb-4">
            @if(request()->has('private') && request()->private)
                <a href="{{ route('vacancies.index', ['private' => false]) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                    <i class="fas fa-globe"></i> Show all vacancies
                </a>
            @else
                <a href="{{ route('vacancies.index', ['private' => true]) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                    <i class="fas fa-user"></i> Show only my vacancies
                </a>
            @endif

            <form action="{{ route('vacancies.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <select name="selectrecords" class="bm-select text-sm py-1.5" style="width:130px;" onchange="this.form.submit()">
                    <option value="25"  {{ (!request()->selectrecords || request()->selectrecords == '25')  ? 'selected' : '' }}>25 vacancies</option>
                    <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 vacancies</option>
                    <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 vacancies</option>
                </select>
                <input type="text" name="search" value="{{ request()->search }}"
                       class="bm-input text-sm py-1.5" style="width:160px;" placeholder="Search...">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:185px;" onchange="this.form.submit()">
                    <option value="act_name"        {{ request()->sort == 'act_name'        ? 'selected' : '' }}>Sort by act name</option>
                    <option value="instrument_name" {{ request()->sort == 'instrument_name' ? 'selected' : '' }}>Sort by instrument</option>
                    <option value="description"     {{ request()->sort == 'description'     ? 'selected' : '' }}>Sort by description</option>
                    <option value="created_at"      {{ request()->sort == 'created_at'      ? 'selected' : '' }}>Sort by date added</option>
                    <option value="updated_at"      {{ request()->sort == 'updated_at'      ? 'selected' : '' }}>Sort by last update</option>
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
                        <th>Act name</th>
                        <th>Instrument</th>
                        <th class="hidden md:table-cell">Description</th>
                        <th class="hidden lg:table-cell">Added</th>
                        <th class="hidden lg:table-cell">Updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vacancies as $vacancy)
                    <tr>
                        <td><a href="{{ route('acts.show', $vacancy->act_id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $vacancy->act_name }}</a></td>
                        <td>{{ $vacancy->instrument_name }}</td>
                        <td class="hidden md:table-cell">
                            <a href="{{ route('vacancies.show', $vacancy->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ Str::limit($vacancy->description, 42) }}</a>
                        </td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $vacancy->created_at }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $vacancy->updated_at }}</td>
                        <td class="whitespace-nowrap">
                            @if ($user->is_admin || $user->id == $vacancy->user_id)
                            <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('vacancies.destroy', $vacancy->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('Delete this vacancy?')) this.closest('form').submit()">
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
            <span class="text-white/40 text-xs">{{ $vacancies->count() }} {{ $vacancies->count() == 1 ? 'vacancy' : 'vacancies' }} found</span>
            {{ $vacancies->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links() }}
        </div>

    </div>
</div>

@endsection