@extends('layouts.app', ['page' => __('venues.add'), 'pageSlug' => 'venues'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('venues.add') }}</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('venues.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bm-form-group">
                <label for="name" class="bm-label">{{ __('venues.name') }}</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="bm-input" placeholder="{{ __('venues.name_placeholder') }}" required>
                @error('name') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="city" class="bm-label">{{ __('venues.city') }}</label>
                <input type="text" id="city" name="city" value="{{ old('city') }}" class="bm-input" placeholder="{{ __('venues.city_placeholder') }}" required>
                @error('city') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="country" class="bm-label">{{ __('venues.country') }}</label>
                <input type="text" id="country" name="country" value="{{ old('country') }}" class="bm-input" placeholder="{{ __('venues.country_placeholder') }}" required>
                @error('country') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="capacity" class="bm-label">{{ __('venues.capacity') }}</label>
                <input type="number" id="capacity" name="capacity" value="{{ old('capacity') }}" min="0" class="bm-input" placeholder="{{ __('venues.capacity_placeholder') }}" required>
                @error('capacity') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="description" class="bm-label">{{ __('venues.description') }}</label>
                <textarea id="description" name="description" class="bm-input" rows="4" placeholder="{{ __('venues.description_placeholder') }}">{{ old('description') }}</textarea>
                @error('description') <span class="bm-error">{{ $message }}</span> @enderror
            </div>

            {{-- Contact --}}
            <h3 class="bm-section-title mt-6">Contact</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bm-form-group">
                    <label for="phone" class="bm-label">{{ __('venues.phone') }}</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="bm-input @error('phone') bm-input-error @enderror" placeholder="+31 20 000 0000">
                    @error('phone') <span class="bm-error">{{ $message }}</span> @enderror
                </div>
                <div class="bm-form-group">
                    <label for="email" class="bm-label">{{ __('venues.email') }}</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="bm-input @error('email') bm-input-error @enderror">
                    @error('email') <span class="bm-error">{{ $message }}</span> @enderror
                </div>
                <div class="bm-form-group md:col-span-2">
                    <label for="website" class="bm-label">{{ __('venues.website') }}</label>
                    <input type="url" id="website" name="website" value="{{ old('website') }}" class="bm-input @error('website') bm-input-error @enderror" placeholder="https://...">
                    @error('website') <span class="bm-error">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Photo upload --}}
            <h3 class="bm-section-title mt-6">Photo</h3>
            <div class="bm-form-group">
                <label for="venuepic" class="bm-label">Venue photo</label>
                <input type="file" id="venuepic" name="venuepic" class="bm-input" accept="image/*">
                <p class="text-white/40 text-xs mt-1">JPG, PNG or WebP. Max 4 MB.</p>
                @error('venuepic') <span class="bm-error">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('venues.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection