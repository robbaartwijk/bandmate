@extends('layouts.app', ['page' => $rehearsalroom->name, 'pageSlug' => 'rehearsalrooms'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $rehearsalroom->name }}</h2>
    </div>

    {{-- Cover photo --}}
    @if(!empty($rehearsalroom->image))
    <div class="w-full overflow-hidden" style="max-height:320px;">
        <img src="{{ asset('/storage/' . $rehearsalroom->image->id . '/' . $rehearsalroom->image->file_name) }}"
             alt="{{ $rehearsalroom->name }}"
             class="w-full object-cover"
             style="max-height:320px;">
    </div>
    @endif

    <div class="bm-card-body">
        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.name') }}</th>
                    <td>{{ $rehearsalroom->name }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.city') }}</th>
                    <td>{{ $rehearsalroom->city }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.country') }}</th>
                    <td>{{ $rehearsalroom->country }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.price') }}</th>
                    <td>{{ number_format($rehearsalroom->price, 2) }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.description') }}</th>
                    <td>{{ $rehearsalroom->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td>{{ $rehearsalroom->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td>{{ $rehearsalroom->updated_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex gap-2 mt-6">
            <a href="{{ route('rehearsalrooms.edit', $rehearsalroom->id) }}" class="bm-btn bm-btn-primary"><i class="fas fa-pencil-alt"></i> {{ __('common.edit') }}</a>
            <form action="{{ route('rehearsalrooms.destroy', $rehearsalroom->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger"
                        onclick="if(confirm('{{ __('rehearsalrooms.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i> {{ __('common.delete') }}
                </button>
            </form>
            <a href="{{ route('rehearsalrooms.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.back') }}</a>
        </div>
    </div>
</div>
@endsection