@extends('layouts.app', ['page' => __('venues.edit'), 'pageSlug' => 'venues'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('venues.edit') }}</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('venues.update', $venue->id) }}" method="post">
            @csrf @method('put')
            <div class="bm-form-group">
                <label for="name" class="bm-label">{{ __('venues.name') }}</label>
                <input type="text" id="name" name="name" value="{{ old('name', $venue->name) }}" class="bm-input" placeholder="{{ __('venues.name_placeholder') }}" required>
                @error('name') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="city" class="bm-label">{{ __('venues.city') }}</label>
                <input type="text" id="city" name="city" value="{{ old('city', $venue->city) }}" class="bm-input" placeholder="{{ __('venues.city_placeholder') }}" required>
                @error('city') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="country" class="bm-label">{{ __('venues.country') }}</label>
                <input type="text" id="country" name="country" value="{{ old('country', $venue->country) }}" class="bm-input" placeholder="{{ __('venues.country_placeholder') }}" required>
                @error('country') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="capacity" class="bm-label">{{ __('venues.capacity') }}</label>
                <input type="number" id="capacity" name="capacity" value="{{ old('capacity', $venue->capacity) }}" min="0" class="bm-input" placeholder="{{ __('venues.capacity_placeholder') }}" required>
                @error('capacity') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="description" class="bm-label">{{ __('venues.description') }}</label>
                <textarea id="description" name="description" class="bm-input" rows="4" placeholder="{{ __('venues.description_placeholder') }}">{{ old('description', $venue->description) }}</textarea>
                @error('description') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('venues.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection