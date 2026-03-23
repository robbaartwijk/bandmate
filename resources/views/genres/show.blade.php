@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $genre->name }}</h2>
        <a href="{{ route('genres.edit', $genre->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
    </div>
    <div class="bm-card-body max-w-lg">
        <dl class="space-y-3 text-sm mb-6">
            <div class="flex gap-2"><dt class="text-white/40 w-24 flex-shrink-0">Name</dt><dd class="text-white/80 font-medium">{{ $genre->name }}</dd></div>
            <div class="flex gap-2"><dt class="text-white/40 w-24 flex-shrink-0">Group</dt>
                <dd><span class="bm-badge bm-badge-blue">{{ $genre->group }}</span></dd></div>
        </dl>
        @if($genre->description)
        <div>
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">Description</h3>
            <p class="text-white/70 text-sm leading-relaxed">{!! nl2br(e($genre->description)) !!}</p>
        </div>
        @endif
        <div class="mt-8 pt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
            <dl class="flex gap-6 text-xs text-white/30">
                <div><dt class="inline">Added:</dt> <dd class="inline">{{ $genre->created_at }}</dd></div>
                <div><dt class="inline">Updated:</dt> <dd class="inline">{{ $genre->updated_at }}</dd></div>
            </dl>
            <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection