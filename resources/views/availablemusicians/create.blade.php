@extends('layouts.app', ['page' => __('availablemusicians.add'), 'pageSlug' => 'availablemusicians'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('availablemusicians.add') }}</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('availablemusicians.store') }}" method="post">
            @csrf
            <div class="bm-form-group">
                <label for="instrument_id" class="bm-label">{{ __('availablemusicians.instrument') }}</label>
                <select id="instrument_id" name="instrument_id" class="bm-select" required>
                    <option value="">{{ __('availablemusicians.select_instrument') }}</option>
                    @foreach ($instruments as $instrument)
                    <option value="{{ $instrument->id }}" {{ old('instrument_id') == $instrument->id ? 'selected' : '' }}>{{ $instrument->name }}</option>
                    @endforeach
                </select>
                @error('instrument_id') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="description" class="bm-label">{{ __('availablemusicians.description') }}</label>
                <textarea id="description" name="description" class="bm-input" rows="4" placeholder="{{ __('availablemusicians.description_placeholder') }}">{{ old('description') }}</textarea>
                @error('description') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('availablemusicians.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection