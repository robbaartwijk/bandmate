@extends('layouts.app', ['page' => __('agencies'), 'pageSlug' => 'agencies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Edit agency</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form action="{{ route('agencies.update', $agency->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name">Name</label>

                                <input type="text" name="name"
                                    class="form-control
                                    {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ $agency->name }}">

                                <input type="text" name="description"
                                    class="form-control
                                    {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    placeholder="Description" value="{{ $agency->description }}">

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('agencies.index') }}" class="btn btn-danger">Back</a>

                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
