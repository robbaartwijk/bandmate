@extends('layouts.app', ['page' => __('Availablemusicians'), 'pageSlug' => 'availablemusicians'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Show available musician</b></h3>
            </div>

            <div class="card-body text-primary">

                @if (!empty($availablemusician->image))
                <div style="float: left; margin-right: 20px;">
                    <img src="{{ asset('/storage/' . $availablemusician->image->id . '/' . $availablemusician->image->file_name) }}" class="img-fluid bm_image">
                </div>
                @endif

                <h3><b>Musician name : </b>{{ $availablemusician->user->name }}</h3>

                <h4><b>Instrument : </b>{{ $availablemusician->instrument->name }}</h4>
                <h4><b>Genre : </b>{{ $availablemusician->genre->name }}</h4>

                @if (!empty($availablemusician->user->email))
                <h4><b>Email : </b><a href="mailto:{{ $availablemusician->user->email }}">{{ $availablemusician->user->email }}</a></h4>
                @endif

                @if (!empty($availablemusician->user->phone))
                <h4><b>Phone : </b>{{ $availablemusician->user->phone }}</h4>
                @endif

                <h4><b>Description : </b>{{ $availablemusician->description}}</h4>

                <h4><b>Available from : </b>{{ $availablemusician->available_from}}</h4>
                <h4><b>Available until : </b>{{ $availablemusician->available_until }}</h4>

                <h4><b>Date added : </b>{{ $availablemusician->created_at }}</h4>
                <h4><b>Date last update : </b>{{ $availablemusician->updated_at }}</h4>

                <a href="{{ route('availablemusicians.index') }}" <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @endsection
