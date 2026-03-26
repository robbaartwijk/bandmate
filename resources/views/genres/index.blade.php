@extends('layouts.app', ['page' => __('genres.title'), 'pageSlug' => 'genres'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('genres.title') }}</h2>
        <a href="{{ route('genres.create') }}" class="bm-btn bm-btn-primary bm-btn-sm"><i class="fas fa-plus"></i> {{ __('genres.add') }}</a>
    </div>
    <div class="bm-card-body">
        <div class="flex flex-wrap items-center gap-2 mb-4">
            <form action="{{ route('genres.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <input type="text" name="search" value="{{ request()->search }}" class="bm-input text-sm py-1.5" style="width:160px;" placeholder="{{ __('common.search_placeholder') }}">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:160px;" onchange="this.form.submit()">
                    <option value="name"       {{ request()->sort == 'name'       ? 'selected' : '' }}>{{ __('common.sort_by_name') }}</option>
                    <option value="group"      {{ request()->sort == 'group'      ? 'selected' : '' }}>{{ __('common.sort_by_group') }}</option>
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
                    <th>{{ __('common.col_name') }}</th>
                    <th>{{ __('common.col_group') }}</th>
                    <th class="hidden lg:table-cell">{{ __('common.col_added') }}</th>
                    <th class="hidden lg:table-cell">{{ __('common.col_updated') }}</th>
                    <th>{{ __('common.col_actions') }}</th>
                </tr></thead>
                <tbody>
                    @foreach ($genres as $genre)
                    <tr>
                        <td><a href="{{ route('genres.show', $genre->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $genre->name }}</a></td>
                        <td><x-genre-badge :group="$genre->group" /></td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $genre->created_at }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $genre->updated_at }}</td>
                        <td class="whitespace-nowrap">
                            <a href="{{ route('genres.edit', $genre->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('genres.destroy', $genre->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('{{ __('genres.delete_confirm') }}')) this.closest('form').submit()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex flex-col items-center gap-2">
            {{ $genres->appends(request()->query())->links() }}
            <span class="text-white/40 text-xs">{{ $genres->firstItem() ?? 0 }} – {{ $genres->lastItem() ?? 0 }} of {{ $genres->total() }}</span>
        </div>
    </div>
</div>
@endsection