@extends('layouts.app', ['page' => __('availablemusicians.edit'), 'pageSlug' => 'availablemusicians'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('availablemusicians.edit') }}</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('availablemusicians.update', $availablemusician->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="bm-form-group">
                <label for="instrument_id" class="bm-label">{{ __('availablemusicians.instrument') }}</label>
                <select id="instrument_id" name="instrument_id" class="bm-select" required>
                    <option value="">{{ __('availablemusicians.select_instrument') }}</option>
                    @foreach ($availablemusician->instruments as $instrument)
                    <option value="{{ $instrument->id }}" {{ old('instrument_id', $availablemusician->instrument_id) == $instrument->id ? 'selected' : '' }}>{{ $instrument->name }}</option>
                    @endforeach
                </select>
                @error('instrument_id') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="genre_id" class="bm-label">{{ __('common.col_genre') }}</label>
                <select id="genre_id" name="genre_id" class="bm-select" required>
                    <option value="">{{ __('common.select_genre') }}</option>
                    @foreach ($availablemusician->genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id', $availablemusician->genre_id) == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="description" class="bm-label">{{ __('availablemusicians.description') }}</label>
                <textarea id="description" name="description" class="bm-input" rows="4" placeholder="{{ __('availablemusicians.description_placeholder') }}">{{ old('description', $availablemusician->description) }}</textarea>
                @error('description') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="city" class="bm-label">{{ __('common.col_city') }}</label>
                <input type="text" id="city" name="city" class="bm-input" value="{{ old('city', $availablemusician->city) }}" maxlength="100" placeholder="{{ __('common.col_city') }}">
                @error('city') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="available_from" class="bm-label">{{ __('availablemusicians.available_from') }}</label>
                <input type="date" id="available_from" name="available_from" class="bm-input"
                       value="{{ old('available_from', $availablemusician->available_from ? substr($availablemusician->available_from, 0, 10) : '') }}">
                @error('available_from') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="available_until" class="bm-label">{{ __('availablemusicians.available_until') }}</label>
                <input type="date" id="available_until" name="available_until" class="bm-input"
                       value="{{ old('available_until', $availablemusician->available_until ? substr($availablemusician->available_until, 0, 10) : '') }}">
                @error('available_until') <span class="bm-error">{{ $message }}</span> @enderror
            </div>

            {{-- Photo --}}
            <h3 class="bm-section-title mt-6">Photo</h3>
            <div class="bm-form-group">
                <label for="availablemusicianpic" class="bm-label">Profile photo</label>
                @php $currentImage = $availablemusician->getFirstMedia('images/AvailablemusicianPics'); @endphp
                @if($currentImage)
                <div class="mb-3 flex items-center gap-4">
                    <img src="{{ asset('/storage/' . $currentImage->id . '/' . $currentImage->file_name) }}"
                         class="rounded-full border-2 border-white/20 object-cover"
                         style="width:80px; height:80px;"
                         alt="{{ $availablemusician->user->name }}">
                    <p class="text-white/40 text-xs">Current photo — upload a new one to replace it.</p>
                </div>
                @endif
                <input type="file" id="availablemusicianpic" name="availablemusicianpic" class="bm-input" accept="image/*">
                <p class="text-white/40 text-xs mt-1">JPG, PNG or WebP. Max 4 MB.</p>
                @error('availablemusicianpic') <span class="bm-error">{{ $message }}</span> @enderror
            </div>

            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('availablemusicians.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection