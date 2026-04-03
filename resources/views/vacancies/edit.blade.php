@extends('layouts.app', ['page' => __('vacancies.edit'), 'pageSlug' => 'vacancies'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('vacancies.edit') }}</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('vacancies.update', $vacancy->id) }}" method="post">
            @csrf @method('put')
            <div class="bm-form-group">
                <label for="act_id" class="bm-label">{{ __('vacancies.act') }}</label>
                <select id="act_id" name="act_id" class="bm-select" required>
                    <option value="">{{ __('vacancies.select_act') }}</option>
                    @foreach ($acts as $act)
                    <option value="{{ $act->id }}" {{ $vacancy->act_id == $act->id ? 'selected' : '' }}>{{ $act->name }}</option>
                    @endforeach
                </select>
                @error('act_id') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="instrument_id" class="bm-label">{{ __('vacancies.instrument') }}</label>
                <select id="instrument_id" name="instrument_id" class="bm-select" required>
                    <option value="">{{ __('vacancies.select_instrument') }}</option>
                    @foreach ($instruments as $instrument)
                    <option value="{{ $instrument->id }}" {{ old('instrument_id', $vacancy->instrument_id) == $instrument->id ? 'selected' : '' }}>{{ $instrument->name }}</option>
                    @endforeach
                </select>
                @error('instrument_id') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="description" class="bm-label">{{ __('vacancies.description') }}</label>
                <textarea id="description" name="description" class="bm-input" rows="4" placeholder="{{ __('vacancies.description_placeholder') }}">{{ old('description', $vacancy->description) }}</textarea>
                @error('description') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="city" class="bm-label">{{ __('common.col_city') }}</label>
                <textarea id="city" name="city" class="bm-input" rows="1" placeholder="{{ __('common.col_city') }}">{{ old('city', $vacancy->city) }}</textarea>
                @error('city') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="country" class="bm-label">{{ __('common.col_country') }}</label>
                <textarea id="country" name="country" class="bm-input" rows="1" placeholder="{{ __('common.col_country') }}">{{ old('country', $vacancy->country) }}</textarea>
                @error('country') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('vacancies.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection