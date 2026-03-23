@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Edit vacancy</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('vacancies.update', $vacancy->id) }}" method="post">
            @csrf
            @method('put')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Selects --}}
                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Details</h3>

                    <div class="bm-form-group">
                        <label class="bm-label">Act</label>
                        <select name="act_id" class="bm-select @error('act_id') border-red-500 @enderror">
                            @foreach ($acts as $act)
                            <option value="{{ $act->id }}" {{ $vacancy->act_id == $act->id ? 'selected' : '' }}>{{ $act->name }}</option>
                            @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'act_id'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Instrument</label>
                        <select name="instrument_id" class="bm-select @error('instrument_id') border-red-500 @enderror">
                            <option value="">Select instrument</option>
                            @foreach ($instruments as $instrument)
                            <option value="{{ $instrument->id }}" {{ $vacancy->instrument_id == $instrument->id ? 'selected' : '' }}>{{ $instrument->type }} - {{ $instrument->name }}</option>
                            @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'instrument_id'])
                    </div>
                </div>

                {{-- Description --}}
                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Description</h3>

                    <div class="bm-form-group">
                        <label class="bm-label">Description</label>
                        <textarea name="description" class="bm-textarea @error('description') border-red-500 @enderror"
                                  placeholder="Describe the vacancy...">{{ $vacancy->description }}</textarea>
                        @include('alerts.feedback', ['field' => 'description'])
                    </div>
                </div>

            </div>

            <div class="flex items-center gap-3 mt-6 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary">
                    <i class="fas fa-save"></i> Update vacancy
                </button>
                <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>

@endsection