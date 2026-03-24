@extends('layouts.app', ['page' => __('users.title'), 'pageSlug' => 'users'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('users.title') }}</h2>
    </div>
    <div class="bm-card-body">
        <div class="flex flex-wrap items-center gap-2 mb-4">
            <form action="{{ route('users.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <input type="text" name="search" value="{{ request()->search }}" class="bm-input text-sm py-1.5" style="width:160px;" placeholder="{{ __('common.search_placeholder') }}">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:160px;" onchange="this.form.submit()">
                    <option value="name"       {{ request()->sort == 'name'       ? 'selected' : '' }}>{{ __('common.sort_by_name') }}</option>
                    <option value="email"      {{ request()->sort == 'email'      ? 'selected' : '' }}>{{ __('common.sort_by_email') }}</option>
                    <option value="created_at" {{ request()->sort == 'created_at' ? 'selected' : '' }}>{{ __('common.sort_by_date_added') }}</option>
                    <option value="updated_at" {{ request()->sort == 'updated_at' ? 'selected' : '' }}>{{ __('common.sort_by_last_update') }}</option>
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
                    <th>{{ __('users.col_name') }}</th>
                    <th class="hidden md:table-cell">{{ __('users.col_email') }}</th>
                    <th class="hidden md:table-cell">{{ __('users.col_role') }}</th>
                    <th class="hidden lg:table-cell">{{ __('users.col_registered') }}</th>
                    <th>{{ __('common.col_actions') }}</th>
                </tr></thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><a href="{{ route('users.show', $user->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $user->name }}</a></td>
                        <td class="hidden md:table-cell text-white/60 text-sm">{{ $user->email }}</td>
                        <td class="hidden md:table-cell">
                            <span class="text-xs px-2 py-0.5 rounded {{ $user->is_admin ? 'bg-indigo-500/20 text-indigo-300' : 'bg-white/10 text-white/50' }}">
                                {{ $user->is_admin ? __('users.role_admin') : __('users.role_user') }}
                            </span>
                        </td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $user->created_at }}</td>
                        <td class="whitespace-nowrap">
                            <a href="{{ route('users.edit', $user->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('{{ __('users.delete_confirm') }}')) this.closest('form').submit()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <span class="text-white/40 text-xs">{{ trans_choice('users.found', $users->count(), ['count' => $users->count()]) }}</span>
        </div>
    </div>
</div>
@endsection