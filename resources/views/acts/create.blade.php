@extends('layouts.app', ['page' => __('acts.add'), 'pageSlug' => 'acts'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('acts.add') }}</h2>
        <a href="{{ route('acts.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('acts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="bm-form-group">
                <label class="bm-label">{{ __('acts.name') }}</label>
                <input type="text" name="name" value="{{ old('name') }}" class="bm-input @error('name') bm-input-error @enderror" placeholder="{{ __('acts.name_placeholder') }}">
                @error('name')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="bm-form-group">
                <label class="bm-label">{{ __('common.col_genre') }}</label>
                <select name="genre_id" class="bm-select @error('genre_id') bm-input-error @enderror">
                    <option value="">{{ __('acts.select_genre') }}</option>
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                    @endforeach
                </select>
                @error('genre_id')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="bm-form-group">
                <label class="bm-label">{{ __('acts.members') }}</label>
                <input type="number" name="number_of_members" value="{{ old('number_of_members') }}" class="bm-input @error('number_of_members') bm-input-error @enderror" placeholder="{{ __('acts.members_placeholder') }}">
                @error('number_of_members')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="bm-form-group">
                <label class="bm-label">{{ __('acts.description') }}</label>
                <textarea name="description" rows="4" class="bm-input @error('description') bm-input-error @enderror" placeholder="{{ __('acts.description_placeholder') }}">{{ old('description') }}</textarea>
                @error('description')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="flex flex-wrap gap-6 mt-2 mb-4">
                <div class="bm-form-group flex items-center gap-2 mb-0">
                    <input type="checkbox" name="rehearsal_room" id="rehearsal_room" class="bm-checkbox" {{ old('rehearsal_room') === 'on' ? 'checked' : '' }}>
                    <label for="rehearsal_room" class="bm-label mb-0">Rehearsal room</label>
                </div>
                <div class="bm-form-group flex items-center gap-2 mb-0">
                    <input type="checkbox" name="active" id="active" class="bm-checkbox" {{ old('active') === 'on' ? 'checked' : '' }}>
                    <label for="active" class="bm-label mb-0">Active</label>
                </div>
                {{-- FIX: removed is_private checkbox — field is not in Act $fillable, not read by store(), and has no DB column --}}
            </div>

            {{-- Contact information --}}
            <h3 class="bm-section-title mt-6">{{ __('acts.contact_info') }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.email_label') }}</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="bm-input @error('email') bm-input-error @enderror">
                    @error('email')<span class="bm-error">{{ $message }}</span>@enderror
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.phone_label') }}</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="bm-input @error('phone') bm-input-error @enderror">
                    @error('phone')<span class="bm-error">{{ $message }}</span>@enderror
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.website_label') }}</label>
                    <input type="url" name="website" value="{{ old('website') }}" class="bm-input">
                </div>
            </div>

            {{-- Social media & links --}}
            <h3 class="bm-section-title mt-6">{{ __('acts.social_links') }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.facebook_label') }}</label>
                    <input type="url" name="facebook" value="{{ old('facebook') }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.youtube_label') }}</label>
                    <input type="url" name="youtube" value="{{ old('youtube') }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.instagram_label') }}</label>
                    <input type="url" name="instagram" value="{{ old('instagram') }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.twitter_label') }}</label>
                    <input type="url" name="twitter" value="{{ old('twitter') }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.soundcloud_label') }}</label>
                    <input type="url" name="soundcloud" value="{{ old('soundcloud') }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.spotify_label') }}</label>
                    <input type="url" name="spotify" value="{{ old('spotify') }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.bluesky_label') }}</label>
                    <input type="url" name="bluesky" value="{{ old('bluesky') }}" class="bm-input">
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">{{ __('acts.video_demo_label') }}</label>
                    <input type="url" name="youtubedemo" value="{{ old('youtubedemo') }}" class="bm-input" placeholder="https://www.youtube.com/watch?v=...">
                </div>
            </div>

            {{-- Image --}}
            <h3 class="bm-section-title mt-6">{{ __('acts.media_section') }}</h3>
            <div class="bm-form-group">
                <label class="bm-label">{{ __('acts.upload_image') }}</label>
                <input type="file" name="actpic" class="bm-input" accept="image/*">
                @error('actpic')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="mt-6 flex gap-2">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('acts.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection