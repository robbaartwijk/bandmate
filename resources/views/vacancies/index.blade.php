@extends('layouts.app', ['page' => __('vacancies.title'), 'pageSlug' => 'vacancies'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('vacancies.title') }}</h2>
        <a href="{{ route('vacancies.create') }}" class="bm-btn bm-btn-primary bm-btn-sm"><i class="fas fa-plus"></i> {{ __('vacancies.add') }}</a>
    </div>
    <div class="bm-card-body">
        <div class="flex flex-wrap items-center gap-2 mb-4">
            <form action="{{ route('vacancies.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <input type="text" name="search" value="{{ request()->search }}" class="bm-input text-sm py-1.5" style="width:160px;" placeholder="{{ __('common.search_placeholder') }}">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:160px;" onchange="this.form.submit()">
                    <option value="act_name"        {{ (request()->sort === 'act_name'        || !request()->sort) ? 'selected' : '' }}>{{ __('common.sort_by_act') }}</option>
                    <option value="instrument_name" {{ request()->sort === 'instrument_name'  ? 'selected' : '' }}>{{ __('common.sort_by_instrument') }}</option>
                    <option value="created_at"      {{ request()->sort === 'created_at'       ? 'selected' : '' }}>{{ __('common.sort_by_date_of_creation') }}</option>
                    <option value="updated_at"      {{ request()->sort === 'updated_at'       ? 'selected' : '' }}>{{ __('common.sort_by_date_last_update') }}</option>
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
                    <th>{{ __('common.col_act') }}</th>
                    <th>{{ __('common.col_instrument') }}</th>
                    <th class="hidden lg:table-cell">{{ __('vacancies.description') }}</th>
                    <th class="hidden lg:table-cell">{{ __('common.col_added') }}</th>
                    <th class="hidden lg:table-cell">{{ __('common.col_updated') }}</th>
                    <th>{{ __('common.col_actions') }}</th>
                </tr></thead>
                <tbody>
                    @foreach ($vacancies as $record)
                    <tr>
                        <td><a href="{{ route('vacancies.show', $record->id) }}" class="hover:underline">{{ $record->act->name ?? '-' }}</a></td>
                        <td>{{ $record->instrument->name ?? '-' }}</td>
                        <td class="hidden lg:table-cell text-sm text-white/70">{{ Str::limit($record->description, 60) }}</td>
                        <td class="hidden lg:table-cell text-xs text-white/60">{{ $record->created_at->format('Y-m-d') }}</td>
                        <td class="hidden lg:table-cell text-xs text-white/60">{{ $record->updated_at->format('Y-m-d') }}</td>
                        <td class="whitespace-nowrap">
                            <a href="{{ route('vacancies.edit', $record->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('vacancies.destroy', $record->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('{{ __('vacancies.delete_confirm') }}')) this.closest('form').submit()">
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
            <span class="text-white/40 text-xs">{{ trans_choice('vacancies.found', $vacancies->count(), ['count' => $vacancies->count()]) }}</span>
        </div>
    </div>
</div>
@endsection