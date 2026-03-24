@extends('layouts.app', ['page' => __('Mailing List'), 'pageSlug' => 'mailings'])

@section('content')

<div class="space-y-6">

    {{-- Details card --}}
    <div class="bm-card">
        <div class="bm-card-header">
            <h2 class="bm-card-title">{{ __('Mailing List Details') }}</h2>
            <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                <i class="fas fa-arrow-left"></i> {{ __('Back') }}
            </a>
        </div>

        <div class="bm-card-body">
            <dl class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <dt class="bm-label">{{ __('Name') }}</dt>
                    <dd class="text-white/80 text-sm">{{ $mailingList->name }}</dd>
                </div>
                <div>
                    <dt class="bm-label">{{ __('Description') }}</dt>
                    <dd class="text-white/80 text-sm">{{ $mailingList->description }}</dd>
                </div>
                <div>
                    <dt class="bm-label">{{ __('Subscribers') }}</dt>
                    <dd>
                        <span class="bm-badge bm-badge-blue text-base">
                            {{ $mailingList->subscribers_count }}
                        </span>
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    {{-- Subscribers table --}}
    <div class="bm-card">
        <div class="bm-card-header">
            <h3 class="bm-card-title">{{ __('Subscribers') }}</h3>
        </div>

        <div class="bm-card-body p-0">
            <div class="overflow-x-auto">
                <table class="bm-table">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('City') }}</th>
                            <th>{{ __('Country') }}</th>
                            <th>{{ __('Registered') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($subscribedUsers as $subscribedUser)
                        <tr>
                            <td class="font-medium">{{ $subscribedUser->name }}</td>
                            <td class="text-white/60">{{ $subscribedUser->email }}</td>
                            <td class="text-white/60">{{ $subscribedUser->city ?? '—' }}</td>
                            <td class="text-white/60">{{ $subscribedUser->country ?? '—' }}</td>
                            <td class="text-white/50 text-sm">
                                {{ $subscribedUser->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-white/40 py-8">
                                {{ __('No subscribers found.') }}
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection