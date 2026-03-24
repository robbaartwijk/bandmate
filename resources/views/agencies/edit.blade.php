@extends('layouts.app', ['page' => __('agencies.edit'), 'pageSlug' => 'agencies'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('agencies.edit') }}</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('agencies.update', $agency->id) }}" method="post">
            @csrf @method('put')
            <div class="bm-form-group">
                <label for="name" class="bm-label">{{ __('agencies.name') }}</label>
                <input type="text" id="name" name="name" value="{{ old('name', $agency->name) }}" class="bm-input" placeholder="{{ __('agencies.name_placeholder') }}" required>
                @error('name') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="city" class="bm-label">{{ __('agencies.city') }}</label>
                <input type="text" id="city" name="city" value="{{ old('city', $agency->city) }}" class="bm-input" placeholder="{{ __('agencies.city_placeholder') }}" required>
                @error('city') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="country" class="bm-label">{{ __('agencies.country') }}</label>
                <input type="text" id="country" name="country" value="{{ old('country', $agency->country) }}" class="bm-input" placeholder="{{ __('agencies.country_placeholder') }}" required>
                @error('country') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="description" class="bm-label">{{ __('agencies.description') }}</label>
                <textarea id="description" name="description" class="bm-input" rows="4" placeholder="{{ __('agencies.description_placeholder') }}">{{ old('description', $agency->description) }}</textarea>
                @error('description') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('agencies.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection