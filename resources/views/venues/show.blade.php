@extends('layouts.app', ['page' => $venue->name, 'pageSlug' => 'venues'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $venue->name }}</h2>
    </div>

    {{-- Cover photo --}}
    @if(!empty($venue->image))
    <div class="w-full overflow-hidden" style="max-height:320px;">
        <img src="{{ asset('/storage/' . $venue->image->id . '/' . $venue->image->file_name) }}"
             alt="{{ $venue->name }}"
             class="w-full object-cover"
             style="max-height:320px;">
    </div>
    @endif

    <div class="bm-card-body">
        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.name') }}</th>
                    <td>{{ $venue->name }}</td>
                </tr>
                @if($venue->address)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.address') }}</th>
                    <td>{{ $venue->address }}</td>
                </tr>
                @endif
                @if($venue->zip || $venue->state)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.zip') }}</th>
                    <td>{{ trim(($venue->zip ?? '') . ' ' . ($venue->state ?? '')) }}</td>
                </tr>
                @endif
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.city') }}</th>
                    <td>{{ $venue->city }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.country') }}</th>
                    <td>{{ $venue->country }}</td>
                </tr>
                @if($venue->capacity)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.capacity') }}</th>
                    <td>{{ $venue->capacity }}</td>
                </tr>
                @endif
                @if($venue->phone)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.phone') }}</th>
                    <td>{{ $venue->phone }}</td>
                </tr>
                @endif
                @if($venue->email)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.email') }}</th>
                    <td><a href="mailto:{{ $venue->email }}" class="text-indigo-400 hover:text-indigo-300">{{ $venue->email }}</a></td>
                </tr>
                @endif
                @if($venue->website)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.website') }}</th>
                    <td><a href="{{ $venue->website }}" target="_blank" class="text-indigo-400 hover:text-indigo-300 break-all">{{ $venue->website }}</a></td>
                </tr>
                @endif
                <tr>
                    <th class="text-white/60 font-medium">{{ __('venues.description') }}</th>
                    <td>{{ $venue->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td>{{ $venue->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td>{{ $venue->updated_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Map --}}
        @php
            $mapParts = array_filter([
                $venue->address ?? null,
                $venue->city    ?? null,
                $venue->zip     ?? null,
                $venue->state   ?? null,
                $venue->country ?? null,
            ]);
            $mapQuery = implode(', ', $mapParts);
        @endphp
        @if($mapQuery)
        <div class="mt-8">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">
                <i class="fas fa-map-marker-alt mr-1"></i> Location
            </h3>
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
            <div id="venue-map" class="rounded-lg overflow-hidden w-full" style="height:320px; z-index:0;"></div>
            <div id="venue-map-error" class="hidden text-white/40 text-sm mt-2 italic">
                <i class="fas fa-exclamation-circle mr-1"></i> Location could not be found on the map.
            </div>
            <a href="https://www.openstreetmap.org/search?query={{ urlencode($mapQuery) }}"
               target="_blank"
               class="inline-flex items-center gap-1 text-indigo-400 hover:text-indigo-300 text-xs mt-2">
                <i class="fas fa-external-link-alt"></i> Open in OpenStreetMap
            </a>
        </div>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
        (function () {
            const query = @json($mapQuery);
            const label = @json($venue->name);
            fetch('https://nominatim.openstreetmap.org/search?format=json&limit=1&q=' + encodeURIComponent(query))
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    if (!data || !data.length) {
                        document.getElementById('venue-map').style.display = 'none';
                        document.getElementById('venue-map-error').classList.remove('hidden');
                        return;
                    }
                    const lat = parseFloat(data[0].lat);
                    const lon = parseFloat(data[0].lon);
                    const map = L.map('venue-map').setView([lat, lon], 15);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a> contributors',
                        maxZoom: 19
                    }).addTo(map);
                    L.marker([lat, lon]).addTo(map)
                        .bindPopup('<strong>' + label + '</strong><br>' + query)
                        .openPopup();
                })
                .catch(function () {
                    document.getElementById('venue-map').style.display = 'none';
                    document.getElementById('venue-map-error').classList.remove('hidden');
                });
        })();
        </script>
        @endif

        <div class="flex gap-2 mt-6">
            <a href="{{ route('venues.edit', $venue->id) }}" class="bm-btn bm-btn-primary"><i class="fas fa-pencil-alt"></i> {{ __('common.edit') }}</a>
            <form action="{{ route('venues.destroy', $venue->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger"
                        onclick="if(confirm('{{ __('venues.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i> {{ __('common.delete') }}
                </button>
            </form>
            <a href="{{ route('venues.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.back') }}</a>
        </div>
    </div>
</div>
@endsection