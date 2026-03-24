@extends('layouts.app', ['page' => $venue->name, 'pageSlug' => 'venues'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $venue->name }}</h2>
    </div>
    <div class="bm-card-body">
        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.name') }}</th>
                    <td>{{ $venue->name }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.city') }}</th>
                    <td>{{ $venue->city }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.country') }}</th>
                    <td>{{ $venue->country }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.capacity') }}</th>
                    <td>{{ $venue->capacity }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.description') }}</th>
                    <td>{{ $venue->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td>{{ $venue->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td>{{ $venue->updated_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex gap-2 mt-6">
            <a href="{{ route('venues.edit', $venue->id) }}" class="bm-btn bm-btn-primary"><i class="fas fa-pencil-alt"></i> {{ __('common.edit') }}</a>
            <form action="{{ route('venues.destroy', $venue->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger"
                        onclick="if(confirm('{{ __('venues.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i> {{ __('common.delete') }}
                </button>
            </form>
            <a href="{{ route('venues.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.back') }}</a>
        </div>
    </div>
</div>
@endsection