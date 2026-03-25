@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('acts.title'), 'pageSlug' => 'acts'])
@section('content')
@if(session()->has('status'))
<div class="bm-alert bm-alert-success mb-4" id="status-message">
    <i class="fas fa-check-circle"></i> {{ session()->get('status') }}
</div>
<script>setTimeout(() => { const el = document.getElementById('status-message'); if(el) el.style.display='none'; }, 2000);</script>
@endif
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $act->name }}</h2>
        @if($user->is_admin || $user->id == $act->user_id)
        <a href="{{ route('acts.edit', $act->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
            <i class="fas fa-pencil-alt"></i> Edit
        </a>
        @endif
    </div>
    <div class="bm-card-body">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- General info --}}
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">General information</h3>
                <dl class="space-y-2 text-sm">
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Genre</dt>
                        <dd class="text-white/80">
                            @if($act->genre)
                                <a href="{{ route('genres.show', $act->genre->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $act->genre->name }} ({{ $act->genre->group }})</a>
                            @else N/A @endif
                        </dd>
                    </div>
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Members</dt>
                        <dd class="text-white/80">{{ $act->number_of_members }}</dd>
                    </div>
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Rehearsal room</dt>
                        <dd>
                            <span class="{{ $act->rehearsal_room ? 'bm-badge-green' : 'bm-badge-gray' }} bm-badge">
                                {{ $act->rehearsal_room ? 'Yes' : 'No' }}
                            </span>
                        </dd>
                    </div>
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Active</dt>
                        <dd>
                            <span class="{{ $act->active ? 'bm-badge-green' : 'bm-badge-gray' }} bm-badge">
                                {{ $act->active ? 'Yes' : 'No' }}
                            </span>
                        </dd>
                    </div>
                </dl>
                @if(!empty($act->image))
                <img src="{{ asset('/storage/' . $act->image->id . '/' . $act->image->file_name) }}"
                     class="bm_image bm_zoom mt-4 rounded-lg" style="height:auto;">
                @endif
            </div>
            {{-- Contact & links --}}
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Contact & links</h3>
                <ul class="space-y-2 text-sm">
                    @if($act->website)
                    <li><a href="{{ $act->website }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fas fa-globe w-5"></i> {{ $act->website }}</a></li>
                    @endif
                    @if($act->email)
                    <li><a href="mailto:{{ $act->email }}" class="text-indigo-400 hover:text-indigo-300">
                        <i class="fas fa-envelope w-5"></i> {{ $act->email }}</a></li>
                    @endif
                    @if($act->phone)
                    <li class="text-white/70"><i class="fas fa-phone w-5"></i> {{ $act->phone }}</li>
                    @endif
                    @if($act->facebook)
                    <li><a href="{{ $act->facebook }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-facebook w-5"></i> {{ $act->facebook }}</a></li>
                    @endif
                    @if($act->youtube)
                    <li><a href="{{ $act->youtube }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-youtube w-5"></i> {{ $act->youtube }}</a></li>
                    @endif
                    @if($act->twitter)
                    <li><a href="{{ $act->twitter }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-twitter w-5"></i> {{ $act->twitter }}</a></li>
                    @endif
                    @if($act->instagram)
                    <li><a href="{{ $act->instagram }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-instagram w-5"></i> {{ $act->instagram }}</a></li>
                    @endif
                    @if($act->soundcloud)
                    <li><a href="{{ $act->soundcloud }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-soundcloud w-5"></i> {{ $act->soundcloud }}</a></li>
                    @endif
                    @if($act->spotify)
                    <li><a href="{{ $act->spotify }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-spotify w-5"></i> {{ $act->spotify }}</a></li>
                    @endif
                    @if($act->bluesky)
                    <li><a href="{{ $act->bluesky }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <img src="{{ asset('images/bluesky.jpg') }}" class="inline w-4 h-4 mr-1">{{ $act->bluesky }}</a></li>
                    @endif
                </ul>
            </div>
        </div>
        {{-- Description --}}
        @if($act->description)
        <div class="mt-8">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Description</h3>
            <p class="text-white/70 text-sm leading-relaxed">{!! nl2br(e($act->description)) !!}</p>
        </div>
        @endif
        {{-- YouTube demo --}}
        @if(!empty($act->youtubedemo))
        <div class="mt-8">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Video</h3>
            <div class="relative" style="padding-bottom:56.25%; height:0; overflow:hidden;">
                <iframe src="{{ $act->youtubedemo }}"
                        class="absolute inset-0 w-full h-full rounded-lg"
                        frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        @endif
        {{-- History --}}
        <div class="mt-8 pt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
            <dl class="flex gap-6 text-xs text-white/30">
                <div><dt class="inline">Added:</dt> <dd class="inline">{{ $act->created_at }}</dd></div>
                <div><dt class="inline">Updated:</dt> <dd class="inline">{{ $act->updated_at }}</dd></div>
            </dl>
            <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>
@endsection