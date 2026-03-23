@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $rehearsalroom->name }}</h2>
        @if($user->is_admin || $user->id == $rehearsalroom->user_id)
        <a href="{{ route('rehearsalrooms.edit', $rehearsalroom->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
            <i class="fas fa-pencil-alt"></i> Edit
        </a>
        @endif
    </div>

    <div class="bm-card-body">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- Image --}}
            <div>
                @if (!empty($rehearsalroom->image))
                <img src="{{ asset('/storage/' . $rehearsalroom->image->id . '/' . $rehearsalroom->image->file_name) }}"
                     class="rounded-lg w-full h-auto" style="max-width:360px;">
                @else
                <img src="{{ asset('storage/defaults/defaultrehearsalroom.jpg') }}"
                     class="rounded-lg w-full h-auto" style="max-width:360px;">
                @endif
            </div>

            {{-- Details --}}
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Details</h3>
                <dl class="space-y-2 text-sm">
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Name</dt>
                        <dd class="text-white/80">{{ $rehearsalroom->name }}</dd>
                    </div>
                    @if($rehearsalroom->address)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Address</dt>
                        <dd class="text-white/80">{{ $rehearsalroom->address }}</dd>
                    </div>
                    @endif
                    @if($rehearsalroom->city)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">City</dt>
                        <dd class="text-white/80">{{ $rehearsalroom->city }}</dd>
                    </div>
                    @endif
                    @if($rehearsalroom->state)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">State</dt>
                        <dd class="text-white/80">{{ $rehearsalroom->state }}</dd>
                    </div>
                    @endif
                    @if($rehearsalroom->zip)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Postal code</dt>
                        <dd class="text-white/80">{{ $rehearsalroom->zip }}</dd>
                    </div>
                    @endif
                    @if($rehearsalroom->country)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Country</dt>
                        <dd class="text-white/80">{{ $rehearsalroom->country }}</dd>
                    </div>
                    @endif
                    @if($rehearsalroom->phone)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Phone</dt>
                        <dd class="text-white/80"><i class="fas fa-phone w-4"></i> {{ $rehearsalroom->phone }}</dd>
                    </div>
                    @endif
                    @if($rehearsalroom->email)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Email</dt>
                        <dd><a href="mailto:{{ $rehearsalroom->email }}" class="text-indigo-400 hover:text-indigo-300">
                            <i class="fas fa-envelope w-4"></i> {{ $rehearsalroom->email }}</a></dd>
                    </div>
                    @endif
                    @if($rehearsalroom->website)
                    <div class="flex gap-2">
                        <dt class="text-white/40 w-36 flex-shrink-0">Website</dt>
                        <dd><a href="{{ $rehearsalroom->website }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">
                            <i class="fas fa-globe w-4"></i> {{ $rehearsalroom->website }}</a></dd>
                    </div>
                    @endif
                </dl>
            </div>

        </div>

        @if($rehearsalroom->description)
        <div class="mt-8">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Description</h3>
            <p class="text-white/70 text-sm leading-relaxed">{!! nl2br(e($rehearsalroom->description)) !!}</p>
        </div>
        @endif

        <div class="mt-8 pt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
            <dl class="flex gap-6 text-xs text-white/30">
                <div><dt class="inline">Added:</dt> <dd class="inline">{{ $rehearsalroom->created_at }}</dd></div>
                <div><dt class="inline">Updated:</dt> <dd class="inline">{{ $rehearsalroom->updated_at }}</dd></div>
            </dl>
            <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

    </div>
</div>

@endsection