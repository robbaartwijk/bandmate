@extends('layouts.app', ['page' => __('Instruments'), 'pageSlug' => 'instruments'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Add instrument</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('instruments.store') }}" method="post">
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
                                        {{ $errors->has('type') ? 'has-danger' : '' }}">
                                <label for="type">Type</label>
                                <input type="text" name="type"
                                    class="form-control
                                            {{ $errors->has('type') ? 'is-invalid' : '' }}"
                                    placeholder="Type" value="{{ old('type') }}">
                                @include('alerts.feedback', ['field' => 'type'])
                            </div>

                            <button type="submit" class="btn btn-info">Add</button>
                            <a href="{{ route('instruments.index') }}" class="btn btn-danger">Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
