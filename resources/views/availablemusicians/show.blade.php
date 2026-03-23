@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Available musicians'), 'pageSlug' => 'availablemusicians'])

@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $availablemusician->user->name }}</h2>
        @if($user->is_admin || $user->id == $availablemusician->user_id)
        <a href="{{ route('availablemusicians.edit', $availablemusician->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
            <i class="fas fa-pencil-alt"></i> Edit
        </a>
        @endif
    </div>
    <div class="bm-card-body">
        <div class="flex flex-col md:flex-row gap-8">

            @if(!empty($availablemusician->image))
            <div class="flex-shrink-0">
                <img src="{{ asset('/storage/' . $availablemusician->image->id . '/' . $availablemusician->image->file_name) }}"
                     class="bm_image rounded-xl" style="max-width:240px; width:100%; height:auto;">
            </div>
            @endif

            <div class="flex-1 space-y-6">
                <div>
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Details</h3>
                    <dl class="space-y-2 text-sm">
                        <div class="flex gap-2"><dt class="text-white/40 w-32 flex-shrink-0">Instrument</dt><dd class="text-white/80">{{ $availablemusician->instrument->name }}</dd></div>
                        <div class="flex gap-2"><dt class="text-white/40 w-32 flex-shrink-0">Genre</dt><dd class="text-white/80">{{ $availablemusician->genre->name }}</dd></div>
                        @if(!empty($availablemusician->user->email))
                        <div class="flex gap-2"><dt class="text-white/40 w-32 flex-shrink-0">Email</dt>
                            <dd><a href="mailto:{{ $availablemusician->user->email }}" class="text-indigo-400 hover:text-indigo-300">{{ $availablemusician->user->email }}</a></dd></div>
                        @endif
                        @if(!empty($availablemusician->user->phone))
                        <div class="flex gap-2"><dt class="text-white/40 w-32 flex-shrink-0">Phone</dt><dd class="text-white/80">{{ $availablemusician->user->phone }}</dd></div>
                        @endif
                        <div class="flex gap-2"><dt class="text-white/40 w-32 flex-shrink-0">Available from</dt>
                            <dd><span class="bm-badge bm-badge-green">{{ $availablemusician->available_from }}</span></dd></div>
                        <div class="flex gap-2"><dt class="text-white/40 w-32 flex-shrink-0">Available until</dt>
                            <dd><span class="bm-badge bm-badge-yellow">{{ $availablemusician->available_until }}</span></dd></div>
                    </dl>
                </div>

                @if($availablemusician->description)
                <div>
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Description</h3>
                    <p class="text-white/70 text-sm leading-relaxed">{{ $availablemusician->description }}</p>
                </div>
                @endif
            </div>
        </div>

        <div class="mt-8 pt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
            <dl class="flex gap-6 text-xs text-white/30">
                <div><dt class="inline">Added:</dt> <dd class="inline">{{ $availablemusician->created_at }}</dd></div>
                <div><dt class="inline">Updated:</dt> <dd class="inline">{{ $availablemusician->updated_at }}</dd></div>
            </dl>
            <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection