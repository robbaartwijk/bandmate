@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $agency->name }}</h2>
        @if($user->is_admin || $user->id == $agency->user_id)
        <a href="{{ route('agencies.edit', $agency->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
            <i class="fas fa-pencil-alt"></i> Edit
        </a>
        @endif
    </div>

    <div class="bm-card-body">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- General information --}}
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">General information</h3>
                <dl class="space-y-2 text-sm">
                    @if($agency->address)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Address</dt>
                        <dd class="text-white/80">{{ $agency->address }}</dd>
                    </div>
                    @endif
                    @if($agency->zip)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Zip</dt>
                        <dd class="text-white/80">{{ $agency->zip }}</dd>
                    </div>
                    @endif
                    @if($agency->city)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">City</dt>
                        <dd class="text-white/80">{{ $agency->city }}</dd>
                    </div>
                    @endif
                    @if($agency->state)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">State</dt>
                        <dd class="text-white/80">{{ $agency->state }}</dd>
                    </div>
                    @endif
                    @if($agency->country)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Country</dt>
                        <dd class="text-white/80">{{ $agency->country }}</dd>
                    </div>
                    @endif
                </dl>
            </div>

            {{-- Contact & links --}}
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Contact & links</h3>
                <ul class="space-y-2 text-sm">
                    @if($agency->website)
                    <li><a href="{{ $agency->website }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fas fa-globe w-5"></i> {{ $agency->website }}</a></li>
                    @endif
                    @if($agency->email)
                    <li><a href="mailto:{{ $agency->email }}" class="text-indigo-400 hover:text-indigo-300">
                        <i class="fas fa-envelope w-5"></i> {{ $agency->email }}</a></li>
                    @endif
                    @if($agency->phone)
                    <li class="text-white/70"><i class="fas fa-phone w-5"></i> {{ $agency->phone }}</li>
                    @endif
                    @if($agency->facebook)
                    <li><a href="{{ $agency->facebook }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-facebook w-5"></i> {{ $agency->facebook }}</a></li>
                    @endif
                    @if($agency->youtube)
                    <li><a href="{{ $agency->youtube }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-youtube w-5"></i> {{ $agency->youtube }}</a></li>
                    @endif
                    @if($agency->twitter)
                    <li><a href="{{ $agency->twitter }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-twitter w-5"></i> {{ $agency->twitter }}</a></li>
                    @endif
                    @if($agency->instagram)
                    <li><a href="{{ $agency->instagram }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-instagram w-5"></i> {{ $agency->instagram }}</a></li>
                    @endif
                    @if($agency->soundcloud)
                    <li><a href="{{ $agency->soundcloud }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-soundcloud w-5"></i> {{ $agency->soundcloud }}</a></li>
                    @endif
                    @if($agency->spotify)
                    <li><a href="{{ $agency->spotify }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fab fa-spotify w-5"></i> {{ $agency->spotify }}</a></li>
                    @endif
                </ul>
            </div>

        </div>

        @if($agency->description)
        <div class="mt-8">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Description</h3>
            <p class="text-white/70 text-sm leading-relaxed">{!! nl2br(e($agency->description)) !!}</p>
        </div>
        @endif

        <div class="mt-8 pt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
            <dl class="flex gap-6 text-xs text-white/30">
                <div><dt class="inline">Added:</dt> <dd class="inline">{{ $agency->created_at }}</dd></div>
                <div><dt class="inline">Updated:</dt> <dd class="inline">{{ $agency->updated_at }}</dd></div>
            </dl>
            <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

    </div>
</div>

@endsection