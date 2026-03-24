@extends('layouts.app', ['page' => __('users.edit'), 'pageSlug' => 'users'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('users.edit') }}</h2>
        <a href="{{ route('users.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('users.update', $user->id) }}" method="post">
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

            <div class="mt-6 flex gap-2">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('users.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection