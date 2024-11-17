@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Add genre</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('genres.store') }}" method="post">
                            @csrf
                            <div
                                class="form-group
                                        {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name">Name</label>
                                <input type="text" name="name"
                                    class="form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div
                                class="form-group
                                    {{ $errors->has('group') ? 'has-danger' : '' }}">
                                <label for="group">Group</label>
                                <input type="text" name="group"
                                    class="form-control
                                        {{ $errors->has('group') ? 'is-invalid' : '' }}"
                                    placeholder="Group" value="{{ old('group') }}">
                                @include('alerts.feedback', ['field' => 'group'])
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
                                </div>


                                <button type="submit" class="btn btn-primary">Add</button>
                                <a href="{{ route('instruments.index') }}" class="btn btn-secondary">Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
