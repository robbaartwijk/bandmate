@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Edit genre</h3>
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

                                <label for="name">Group</label>
                                <input type="text" name="group"
                                    class="form-control
                                    {{ $errors->has('group') ? 'is-invalid' : '' }}"
                                    placeholder="Group" value="{{ $genre->group }}">

                                <label for="name">Description</label>
                                <br>
                                <br>

                                <div>
                                    <textarea name="description" class=" {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description"
                                        rows="5">{{ $genre->description }}</textarea>
                                </div>

                                <br>

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('genres.index') }}" class="btn btn-danger">Back</a>

                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
