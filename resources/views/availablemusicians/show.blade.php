@extends('layouts.app', ['page' => __('Availablemusicians'), 'pageSlug' => 'availablemusicians'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"><b>Show available musician</b></h3>
                </div>

                <div class="card-body text-primary">

                    <h4><b>Musician name : </b>{{ $availablemusician->user->name }}</h4>
                    <h4><b>Instrument : </b>{{ $availablemusician->instrument->name }}</h4>
                    <h4><b>Genre : </b>{{  $availablemusician->genre->name }}</h4>
                    <h4><b>Description : </b>{{ $availablemusician->description}}</h4>
                
                    <h4><b>Available from : </b>{{ $availablemusician->available_from}}</h4>
                    <h4><b>Available until : </b>{{ $availablemusician->available_until }}</h4>

                    <h4><b>Date added : </b>{{ $availablemusician->created_at }}</h4>
                    <h4><b>Date last update : </b>{{ $availablemusician->updated_at }}</h4>

                    <a href="{{ route('availablemusicians.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    @endsection
