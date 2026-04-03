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
            <div class="bm-form-group" x-data="cityAutocomplete({{ json_encode(old('city', '')) }}, {{ json_encode(old('country', '')) }})" x-init="init()">
                <label for="city" class="bm-label">{{ __('venues.city') }}</label>
                <div class="relative">
                    <input id="city" name="city" type="text" class="bm-input w-full"
                        placeholder="{{ __('venues.city') }}"
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

                <label for="country" class="bm-label mt-3 block">{{ __('venues.country') }}</label>
                <input id="country" name="country" type="text" class="bm-input w-full"
                    placeholder="{{ __('venues.country') }}"
                    x-model="country"
                />
                @error('country') <span class="bm-error">{{ $message }}</span> @enderror
            </div>
            <div class="bm-form-group">
                <label for="capacity" class="bm-label">{{ __('venues.capacity') }}</label>
                <input type="number" id="capacity" name="capacity" value="{{ old('capacity') }}" min="0" class="bm-input" placeholder="{{ __('venues.capacity_placeholder') }}">
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
                <p class="text-yellow-300 text-xs mt-1">JPG, PNG or WebP. Max 4 MB.</p>
                <span id="venuepic-size-error" class="bm-error" style="display:none;"></span>
                @if($errors->has('venuepic'))
                    <span class="bm-error">{{ $errors->first('venuepic') }}</span>
                @endif
            </div>

            <div class="flex gap-2 mt-6">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('venues.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
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
    var fileInput = document.getElementById('venuepic');
    var errorSpan = document.getElementById('venuepic-size-error');
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