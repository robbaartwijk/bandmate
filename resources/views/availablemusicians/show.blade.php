@extends('layouts.app', ['page' => __('availablemusicians.title'), 'pageSlug' => 'availablemusicians'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        {{-- Avatar + name in the header --}}
        <div class="flex items-center gap-4">
            @if(!empty($availablemusician->image))
            <img src="{{ asset('/storage/' . $availablemusician->image->id . '/' . $availablemusician->image->file_name) }}"
                 class="rounded-full border-2 border-white/20 object-cover flex-shrink-0"
                 style="width:56px; height:56px;"
                 alt="{{ $availablemusician->user->name }}">
            @else
            <div class="rounded-full border-2 border-white/10 bg-white/5 flex items-center justify-center flex-shrink-0"
                 style="width:56px; height:56px;">
                <i class="fas fa-user text-white/30 text-xl"></i>
            </div>
            @endif
            <div>
                <h2 class="bm-card-title">{{ $availablemusician->user->name }}</h2>
                <p class="text-white/40 text-xs mt-0.5">{{ $availablemusician->instrument->name ?? '' }}
                    @if($availablemusician->genre) &mdash; {{ $availablemusician->genre->name }} @endif
                </p>
            </div>
        </div>
    </div>
    <div class="bm-card-body">
        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_instrument') }}</th>
                    <td>{{ $availablemusician->instrument->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('availablemusicians.description') }}</th>
                    <td>{{ $availablemusician->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_city') }}</th>
                    <td>{{ $availablemusician->city ?? '-' }}</td>
                </tr>
                @if($availablemusician->available_from)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('availablemusicians.available_from') }}</th>
                    <td>{{ \Carbon\Carbon::parse($availablemusician->available_from)->format('Y-m-d') }}</td>
                </tr>
                @endif
                @if($availablemusician->available_until)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('availablemusicians.available_until') }}</th>
                    <td>{{ \Carbon\Carbon::parse($availablemusician->available_until)->format('Y-m-d') }}</td>
                </tr>
                @endif
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td>{{ $availablemusician->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td>{{ $availablemusician->updated_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex gap-2 mt-6">
            <a href="{{ route('availablemusicians.edit', $availablemusician->id) }}" class="bm-btn bm-btn-primary"><i class="fas fa-pencil-alt"></i> {{ __('common.edit') }}</a>
            <form action="{{ route('availablemusicians.destroy', $availablemusician->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger"
                        onclick="if(confirm('{{ __('availablemusicians.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i> {{ __('common.delete') }}
                </button>
            </form>
            <a href="{{ route('availablemusicians.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.back') }}</a>
        </div>
    </div>
</div>
@endsection