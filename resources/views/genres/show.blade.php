@extends('layouts.app', ['page' => __('genres.show'), 'pageSlug' => 'genres'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('genres.show') }}</h2>
        <div class="flex gap-2">
            <a href="{{ route('genres.edit', $genre->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <form action="{{ route('genres.destroy', $genre->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                        onclick="if(confirm('{{ __('genres.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
            <a href="{{ route('genres.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
        </div>
    </div>
    <div class="bm-card-body">
        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="w-1/4 text-white/60 font-medium">{{ __('genres.name') }}</th>
                    <td>{{ $genre->name }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('genres.group') }}</th>
                    <td>{{ $genre->group }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td class="text-white/40 text-xs">{{ $genre->created_at }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td class="text-white/40 text-xs">{{ $genre->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection