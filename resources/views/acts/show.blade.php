@extends('layouts.app', ['page' => __('acts.show'), 'pageSlug' => 'acts'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('acts.show') }}</h2>
        <div class="flex gap-2">
            <a href="{{ route('acts.edit', $act->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <form action="{{ route('acts.destroy', $act->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                        onclick="if(confirm('{{ __('acts.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
            <a href="{{ route('acts.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
        </div>
    </div>
    <div class="bm-card-body">
        @if(session('status'))
        <div class="bm-alert bm-alert-success mb-4" id="status-alert"><i class="fas fa-check-circle"></i> {{ session('status') }}</div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="w-1/4 text-white/60 font-medium">{{ __('acts.name') }}</th>
                    <td>{{ $act->name }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_genre') }}</th>
                    <td>{{ $act->genre->name ?? '' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.members') }}</th>
                    <td>{{ $act->members }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.description') }}</th>
                    <td>{{ $act->description }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.is_private') }}</th>
                    <td>{{ $act->is_private ? __('common.yes') : __('common.no') }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.email_label') }}</th>
                    <td>{{ $act->email }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.phone_label') }}</th>
                    <td>{{ $act->phone }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.website_label') }}</th>
                    <td>@if($act->website)<a href="{{ $act->website }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">{{ $act->website }}</a>@endif</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.facebook_label') }}</th>
                    <td>@if($act->facebook)<a href="{{ $act->facebook }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">{{ $act->facebook }}</a>@endif</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.youtube_label') }}</th>
                    <td>@if($act->youtube)<a href="{{ $act->youtube }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">{{ $act->youtube }}</a>@endif</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.instagram_label') }}</th>
                    <td>@if($act->instagram)<a href="{{ $act->instagram }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">{{ $act->instagram }}</a>@endif</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.soundcloud_label') }}</th>
                    <td>@if($act->soundcloud)<a href="{{ $act->soundcloud }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">{{ $act->soundcloud }}</a>@endif</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('acts.spotify_label') }}</th>
                    <td>@if($act->spotify)<a href="{{ $act->spotify }}" target="_blank" class="text-indigo-400 hover:text-indigo-300">{{ $act->spotify }}</a>@endif</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td class="text-white/40 text-xs">{{ $act->created_at }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td class="text-white/40 text-xs">{{ $act->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection