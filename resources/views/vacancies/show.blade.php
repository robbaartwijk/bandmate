@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Show vacancy</h3>
                </div>

                <div class="card-body text-primary">

                    <h4><b>Act name : </b>{{ $vacancy->act_name }}</h4>
                    <h4><b>Instrument : </b>{{ $vacancy->instrument_name }}</h4>
                    <h4><b>Description : </b>{{ $vacancy->description }}</h4>

                    <h4><b>Created by : </b>{{ $vacancy->user_name }}</h4>

                    <h4><b>Date added : </b>{{ $vacancy->created_at }}</h4>
                    <h4><b>Date last update : </b>{{ $vacancy->updated_at }}</h4>
                    <a href="{{ route('vacancies.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    @endsection
