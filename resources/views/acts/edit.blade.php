@extends('layouts.app', ['page' => __('acts.edit'), 'pageSlug' => 'acts'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('acts.edit') }}</h2>
        <a href="{{ route('acts.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('acts.update', $act->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bm-form-group">
                <label class="bm-label">{{ __('acts.name') }}</label>
                <input type="text" name="name" value="{{ old('name', $act->name) }}" class="bm-input @error('name') bm-input-error @enderror" placeholder="{{ __('acts.name_placeholder') }}">
                @error('name')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="bm-form-group">
                <label class="bm-label">{{ __('common.col_genre') }}</label>
                <select name="genre_id" class="bm-select @error('genre_id') bm-input-error @enderror">
                    <option value="">{{ __('acts.select_genre') }}</option>
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id', $act->genre_id) == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="bm-form-group">
                <label class="bm-label">{{ __('acts.members') }}</label>
                <input type="number" name="number_of_members" value="{{ old('number_of_members', $act->number_of_members) }}" class="bm-input @error('number_of_members') bm-input-error @enderror" placeholder="{{ __('acts.members_placeholder') }}">
                @error('number_of_members')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="bm-form-group">
                <label class="bm-label">{{ __('acts.description') }}</label>
                <textarea name="description" rows="4" class="bm-input @error('description') bm-input-error @enderror" placeholder="{{ __('acts.description_placeholder') }}">{{ old('description', $act->description) }}</textarea>
                @error('description')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-wrap gap-6 mt-2 mb-4">
                <div class="bm-form-group flex items-center gap-2 mb-0">
                    <input type="checkbox" name="rehearsal_room" id="rehearsal_room" class="bm-checkbox" {{ $act->rehearsal_room ? 'checked' : '' }}>
                    <label for="rehearsal_room" class="bm-label mb-0">Rehearsal room</label>
                </div>
                <div class="bm-form-group flex items-center gap-2 mb-0">
                    <input type="checkbox" name="active" id="active" class="bm-checkbox" {{ $act->active ? 'checked' : '' }}>
                    <label for="active" class="bm-label mb-0">Active</label>
                </div>
                <div class="bm-form-group flex items-center gap-2 mb-0">
                    <input type="checkbox" name="is_private" id="is_private" value="1" {{ old('is_private', $act->is_private) ? 'checked' : '' }} class="bm-checkbox">
                    <label for="is_private" class="bm-label mb-0">{{ __('acts.is_private') }}</label>
                </div>
            </div>

            {{-- Contact information --}}
            <h3 class="bm-section-title mt-6">{{ __('acts.contact_info') }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.email_label') }}</label>
                    <input type="email" name="email" value="{{ old('email', $act->email) }}" class="bm-input @error('email') bm-input-error @enderror">
                    @error('email')<span class="bm-error">{{ $message }}</span>@enderror
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.phone_label') }}</label>
                    <input type="text" name="phone" value="{{ old('phone', $act->phone) }}" class="bm-input @error('phone') bm-input-error @enderror">
                    @error('phone')<span class="bm-error">{{ $message }}</span>@enderror
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.website_label') }}</label>
                    <input type="url" name="website" value="{{ old('website', $act->website) }}" class="bm-input">
                </div>
            </div>

            {{-- Social media & links --}}
            <h3 class="bm-section-title mt-6">{{ __('acts.social_links') }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.facebook_label') }}</label>
                    <input type="url" name="facebook" value="{{ old('facebook', $act->facebook) }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.youtube_label') }}</label>
                    <input type="url" name="youtube" value="{{ old('youtube', $act->youtube) }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.instagram_label') }}</label>
                    <input type="url" name="instagram" value="{{ old('instagram', $act->instagram) }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.twitter_label') }}</label>
                    <input type="url" name="twitter" value="{{ old('twitter', $act->twitter) }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.soundcloud_label') }}</label>
                    <input type="url" name="soundcloud" value="{{ old('soundcloud', $act->soundcloud) }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.spotify_label') }}</label>
                    <input type="url" name="spotify" value="{{ old('spotify', $act->spotify) }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.bluesky_label') }}</label>
                    <input type="url" name="bluesky" value="{{ old('bluesky', $act->bluesky) }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.video_demo_label') }}</label>
                    <input type="url" name="youtubedemo" value="{{ old('youtubedemo', $act->youtubedemo) }}" class="bm-input" placeholder="https://www.youtube.com/watch?v=...">
                </div>
            </div>

            {{-- Image --}}
            <h3 class="bm-section-title mt-6">{{ __('acts.media_section') }}</h3>
            <div class="bm-form-group">
                <label class="bm-label">{{ __('acts.upload_image') }}</label>
                @php $currentImage = $act->getFirstMedia('images/ActPics'); @endphp
                @if($currentImage)
                <div class="mb-3">
                    <img src="{{ asset('/storage/' . $currentImage->id . '/' . $currentImage->file_name) }}"
                         class="rounded-lg border border-white/10"
                         style="max-width:200px; max-height:150px; object-fit:cover;"
                         alt="{{ $act->name }}">
                    <p class="text-white/40 text-xs mt-1">Current image (upload a new one to replace)</p>
                </div>
                @endif
                <input type="file" name="actpic" class="bm-input" accept="image/*">
                @error('actpic')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="mt-6 flex gap-2">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('acts.show', $act->id) }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection