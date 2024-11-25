@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Add vacancy</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('vacancies.store') }}" method="post">
                            @csrf
                            <div
                                class="form-group
                                        {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name">Act name</label>
                                <input type="text" name="name"
                                    class="form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div
                                class="form-group
                                    {{ $errors->has('genre_id') ? 'has-danger' : '' }}">
                                <label for="genre_id">Genre</label>
                                <select name="genre_id"
                                    class="form-control {{ $errors->has('genre_id') ? 'is-invalid' : '' }}">
                                    <option value="">Select</option>
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}"
                                            {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->group }} -
                                            {{ $genre->name }}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'genre_id'])
                            </div>


                            <div
                                class="form-group
                                        {{ $errors->has('description') ? 'has-danger' : '' }}">
                                <label for="description">Description</label>
                                <input type="text" name="description"
                                    class="form-control
                                            {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    placeholder="Description" value="{{ old('description') }}">
                                @include('alerts.feedback', ['field' => 'description'])


                                <button type="submit" class="btn btn-info">Add</button>
                                <a href="{{ route('acts.index') }}" class="btn btn-secondary">danger</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
