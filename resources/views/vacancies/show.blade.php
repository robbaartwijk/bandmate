@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Show vacancy</h3>
                </div>

                <div class="card-body text-primary">

                    <h5><b>Act name : </b>{{ $vacancy->act_name }}</h5>
                    <h5><b>Instrument : </b>{{ $vacancy->instrument_name }}</h5>
                    <h5><b>Description : </b>{{ $vacancy->description }}</h5>

                    <h5><b>Created by : </b>{{ $vacancy->user_name }}</h5>

                    <h5><b>Date added : </b>{{ $vacancy->created_at }}</h5>
                    <h5><b>Date last update : </b>{{ $vacancy->updated_at }}</h5>
                    <a href="{{ route('vacancies.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    @endsection
