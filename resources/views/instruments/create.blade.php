@extends('layouts.app', ['page' => __('instruments.add'), 'pageSlug' => 'instruments'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('instruments.add') }}</h2>
        <a href="{{ route('instruments.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('instruments.store') }}" method="post">
            @csrf
            <div class="bm-form-group">
                <label class="bm-label">{{ __('instruments.name') }}</label>
                <input type="text" name="name" value="{{ old('name') }}" class="bm-input @error('name') bm-input-error @enderror" placeholder="{{ __('instruments.name_placeholder') }}">
                @error('name')<span class="bm-error">{{ $message }}</span>@enderror
            </div>
            <div class="bm-form-group">
                <label class="bm-label">{{ __('instruments.type') }}</label>
                <input type="text" name="type" value="{{ old('type') }}" class="bm-input @error('type') bm-input-error @enderror" placeholder="{{ __('instruments.type_placeholder') }}">
                @error('type')<span class="bm-error">{{ $message }}</span>@enderror
            </div>
            <div class="mt-6 flex gap-2">
                <button type="submit" class="bm-btn bm-btn-primary">{{ __('common.save') }}</button>
                <a href="{{ route('instruments.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.cancel') }}</a>
            </div>
        </form>
    </div>
</div>
@endsection