@extends('layouts.app', ['page' => __('Venues'), 'pageSlug' => 'venues'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Show venue</h3>
                </div>

                <div class="card-body text-primary">
                    <h5><b>Name : </b>{{ $venue->name }}</h5>
                    <h5><b>Address : </b>{{ $venue->address }}</h5>
                    <h5><b>City : </b>{{ $venue->city }}</h5>
                    <h5><b>State : </b>{{ $venue->state }}</h5>
                    <h5><b>Postal code : </b>{{ $venue->zip }}</h5>
                    <h5><b>Country : </b>{{ $venue->country }}</h5>

                    <h5><b>Phone : </b>{{ $venue->phone }}</h5>
                    <h5><b>Email : </b> <a href="mailto:{{ $venue->email }}">{{ $venue->email }}</a></h5>

                    <h5><b>Website : </b><a href="{{ $venue->website }}">{{ $venue->website }}</a></h5>
                    <h5><b>Description : </b> {{ $venue->description }}</h5>

                    <h5><b>Date added : </b>{{ $venue->created_at }}</h5>
                    <h5><b>Date last update : </b>{{ $venue->updated_at }}</h5>
                    <a href="{{ route('venues.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    @endsection
