@extends('layouts.app', ['page' => __('Mailing Lists'), 'pageSlug' => 'mailings'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('Mailing Lists') }}</h2>
    </div>

    <div class="bm-card-body">

        @if (session('status'))
            <div class="bm-alert-success mb-4"
                 x-data="{ show: true }"
                 x-show="show"
                 x-init="setTimeout(() => show = false, 3000)"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <i class="fas fa-check-circle"></i>
                {{ session('status') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="bm-table">
                <thead>
                    <tr>
                        <th>{{ __('Mailing List') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th class="text-right">{{ __('Subscribers') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mailingLists as $mailingList)
                    <tr>
                        <td>
                            <a href="{{ route('mailing.show', $mailingList->id) }}"
                               class="text-indigo-400 hover:text-indigo-300 transition-colors font-medium">
                                {{ $mailingList->name }}
                            </a>
                        </td>
                        <td class="text-white/60">{{ $mailingList->description }}</td>
                        <td class="text-right">
                            <span class="bm-badge bm-badge-blue">{{ $mailingList->subscribers_count }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-white/40 py-8">
                            {{ __('No mailing lists found.') }}
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection