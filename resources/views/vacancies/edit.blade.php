@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Edit vacancy</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form action="{{ route('vacancies.update', $vacancy->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">

                                <label for="description">Act</label>
                                <h5><b>{{ $vacancy->act_name }}</b></h5>

                                <label for="description">Description</label>
                                <input type="text" name="description"
                                    class="form-control
                                    {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    placeholder="Description" value="{{ $vacancy->description }}">
                                @include('alerts.feedback', ['field' => 'description'])

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('vacancies.index') }}" class="btn btn-secondary">Back</a>

                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
