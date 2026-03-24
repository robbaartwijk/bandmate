@extends('layouts.app', ['page' => __('availablemusicians.title'), 'pageSlug' => 'availablemusicians'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('availablemusicians.title') }}</h2>
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