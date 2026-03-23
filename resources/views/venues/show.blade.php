
@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Venues'), 'pageSlug' => 'venues'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $venue->name }}</h2>
        @if($user->is_admin || $user->id == $venue->user_id)
        <a href="{{ route('venues.edit', $venue->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
            <i class="fas fa-pencil-alt"></i> Edit
        </a>
        @endif
    </div>

    <div class="bm-card-body">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- Location & contact --}}
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Location</h3>
                <dl class="space-y-2 text-sm">
                    @if($venue->address)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Address</dt>
                        <dd class="text-white/80">{{ $venue->address }}</dd>
                    </div>
                    @endif
                    @if($venue->city)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">City</dt>
                        <dd class="text-white/80">{{ $venue->city }}</dd>
                    </div>
                    @endif
                    @if($venue->state)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">State</dt>
                        <dd class="text-white/80">{{ $venue->state }}</dd>
                    </div>
                    @endif
                    @if($venue->zip)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Postal code</dt>
                        <dd class="text-white/80">{{ $venue->zip }}</dd>
                    </div>
                    @endif
                    @if($venue->country)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Country</dt>
                        <dd class="text-white/80">{{ $venue->country }}</dd>
                    </div>
                    @endif
                </dl>
            </div>

            {{-- Contact & links --}}
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Contact & links</h3>
                <ul class="space-y-2 text-sm">
                    @if($venue->phone)
                    <li class="text-white/70"><i class="fas fa-phone w-5"></i> {{ $venue->phone }}</li>
                    @endif
                    @if($venue->email)
                    <li><a href="mailto:{{ $venue->email }}" class="text-indigo-400 hover:text-indigo-300">
                        <i class="fas fa-envelope w-5"></i> {{ $venue->email }}</a></li>
                    @endif
                    @if($venue->website)
                    <li><a href="{{ $venue->website }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                        <i class="fas fa-globe w-5"></i> {{ $venue->website }}</a></li>
                    @endif
                </ul>
            </div>

        </div>

        @if($venue->description)
        <div class="mt-8">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Description</h3>
            <p class="text-white/70 text-sm leading-relaxed">{!! nl2br(e($venue->description)) !!}</p>
        </div>
        @endif

        <div class="mt-8 pt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
            <dl class="flex gap-6 text-xs text-white/30">
                <div><dt class="inline">Added:</dt> <dd class="inline">{{ $venue->created_at }}</dd></div>
                <div><dt class="inline">Updated:</dt> <dd class="inline">{{ $venue->updated_at }}</dd></div>
            </dl>
            <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

    </div>
</div>

@endsection