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
            <div class="bm-form-group" x-data="cityAutocomplete({{ json_encode(old('city', $availablemusician->city)) }}, {{ json_encode(old('country', $availablemusician->country)) }})" x-init="init()">
                <label for="city" class="bm-label">{{ __('common.col_city') }}</label>
                <div class="relative">
                    <input id="city" name="city" type="text" class="bm-input w-full"
                        placeholder="{{ __('common.col_city') }}"
                        x-model="city"
                        @input.debounce.300ms="search()"
                        @keydown.arrow-down.prevent="highlight(1)"
                        @keydown.arrow-up.prevent="highlight(-1)"
                        @keydown.enter.prevent="selectHighlighted()"
                        @keydown.escape="close()"
                        autocomplete="off"
                    />
                    <ul x-show="open && results.length > 0" x-cloak
                        class="absolute z-50 w-full bg-white border border-gray-200 rounded shadow-lg mt-1 max-h-60 overflow-y-auto">
                        <template x-for="(result, index) in results" :key="index">
                            <li @click="select(result)"
                                :class="index === activeIndex ? 'bg-blue-50 text-blue-800' : 'hover:bg-gray-50'"
                                class="px-4 py-2 cursor-pointer text-sm"
                                x-text="result.label">
                            </li>
                        </template>
                    </ul>
                </div>
                @error('city') <span class="bm-error">{{ $message }}</span> @enderror

                <label for="country" class="bm-label mt-3 block">{{ __('common.col_country') }}</label>
                <input id="country" name="country" type="text" class="bm-input w-full"
                    placeholder="{{ __('common.col_country') }}"
                    x-model="country"
                />
                @error('country') <span class="bm-error">{{ $message }}</span> @enderror
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
                <p class="text-yellow-300 text-xs mt-1">JPG, PNG or WebP. Max 4 MB.</p>
                <span id="availablemusicianpic-size-error" class="bm-error" style="display:none;"></span>
                @if($errors->has('availablemusicianpic'))
                    <span class="bm-error">{{ $errors->first('availablemusicianpic') }}</span>
                @endif
            </div>

            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('availablemusicians.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function cityAutocomplete(initialCity = '', initialCountry = '') {
    return {
        city: initialCity,
        country: initialCountry,
        results: [],
        open: false,
        activeIndex: -1,
        init() {
            document.addEventListener('click', (e) => {
                if (!this.$el.contains(e.target)) this.close();
            });
        },
        async search() {
            this.activeIndex = -1;
            if (this.city.length < 2) { this.results = []; this.open = false; return; }
            try {
                const res = await fetch(
                    `https://nominatim.openstreetmap.org/search?format=json&addressdetails=1&featuretype=city&q=${encodeURIComponent(this.city)}&limit=7`,
                    { headers: { 'Accept-Language': 'en' } }
                );
                const data = await res.json();
                this.results = data
                    .filter(r => ['city','town','village','municipality','administrative'].includes(r.type))
                    .map(r => {
                        const city = r.address?.city || r.address?.town || r.address?.village || r.address?.municipality || r.name;
                        const country = r.address?.country || '';
                        return { label: `${city}, ${country}`, city, country };
                    });
                this.open = this.results.length > 0;
            } catch (e) {
                this.results = []; this.open = false;
            }
        },
        select(result) {
            this.city = result.city;
            this.country = result.country;
            this.close();
        },
        highlight(dir) {
            if (!this.open) return;
            this.activeIndex = Math.max(0, Math.min(this.results.length - 1, this.activeIndex + dir));
        },
        selectHighlighted() {
            if (this.activeIndex >= 0 && this.results[this.activeIndex]) {
                this.select(this.results[this.activeIndex]);
            }
        },
        close() {
            this.open = false;
            this.activeIndex = -1;
        },
    };
}

(function () {
    var fileInput = document.getElementById('availablemusicianpic');
    var errorSpan = document.getElementById('availablemusicianpic-size-error');
    var submitBtn = document.querySelector('button[type="submit"]');
    if (!fileInput) return;

    fileInput.addEventListener('change', function () {
        if (fileInput.files[0] && fileInput.files[0].size > 4 * 1024 * 1024) {
            errorSpan.textContent = 'The photo may not be greater than 4 MB.';
            errorSpan.style.display = 'block';
            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.5';
            submitBtn.style.cursor = 'not-allowed';
        } else {
            errorSpan.textContent = '';
            errorSpan.style.display = 'none';
            submitBtn.disabled = false;
            submitBtn.style.opacity = '';
            submitBtn.style.cursor = '';
        }
    });
})();

</script>
@endpush