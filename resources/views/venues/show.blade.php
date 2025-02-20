@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Venues'), 'pageSlug' => 'venues'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"> Show venue</h3>
                @if($user->is_admin || $user->id == $venue->user_id)
                <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-warning">Edit Venue</a>
                @endif
            </div>

            <div class="card-body text-primary">
                <h3><b>Name : </b>{{ $venue->name }}</h3>
                <h4><b>Address : </b>{{ $venue->address }}</h4>
                <h4><b>City : </b>{{ $venue->city }}</h4>
                <h4><b>State : </b>{{ $venue->state }}</h4>
                <h4><b>Postal code : </b>{{ $venue->zip }}</h4>
                <h4><b>Country : </b>{{ $venue->country }}</h4>

                <h4><b>Phone : </b>{{ $venue->phone }}</h4>
                <h4><b>Email : </b> <a href="mailto:{{ $venue->email }}">{{ $venue->email }}</a></h4>

                <h4><b>Website : </b><a href="{{ $venue->website }}">{{ $venue->website }}</a></h4>
                <h4><b>Description : </b> {{ $venue->description }}</h4>

                <h4><b>Date added : </b>{{ $venue->created_at }}</h4>
                <h4><b>Date last update : </b>{{ $venue->updated_at }}</h4>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @endsection
