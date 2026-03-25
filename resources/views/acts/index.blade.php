@extends('layouts.app', ['page' => __('acts.title'), 'pageSlug' => 'acts'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('acts.title') }}</h2>
        <a href="{{ route('acts.create') }}" class="bm-btn bm-btn-primary bm-btn-sm"><i class="fas fa-plus"></i> {{ __('acts.add') }}</a>
    </div>
    <div class="bm-card-body">
        <div class="flex flex-wrap items-center gap-2 mb-4">
            <form action="{{ route('acts.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <select name="filter" class="bm-select text-sm py-1.5" style="width:180px;" onchange="this.form.submit()">
                    <option value="all" {{ request()->filter == 'all' ? 'selected' : '' }}>{{ __('acts.show_all') }}</option>
                    <option value="my"  {{ request()->filter == 'my'  ? 'selected' : '' }}>{{ __('acts.show_my') }}</option>
                </select>
                <select name="per_page" class="bm-select text-sm py-1.5" style="width:120px;" onchange="this.form.submit()">
                    <option value="25"  {{ request()->per_page == '25'  ? 'selected' : '' }}>{{ __('acts.per_page_25') }}</option>
                    <option value="50"  {{ request()->per_page == '50'  ? 'selected' : '' }}>{{ __('acts.per_page_50') }}</option>
                    <option value="100" {{ request()->per_page == '100' ? 'selected' : '' }}>{{ __('acts.per_page_100') }}</option>
                </select>
                <input type="text" name="search" value="{{ request()->search }}" class="bm-input text-sm py-1.5" style="width:160px;" placeholder="{{ __('common.search_placeholder') }}">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:160px;" onchange="this.form.submit()">
                    <option value="name"        {{ request()->sort == 'name'        ? 'selected' : '' }}>{{ __('common.sort_by_name') }}</option>
                    <option value="genre"       {{ request()->sort == 'genre'       ? 'selected' : '' }}>{{ __('common.sort_by_genre') }}</option>
                    <option value="description" {{ request()->sort == 'description' ? 'selected' : '' }}>{{ __('common.sort_by_description') }}</option>
                    <option value="created_at"  {{ request()->sort == 'created_at'  ? 'selected' : '' }}>{{ __('common.sort_by_date_added') }}</option>
                    <option value="updated_at"  {{ request()->sort == 'updated_at'  ? 'selected' : '' }}>{{ __('common.sort_by_last_update') }}</option>
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
                    <th>{{ __('common.col_name') }}</th>
                    <th class="hidden md:table-cell">{{ __('common.col_members') }}</th>
                    <th class="hidden md:table-cell">{{ __('common.col_genre') }}</th>
                    <th class="hidden lg:table-cell">{{ __('common.col_description') }}</th>
                    <th class="hidden lg:table-cell">{{ __('common.col_added') }}</th>
                    <th class="hidden lg:table-cell">{{ __('common.col_updated') }}</th>
                    <th>{{ __('common.col_actions') }}</th>
                </tr></thead>
                <tbody>
                    @foreach ($acts as $act)
                    <tr>
                        <td><a href="{{ route('acts.show', $act->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $act->name }}</a></td>
                        <td class="hidden md:table-cell">{{ $act->number_of_members }}</td>
                        <td class="hidden md:table-cell">{{ $act->genre->name ?? '' }}</td>
                        <td class="hidden lg:table-cell text-white/60 text-sm">{{ Str::limit($act->description, 60) }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $act->created_at }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $act->updated_at }}</td>
                        <td class="whitespace-nowrap">
                            <a href="{{ route('acts.edit', $act->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('acts.destroy', $act->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('{{ __('acts.delete_confirm') }}')) this.closest('form').submit()">
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
            <span class="text-white/40 text-xs">{{ trans_choice('acts.found', $acts->count(), ['count' => $acts->count()]) }}</span>
        </div>
    </div>
</div>
@endsection