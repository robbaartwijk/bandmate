@extends('layouts.app', ['page' => __('rehearsalrooms.edit'), 'pageSlug' => 'rehearsalrooms'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('rehearsalrooms.edit') }}</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('rehearsalrooms.update', $rehearsalroom->id) }}" method="post" enctype="multipart/form-data">
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

            {{-- Photo upload --}}
            <h3 class="bm-section-title mt-6">Photo</h3>
            <div class="bm-form-group">
                <label for="rehearsalroompic" class="bm-label">Rehearsal room photo</label>
                @php $currentImage = $rehearsalroom->getFirstMedia('images/RehearsalroomPics'); @endphp
                @if($currentImage)
                <div class="mb-3">
                    <img src="{{ asset('/storage/' . $currentImage->id . '/' . $currentImage->file_name) }}"
                         class="rounded-lg border border-white/10"
                         style="max-width:260px; max-height:160px; object-fit:cover;"
                         alt="{{ $rehearsalroom->name }}">
                    <p class="text-white/40 text-xs mt-1">Current photo — upload a new one to replace it.</p>
                </div>
                @endif
                <input type="file" id="rehearsalroompic" name="rehearsalroompic" class="bm-input" accept="image/*">
                <p class="text-white/40 text-xs mt-1">JPG, PNG or WebP. Max 4 MB.</p>
                @error('rehearsalroompic') <span class="bm-error">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('rehearsalrooms.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection