@extends('layouts.app', ['page' => __('Instruments'), 'pageSlug' => 'instruments'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Edit instrument</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form action="{{ route('instruments.update', $instrument->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name">
                                    <h4>Name</h4>
                                </label>
                                <input type="text" name="name"
                                    class="form-control
                                    {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ $instrument->name }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group {{ $errors->has('type') ? 'has-danger' : '' }}">
                                <label for="type">
                                    <h4>Type</h4>
                                </label>
                                <input type="text" name="type"
                                    class="form-control
                                    {{ $errors->has('type') ? 'is-invalid' : '' }}"
                                    placeholder="Type" value="{{ $instrument->type }}">
                                @include('alerts.feedback', ['field' => 'type'])
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('instruments.index') }}" class="btn btn-danger">Back</a>

                            @include('alerts.feedback', ['field' => 'name'])
                    </div>
                </div>
            </div>
        @endsection
