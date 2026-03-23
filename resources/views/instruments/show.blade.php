@extends('layouts.app', ['page' => __('Instruments'), 'pageSlug' => 'instruments'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $instrument->name }}</h2>
        <a href="{{ route('instruments.edit', $instrument->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
    </div>
    <div class="bm-card-body max-w-md">
        <dl class="space-y-2 text-sm">
            <div class="flex gap-2"><dt class="text-white/40 w-20 flex-shrink-0">Name</dt><dd class="text-white/80 font-medium">{{ $instrument->name }}</dd></div>
            <div class="flex gap-2"><dt class="text-white/40 w-20 flex-shrink-0">Type</dt><dd class="text-white/80">{{ $instrument->type }}</dd></div>
        </dl>
        <div class="mt-8 pt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
            <dl class="flex gap-6 text-xs text-white/30">
                <div><dt class="inline">Added:</dt> <dd class="inline">{{ $instrument->created_at }}</dd></div>
                <div><dt class="inline">Updated:</dt> <dd class="inline">{{ $instrument->updated_at }}</dd></div>
            </dl>
            <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection