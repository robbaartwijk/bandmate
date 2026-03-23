@extends('layouts.app', ['page' => __('Available musicians'), 'pageSlug' => 'availablemusicians'])

@section('content')
<div class="bm-card">
    <div class="bm-card-header"><h2 class="bm-card-title">Edit available musician listing</h2></div>
    <div class="bm-card-body">
        <form action="{{ route('availablemusicians.update', $availablemusician->id) }}" method="post" enctype="multipart/form-data">
            @csrf @method('put')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="space-y-4">

                    <div class="bm-form-group">
                        <label class="bm-label">Musician name</label>
                        <input type="text" class="bm-input bg-gray-700/50 text-emerald-400 cursor-not-allowed"
                               value="{{ $availablemusician->user->name }}" readonly>
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Instrument</label>
                        <select name="instrument_id" class="bm-select @error('instrument_id') border-red-500 @enderror">
                            @foreach ($availablemusician->instruments as $instrument)
                            <option value="{{ $instrument->id }}" {{ $availablemusician->instrument->id == $instrument->id ? 'selected' : '' }}>
                                {{ $instrument->type }} — {{ $instrument->name }}
                            </option>
                            @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'instrument_id'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Genre</label>
                        <select name="genre_id" class="bm-select @error('genre_id') border-red-500 @enderror">
                            @foreach ($availablemusician->genres as $genre)
                            <option value="{{ $genre->id }}" {{ $availablemusician->genre->id == $genre->id ? 'selected' : '' }}>
                                {{ $genre->group }} — {{ $genre->name }}
                            </option>
                            @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'genre_id'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Available from</label>
                        <input type="date" name="available_from" class="bm-input @error('available_from') border-red-500 @enderror"
                               value="{{ old('available_from', $availablemusician->available_from) }}">
                        @include('alerts.feedback', ['field' => 'available_from'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Available until</label>
                        <input type="date" name="available_until" class="bm-input @error('available_until') border-red-500 @enderror"
                               value="{{ old('available_until', $availablemusician->available_until) }}">
                        @include('alerts.feedback', ['field' => 'available_until'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Picture</label>
                        @if(!empty($availablemusician->image))
                        <img src="{{ asset('/storage/' . $availablemusician->image->id . '/' . $availablemusician->image->file_name) }}"
                             class="bm_thumbnail mb-2">
                        @endif
                        <input type="file" id="availablemusicianpic" name="availablemusicianpic" accept="image/*"
                               class="block w-full text-sm text-white/60 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:bg-indigo-600 file:text-white hover:file:bg-indigo-500"
                               onchange="validateFileSize(this)">
                        @include('alerts.feedback', ['field' => 'availablemusicianpic'])
                    </div>
                </div>

                <div class="bm-form-group">
                    <label class="bm-label">Description</label>
                    <textarea name="description" class="bm-textarea h-48 @error('description') border-red-500 @enderror">{{ $availablemusician->description }}</textarea>
                    @include('alerts.feedback', ['field' => 'description'])
                </div>
            </div>

            <div class="flex items-center gap-3 mt-4 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary"><i class="fas fa-save"></i> Save changes</button>
                <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function validateFileSize(input) {
    if (input.files[0] && input.files[0].size > 1048576) {
        alert('File size must be less than 1MB');
        input.value = '';
    }
}
</script>
@endpush
@endsection