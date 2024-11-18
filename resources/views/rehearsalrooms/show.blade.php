@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Show rehearsal room</h4>
                </div>

                <div class="card-body text-primary">
                    <h5><b>Name : </b>{{ $rehearsalroom->name }}</h5>
                    <h5><b>Address : </b>{{ $rehearsalroom->address }}</h5>
                    <h5><b>City : </b>{{ $rehearsalroom->city }}</h5>
                    <h5><b>State : </b>{{ $rehearsalroom->state }}</h5>
                    <h5><b>Postal code : </b>{{ $rehearsalroom->zip }}</h5>
                    <h5><b>Country : </b>{{ $rehearsalroom->country }}</h5>

                    <h5><b>Phone : </b>{{ $rehearsalroom->phone }}</h5>
                    <h5><b>Email : </b> <a href="mailto:{{ $rehearsalroom->email }}">{{ $rehearsalroom->email }}</a></h5>

                    <h5><b>Website : </b><a href="{{ $rehearsalroom->website }}">{{ $rehearsalroom->website }}</a></h5>
                    <h5><b>Description : </b> {{ $rehearsalroom->description }}</h5>
                    
                    <h5><b>Date added : </b>{{ $rehearsalroom->created_at }}</h5>
                    <h5><b>Date last update : </b>{{ $rehearsalroom->updated_at }}</h5>
                    <a href="{{ route('rehearsalrooms.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    @endsection
