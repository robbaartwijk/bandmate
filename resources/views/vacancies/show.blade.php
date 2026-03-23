@php $user = auth()->user(); @endphp
@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Vacancy: {{ $vacancy->act_name }}</h2>
        @if($user->is_admin || $user->id == $vacancy->user_id)
        <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm">
            <i class="fas fa-pencil-alt"></i> Edit
        </a>
        @endif
    </div>

    <div class="bm-card-body">

        <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Details</h3>

        <dl class="space-y-2 text-sm">
            <div class="flex gap-2">
                <dt class="text-white/40 w-36 flex-shrink-0">Act</dt>
                <dd class="text-white/80">
                    <a href="{{ route('acts.show', $vacancy->act_id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $vacancy->act_name }}</a>
                </dd>
            </div>
            <div class="flex gap-2">
                <dt class="text-white/40 w-36 flex-shrink-0">Instrument</dt>
                <dd class="text-white/80">{{ $vacancy->instrument_name }}</dd>
            </div>
            <div class="flex gap-2">
                <dt class="text-white/40 w-36 flex-shrink-0">Created by</dt>
                <dd class="text-white/80">{{ $vacancy->user_name }}</dd>
            </div>
        </dl>

        @if($vacancy->description)
        <div class="mt-6">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Description</h3>
            <p class="text-white/70 text-sm leading-relaxed">{!! nl2br(e($vacancy->description)) !!}</p>
        </div>
        @endif

        <div class="mt-8 pt-4 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
            <dl class="flex gap-6 text-xs text-white/30">
                <div><dt class="inline">Added:</dt> <dd class="inline">{{ $vacancy->created_at }}</dd></div>
                <div><dt class="inline">Updated:</dt> <dd class="inline">{{ $vacancy->updated_at }}</dd></div>
            </dl>
            <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

    </div>
</div>

@endsection