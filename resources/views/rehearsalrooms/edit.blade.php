@extends('layouts.app', ['page' => __('rehearsalrooms.edit'), 'pageSlug' => 'rehearsalrooms'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('rehearsalrooms.edit') }}</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('rehearsalrooms.update', $rehearsalroom->id) }}" method="post">
            @csrf @method('put')
            <div class="bm-form-group">
                <label for="name" class="bm-label">{{ __('rehearsalrooms.name') }}</label>
                <input type="text" id="name" name="name" value="{{ old('name', $rehearsalroom->name) }}" class="bm-input" placeholder="{{ __('rehearsalrooms.name_placeholder') }}" required>
                @error('name') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="city" class="bm-label">{{ __('rehearsalrooms.city') }}</label>
                <input type="text" id="city" name="city" value="{{ old('city', $rehearsalroom->city) }}" class="bm-input" placeholder="{{ __('rehearsalrooms.city_placeholder') }}" required>
                @error('city') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="country" class="bm-label">{{ __('rehearsalrooms.country') }}</label>
                <input type="text" id="country" name="country" value="{{ old('country', $rehearsalroom->country) }}" class="bm-input" placeholder="{{ __('rehearsalrooms.country_placeholder') }}" required>
                @error('country') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="price" class="bm-label">{{ __('rehearsalrooms.price') }}</label>
                <input type="number" id="price" name="price" value="{{ old('price', $rehearsalroom->price) }}" step="0.01" min="0" class="bm-input" placeholder="{{ __('rehearsalrooms.price_placeholder') }}" required>
                @error('price') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="description" class="bm-label">{{ __('rehearsalrooms.description') }}</label>
                <textarea id="description" name="description" class="bm-input" rows="4" placeholder="{{ __('rehearsalrooms.description_placeholder') }}">{{ old('description', $rehearsalroom->description) }}</textarea>
                @error('description') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('rehearsalrooms.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection