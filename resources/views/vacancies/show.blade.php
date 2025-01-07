@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Show vacancy</b></h3>
            </div>

            <div class="card-body text-primary">

                <h4><b>Act name : </b><a href="{{ route('acts.show', $vacancy->act_id) }}">{{ $vacancy->act_name }}</a></h4>
                <h4><b>Instrument : </b>{{ $vacancy->instrument_name }}</h4>
                <h4><b>Description : </b>{{ $vacancy->description }}</h4>

                <h4><b>Created by : </b>{{ $vacancy->user_name }}</h4>

                <h4><b>Date added : </b>{{ $vacancy->created_at }}</h4>
                <h4><b>Date last update : </b>{{ $vacancy->updated_at }}</h4>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @endsection
