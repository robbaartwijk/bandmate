@extends('layouts.app', ['page' => __('mailing.title'), 'pageSlug' => 'mailing'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('mailing.title') }}</h2>
    </div>
    <div class="bm-card-body">
        @if(session('status'))
        <div class="bm-alert bm-alert-success mb-4" id="status-alert"><i class="fas fa-check-circle"></i> {{ session('status') }}</div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        @if($mailingLists->isEmpty())
        <p class="text-white/50">{{ __('mailing.no_lists') }}</p>
        @else
        <div class="overflow-x-auto">
            <table class="bm-table">
                <thead><tr>
                    <th>{{ __('mailing.col_name') }}</th>
                    <th class="hidden md:table-cell">{{ __('mailing.col_description') }}</th>
                    <th class="hidden lg:table-cell">{{ __('mailing.col_created') }}</th>
                    <th class="hidden lg:table-cell">{{ __('mailing.col_updated') }}</th>
                    <th>{{ __('common.col_actions') }}</th>
                </tr></thead>
                <tbody>
                    @foreach ($mailingLists as $list)
                    <tr>
                        <td><a href="{{ route('mailing.show', $list->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $list->name }}</a></td>
                        <td class="hidden md:table-cell text-white/60 text-sm">{{ Str::limit($list->description, 60) }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $list->created_at }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $list->updated_at }}</td>
                        <td class="whitespace-nowrap">
                            <a href="{{ route('mailing.show', $list->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection