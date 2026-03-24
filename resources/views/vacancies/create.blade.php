@extends('layouts.app', ['page' => __('vacancies.add'), 'pageSlug' => 'vacancies'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('vacancies.add') }}</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('vacancies.store') }}" method="post">
            @csrf
            <div class="bm-form-group">
                <label for="act_id" class="bm-label">{{ __('vacancies.act') }}</label>
                <select id="act_id" name="act_id" class="bm-select" required>
                    <option value="">{{ __('vacancies.select_act') }}</option>
                    @foreach ($acts as $act)
                    <option value="{{ $act->id }}" {{ old('act_id') == $act->id ? 'selected' : '' }}>{{ $act->name }}</option>
                    @endforeach
                </select>
                @error('act_id') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="instrument_id" class="bm-label">{{ __('vacancies.instrument') }}</label>
                <select id="instrument_id" name="instrument_id" class="bm-select" required>
                    <option value="">{{ __('vacancies.select_instrument') }}</option>
                    @foreach ($instruments as $instrument)
                    <option value="{{ $instrument->id }}" {{ old('instrument_id') == $instrument->id ? 'selected' : '' }}>{{ $instrument->name }}</option>
                    @endforeach
                </select>
                @error('instrument_id') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="description" class="bm-label">{{ __('vacancies.description') }}</label>
                <textarea id="description" name="description" class="bm-input" rows="4" placeholder="{{ __('vacancies.description_placeholder') }}">{{ old('description') }}</textarea>
                @error('description') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('vacancies.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection