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
            <div class="bm-form-group" x-data="cityAutocomplete({{ json_encode(old('city', $agency->city)) }}, {{ json_encode(old('country', $agency->country)) }})" x-init="init()">
                <label for="city" class="bm-label">{{ __('agencies.city') }}</label>
                <div class="relative">
                    <input id="city" name="city" type="text" class="bm-input w-full"
                        placeholder="{{ __('agencies.city') }}"
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

                <label for="country" class="bm-label mt-3 block">{{ __('agencies.country') }}</label>
                <input id="country" name="country" type="text" class="bm-input w-full"
                    placeholder="{{ __('agencies.country') }}"
                    x-model="country"
                />
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
</script>
@endpush