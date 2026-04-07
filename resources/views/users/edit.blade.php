@extends('layouts.app', ['page' => __('users.edit'), 'pageSlug' => 'users'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('users.edit') }}</h2>
        <a href="{{ route('users.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bm-form-group">
                <label class="bm-label">{{ __('profile.name') }}</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="bm-input @error('name') bm-input-error @enderror">
                @error('name')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="bm-form-group">
                <label class="bm-label">{{ __('profile.email') }}</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="bm-input @error('email') bm-input-error @enderror">
                @error('email')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="bm-form-group">
                <label class="bm-label">{{ __('users.col_role') }}</label>
                <select name="is_admin" class="bm-select">
                    <option value="0" {{ old('is_admin', $user->is_admin) == '0' ? 'selected' : '' }}>{{ __('users.role_user') }}</option>
                    <option value="1" {{ old('is_admin', $user->is_admin) == '1' ? 'selected' : '' }}>{{ __('users.role_admin') }}</option>
                </select>
            </div>

            {{-- Image --}}
            <h3 class="bm-section-title mt-6">{{ __('users.media_section') }}</h3>
            <div class="bm-form-group">
                <label class="bm-label">{{ __('users.upload_image') }}</label>
                @php $currentImage = $user->getFirstMedia('images/AvatarThumbnailPics'); @endphp
                @if($currentImage)
                <div class="mb-3">
                    <img src="{{ asset('/storage/' . $currentImage->id . '/' . $currentImage->file_name) }}"
                         class="rounded-lg border border-white/10"
                         style="max-width:200px; max-height:150px; object-fit:cover;"
                         alt="{{ $user->name }}">
                    <p class="text-white/40 text-xs mt-1">Current image (upload a new one to replace)</p>
                </div>
                @endif
                <input type="file" name="userpic" class="bm-input" accept="image/*">
                @error('userpic')<span class="bm-error">{{ $message }}</span>@enderror
            </div>

            <div class="mt-6 flex gap-2">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('users.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection
