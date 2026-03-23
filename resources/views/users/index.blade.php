@php $authUser = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Users</h2>
    </div>
    <div class="bm-card-body">
        <div class="flex flex-wrap items-center gap-2 mb-4">
            <form action="{{ route('users.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <select name="selectrecords" class="bm-select text-sm py-1.5" style="width:110px;" onchange="this.form.submit()">
                    <option value="25"  {{ (!request()->selectrecords || request()->selectrecords == '25')  ? 'selected' : '' }}>25 users</option>
                    <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 users</option>
                    <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 users</option>
                </select>
                <input type="text" name="search" value="{{ request()->search }}" class="bm-input text-sm py-1.5" style="width:160px;" placeholder="Search...">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:160px;" onchange="this.form.submit()">
                    <option value="name"       {{ request()->sort == 'name'       ? 'selected' : '' }}>Sort by name</option>
                    <option value="email"      {{ request()->sort == 'email'      ? 'selected' : '' }}>Sort by email</option>
                    <option value="created_at" {{ request()->sort == 'created_at' ? 'selected' : '' }}>Sort by date added</option>
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
                    <th>Name</th>
                    <th class="hidden md:table-cell">Email</th>
                    <th class="hidden sm:table-cell">Acts</th>
                    <th class="hidden lg:table-cell">Rooms</th>
                    <th class="hidden lg:table-cell">Vacancies</th>
                    <th class="hidden lg:table-cell">Available</th>
                    <th></th>
                </tr></thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}"
                               class="{{ $user->is_admin ? 'text-white font-semibold' : 'text-indigo-400 hover:text-indigo-300' }}">
                                {{ $user->name }}
                                @if($user->is_admin)
                                <span class="bm-badge bm-badge-yellow ml-1">Admin</span>
                                @endif
                            </a>
                        </td>
                        <td class="hidden md:table-cell">
                            <a href="mailto:{{ $user->email }}" class="text-indigo-400 hover:text-indigo-300">{{ $user->email }}</a>
                        </td>
                        <td class="hidden sm:table-cell text-white/60">{{ $user->acts_count }}</td>
                        <td class="hidden lg:table-cell text-white/60">{{ $user->rehearsalrooms_count }}</td>
                        <td class="hidden lg:table-cell text-white/60">{{ $user->vacancies_count }}</td>
                        <td class="hidden lg:table-cell text-white/60">{{ $user->availablemusicians_count }}</td>
                        <td class="whitespace-nowrap">
                            @can('update', $user)
                            <a href="{{ route('users.edit', $user->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('delete', $user)
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('Delete this user?')) this.closest('form').submit()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between mt-4">
            <span class="text-white/40 text-xs">{{ $users->count() }} {{ $users->count() == 1 ? 'user' : 'users' }} found</span>
            {{ $users->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links() }}
        </div>
    </div>
</div>
@endsection