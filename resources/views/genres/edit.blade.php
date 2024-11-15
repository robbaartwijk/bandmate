@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Edit genre</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form action="{{ route('genres.update', $genre->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name">Name</label>

                                <input type="text" name="name"
                                    class="form-control
                                    {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ $genre->name }}">

                                <input type="text" name="description"
                                    class="form-control
                                    {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    placeholder="Description" value="{{ $genre->description }}">

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('genres.index') }}" class="btn btn-secondary">Back</a>

                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
