@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Add act</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('acts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- Column 1: Basic info --}}
                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Basic info</h3>

                    <div class="bm-form-group">
                        <label class="bm-label">Name</label>
                        <input type="text" name="name" class="bm-input @error('name') border-red-500 @enderror"
                               placeholder="Name" value="{{ old('name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Members</label>
                        <input type="number" min="1" name="number_of_members"
                               class="bm-input @error('number_of_members') border-red-500 @enderror"
                               placeholder="Number of members" value="{{ old('number_of_members') }}">
                        @include('alerts.feedback', ['field' => 'number_of_members'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Genre</label>
                        <select name="genre_id" class="bm-select @error('genre_id') border-red-500 @enderror">
                            <option value="">Select genre</option>
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                                {{ $genre->group }} — {{ $genre->name }}
                            </option>
                            @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'genre_id'])
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="rehearsal_room" name="rehearsal_room" class="bm-checkbox" {{ old('rehearsal_room') ? 'checked' : '' }}>
                        <label for="rehearsal_room" class="text-sm text-white/70">Rehearsal room available?</label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="active" name="active" class="bm-checkbox" {{ old('active') ? 'checked' : '' }}>
                        <label for="active" class="text-sm text-white/70">Act currently active?</label>
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Act picture</label>
                        <input type="file" id="actpic" name="actpic" accept="image/*"
                               class="block w-full text-sm text-white/60 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:bg-indigo-600 file:text-white hover:file:bg-indigo-500"
                               onchange="validateFileSize(this)">
                        @include('alerts.feedback', ['field' => 'actpic'])
                    </div>
                </div>

                {{-- Column 2: Contact --}}
                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Contact</h3>

                    @foreach([
                        ['email',   'Email',     'text', 'Email address'],
                        ['phone',   'Phone',     'text', 'Phone number'],
                        ['website', 'Website',   'text', 'https://'],
                        ['facebook','Facebook',  'text', 'Facebook URL'],
                        ['youtube', 'YouTube',   'text', 'YouTube URL'],
                        ['twitter', 'Twitter',   'text', 'Twitter URL'],
                    ] as [$name, $label, $type, $placeholder])
                    <div class="bm-form-group">
                        <label class="bm-label">{{ $label }}</label>
                        <input type="{{ $type }}" name="{{ $name }}"
                               class="bm-input @error($name) border-red-500 @enderror"
                               placeholder="{{ $placeholder }}" value="{{ old($name) }}">
                        @include('alerts.feedback', ['field' => $name])
                    </div>
                    @endforeach
                </div>

                {{-- Column 3: Social --}}
                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Social & media</h3>

                    @foreach([
                        ['instagram',  'Instagram',   'Instagram URL'],
                        ['soundcloud', 'SoundCloud',  'SoundCloud URL'],
                        ['spotify',    'Spotify',     'Spotify URL'],
                        ['bluesky',    'Bluesky',     'Bluesky URL'],
                        ['youtubedemo','Video demo',  'YouTube embed URL'],
                    ] as [$name, $label, $placeholder])
                    <div class="bm-form-group">
                        <label class="bm-label">{{ $label }}</label>
                        <input type="text" name="{{ $name }}"
                               class="bm-input @error($name) border-red-500 @enderror"
                               placeholder="{{ $placeholder }}" value="{{ old($name) }}">
                        @include('alerts.feedback', ['field' => $name])
                    </div>
                    @endforeach
                </div>

            </div>

            {{-- Description: full width --}}
            <div class="mt-6">
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Description</h3>
                <div class="bm-form-group">
                    <label class="bm-label">Description</label>
                    <textarea id="description" name="description"
                              class="bm-textarea @error('description') border-red-500 @enderror"
                              placeholder="Describe the act...">{{ old('description') }}</textarea>
                    @include('alerts.feedback', ['field' => 'description'])
                </div>
            </div>

            <div class="flex items-center gap-3 mt-4 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary">
                    <i class="fas fa-plus"></i> Add act
                </button>
                <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

        </form>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<script>
new SimpleMDE({ element: document.getElementById('description'), toolbar: ['bold','italic','heading','|','quote','unordered-list','ordered-list','|','link','image'] });
function validateFileSize(input) {
    if (input.files[0] && input.files[0].size > 1048576) {
        alert('File size must be less than 1MB');
        input.value = '';
    }
}
</script>
@endpush

@endsection