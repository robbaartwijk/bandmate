@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Show rehearsal room</h3>
                </div>

                <div class="card-body text-primary">
                    <h4><b>Name : </b>{{ $rehearsalroom->name }}</h4>
                    <h4><b>Address : </b>{{ $rehearsalroom->address }}</h4>
                    <h4><b>City : </b>{{ $rehearsalroom->city }}</h4>
                    <h4><b>State : </b>{{ $rehearsalroom->state }}</h4>
                    <h4><b>Postal code : </b>{{ $rehearsalroom->zip }}</h4>
                    <h4><b>Country : </b>{{ $rehearsalroom->country }}</h4>

                    <h4><b>Phone : </b>{{ $rehearsalroom->phone }}</h4>
                    <h4><b>Email : </b> <a href="mailto:{{ $rehearsalroom->email }}">{{ $rehearsalroom->email }}</a></h4>

                    <h4><b>Website : </b><a href="{{ $rehearsalroom->website }}">{{ $rehearsalroom->website }}</a></h4>
                    <h4><b>Description : </b> {{ $rehearsalroom->description }}</h4>

                    <h4><b>Date added : </b>{{ $rehearsalroom->created_at }}</h4>
                    <h4><b>Date last update : </b>{{ $rehearsalroom->updated_at }}</h4>
                    <a href="{{ route('rehearsalrooms.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    @endsection
