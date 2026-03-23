@extends('layouts.app', ['page' => __('Instruments'), 'pageSlug' => 'instruments'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header"><h2 class="bm-card-title">Edit instrument</h2></div>
    <div class="bm-card-body max-w-md">
        <form action="{{ route('instruments.update', $instrument->id) }}" method="post">
            @csrf @method('put')
            <div class="bm-form-group">
                <label class="bm-label">Name</label>
                <input type="text" name="name" class="bm-input @error('name') border-red-500 @enderror"
                       value="{{ $instrument->name }}">
                @include('alerts.feedback', ['field' => 'name'])
            </div>
            <div class="bm-form-group">
                <label class="bm-label">Type</label>
                <input type="text" name="type" class="bm-input @error('type') border-red-500 @enderror"
                       value="{{ $instrument->type }}">
                @include('alerts.feedback', ['field' => 'type'])
            </div>
            <div class="flex items-center gap-3 mt-4 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary"><i class="fas fa-save"></i> Save changes</button>
                <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </form>
    </div>
</div>
@endsection