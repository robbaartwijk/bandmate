@extends('layouts.app', ['page' => __('mailing.details'), 'pageSlug' => 'mailing'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('mailing.details') }}</h2>
        <a href="{{ route('mailing.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('mailing.back') }}</a>
    </div>
    <div class="bm-card-body">
        <table class="bm-table mb-6">
            <tbody>
                <tr>
                    <th class="w-1/4 text-white/60 font-medium">{{ __('mailing.col_name') }}</th>
                    <td>{{ $mailingList->name }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('mailing.col_description') }}</th>
                    <td>{{ $mailingList->description }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('mailing.col_created') }}</th>
                    <td class="text-white/40 text-xs">{{ $mailingList->created_at }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('mailing.col_updated') }}</th>
                    <td class="text-white/40 text-xs">{{ $mailingList->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <h3 class="bm-section-title">{{ __('mailing.subscribers') }}</h3>

        @if($mailingList->subscribers->isEmpty())
        <p class="text-white/50">{{ __('mailing.no_subscribers') }}</p>
        @else
        <div class="overflow-x-auto">
            <table class="bm-table">
                <thead><tr>
                    <th class="text-white/60 font-medium">{{ __('mailing.col_name') }}</th>
                    <th class="text-white/60 font-medium">{{ __('mailing.col_city') }}</th>
                    <th class="hidden md:table-cell">{{ __('mailing.col_country') }}</th>
                </tr></thead>
                <tbody>
                    @foreach ($mailingList->subscribers as $subscriber)
                    <tr>
                        <td>{{ $subscriber->name }}</td>
                        <td>{{ $subscriber->city }}</td>
                        <td class="hidden md:table-cell">{{ $subscriber->country }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@endsection