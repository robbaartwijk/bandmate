@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header"><h2 class="bm-card-title">Edit genre</h2></div>
    <div class="bm-card-body max-w-lg">
        <form action="{{ route('genres.update', $genre->id) }}" method="post">
            @csrf @method('put')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                <div class="bm-form-group">
                    <label class="bm-label">Name</label>
                    <input type="text" name="name" class="bm-input @error('name') border-red-500 @enderror"
                           value="{{ $genre->name }}">
                    @include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="bm-form-group">
                    <label class="bm-label">Group</label>
                    <input type="text" name="group" class="bm-input @error('group') border-red-500 @enderror"
                           value="{{ $genre->group }}">
                    @include('alerts.feedback', ['field' => 'group'])
                </div>
            </div>
            <div class="bm-form-group">
                <label class="bm-label">Description</label>
                <textarea name="description" class="bm-textarea @error('description') border-red-500 @enderror">{{ $genre->description }}</textarea>
                @include('alerts.feedback', ['field' => 'description'])
            </div>
            <div class="flex items-center gap-3 mt-4 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary"><i class="fas fa-save"></i> Save changes</button>
                <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </form>
    </div>
</div>
@endsection