@extends('layouts.app', ['page' => __('genres.add'), 'pageSlug' => 'genres'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('genres.add') }}</h2>
        <a href="{{ route('genres.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('genres.store') }}" method="post">
            @csrf
            <div class="bm-form-group">
                <label class="bm-label">{{ __('genres.name') }}</label>
                <input type="text" name="name" value="{{ old('name') }}" class="bm-input @error('name') bm-input-error @enderror" placeholder="{{ __('genres.name_placeholder') }}">
                @error('name')<span class="bm-error">{{ $message }}</span>@enderror
            </div>
            <div class="bm-form-group">
                <label class="bm-label">{{ __('genres.group') }}</label>
                <input type="text" name="group" value="{{ old('group') }}" class="bm-input @error('group') bm-input-error @enderror" placeholder="{{ __('genres.group_placeholder') }}">
                @error('group')<span class="bm-error">{{ $message }}</span>@enderror
            </div>
            <div class="mt-6 flex gap-2">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('genres.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection