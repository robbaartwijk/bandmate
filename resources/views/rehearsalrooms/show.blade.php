@extends('layouts.app', ['page' => $rehearsalroom->name, 'pageSlug' => 'rehearsalrooms'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $rehearsalroom->name }}</h2>
    </div>

    {{-- Cover photo --}}
    @if(!empty($rehearsalroom->image))
    <div class="w-full overflow-hidden" style="max-height:320px;">
        <img src="{{ asset('/storage/' . $rehearsalroom->image->id . '/' . $rehearsalroom->image->file_name) }}"
             alt="{{ $rehearsalroom->name }}"
             class="w-full object-cover"
             style="max-height:320px;">
    </div>
    @endif

    <div class="bm-card-body">
        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.name') }}</th>
                    <td>{{ $rehearsalroom->name }}</td>
                </tr>
                @if($rehearsalroom->address)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.address') }}</th>
                    <td>{{ $rehearsalroom->address }}</td>
                </tr>
                @endif
                @if($rehearsalroom->zip || $rehearsalroom->state)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.zip') }}</th>
                    <td>{{ trim(($rehearsalroom->zip ?? '') . ' ' . ($rehearsalroom->state ?? '')) }}</td>
                </tr>
                @endif
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.city') }}</th>
                    <td>{{ $rehearsalroom->city }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.country') }}</th>
                    <td>{{ $rehearsalroom->country }}</td>
                </tr>
                @if($rehearsalroom->price)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.price') }}</th>
                    <td>{{ number_format($rehearsalroom->price, 2) }}</td>
                </tr>
                @endif
                @if($rehearsalroom->phone)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.phone') }}</th>
                    <td>{{ $rehearsalroom->phone }}</td>
                </tr>
                @endif
                @if($rehearsalroom->email)
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.email') }}</th>
                    <td><a href="mailto:{{ $rehearsalroom->email }}" class="text-indigo-400 hover:text-indigo-300">{{ $rehearsalroom->email }}</a></td>
                </tr>
                @endif
                <tr>
                    <th class="text-white/60 font-medium">{{ __('rehearsalrooms.description') }}</th>
                    <td>{{ $rehearsalroom->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td>{{ $rehearsalroom->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td>{{ $rehearsalroom->updated_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            </tbody>
        </table>

        {{-- Map --}}
        @php
            $mapParts = array_filter([
                $rehearsalroom->address ?? null,
                $rehearsalroom->city    ?? null,
                $rehearsalroom->zip     ?? null,
                $rehearsalroom->state   ?? null,
                $rehearsalroom->country ?? null,
            ]);
            $mapQuery = implode(', ', $mapParts);
        @endphp
        @if($mapQuery)
        <div class="mt-8">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">
                <i class="fas fa-map-marker-alt mr-1"></i> Location
            </h3>
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
            <div id="room-map" class="rounded-lg overflow-hidden w-full" style="height:320px; z-index:0;"></div>
            <div id="room-map-error" class="hidden text-white/40 text-sm mt-2 italic">
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
            const label = @json($rehearsalroom->name);
            fetch('https://nominatim.openstreetmap.org/search?format=json&limit=1&q=' + encodeURIComponent(query))
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    if (!data || !data.length) {
                        document.getElementById('room-map').style.display = 'none';
                        document.getElementById('room-map-error').classList.remove('hidden');
                        return;
                    }
                    const lat = parseFloat(data[0].lat);
                    const lon = parseFloat(data[0].lon);
                    const map = L.map('room-map').setView([lat, lon], 15);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a> contributors',
                        maxZoom: 19
                    }).addTo(map);
                    L.marker([lat, lon]).addTo(map)
                        .bindPopup('<strong>' + label + '</strong><br>' + query)
                        .openPopup();
                })
                .catch(function () {
                    document.getElementById('room-map').style.display = 'none';
                    document.getElementById('room-map-error').classList.remove('hidden');
                });
        })();
        </script>
        @endif

        <div class="flex gap-2 mt-6">
            <a href="{{ route('rehearsalrooms.edit', $rehearsalroom->id) }}" class="bm-btn bm-btn-primary"><i class="fas fa-pencil-alt"></i> {{ __('common.edit') }}</a>
            <form action="{{ route('rehearsalrooms.destroy', $rehearsalroom->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger"
                        onclick="if(confirm('{{ __('rehearsalrooms.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i> {{ __('common.delete') }}
                </button>
            </form>
            <a href="{{ route('rehearsalrooms.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.back') }}</a>
        </div>
    </div>
</div>
@endsection