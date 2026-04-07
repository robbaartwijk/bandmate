@extends('layouts.app', ['page' => $agency->name, 'pageSlug' => 'agencies'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $agency->name }}</h2>
    </div>
    <div class="bm-card-body">
        @php $image = $agency->getFirstMedia('images/AgencyPics'); @endphp
        @if($image)
        <div class="mb-6">
            <img src="{{ asset('/storage/' . $image->id . '/' . $image->file_name) }}"
                 class="rounded-lg border border-white/10 w-full object-cover"
                 style="max-height:400px;"
                 alt="{{ $agency->name }}">
        </div>
        @endif
        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('agencies.name') }}</th>
                    <td>{{ $agency->name }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('agencies.city') }}</th>
                    <td>{{ $agency->city }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('agencies.country') }}</th>
                    <td>{{ $agency->country }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('agencies.description') }}</th>
                    <td>{{ $agency->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td>{{ $agency->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td>{{ $agency->updated_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex gap-2 mt-6">
            <a href="{{ route('agencies.edit', $agency->id) }}" class="bm-btn bm-btn-primary"><i class="fas fa-pencil-alt"></i> {{ __('common.edit') }}</a>
            <form action="{{ route('agencies.destroy', $agency->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger"
                        onclick="if(confirm('{{ __('agencies.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i> {{ __('common.delete') }}
                </button>
            </form>
            <a href="{{ route('agencies.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.back') }}</a>
        </div>
    </div>
</div>
@endsection
