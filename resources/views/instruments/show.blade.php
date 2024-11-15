@extends('layouts.app', ['page' => __('Instruments'), 'pageSlug' => 'instruments'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Show instrument</h4>
                </div>

                <div class="card-body text-primary">
                    <h5><b>Name : </b>{{ $instrument->name }}</h5>
                    <h5><b>Type : </b> {{ $instrument->type }}</h5>
                    <h5><b>Date added : </b>{{ $instrument->created_at }}</h5>
                    <h5><b>Date last update : </b>{{ $instrument->updated_at }}</h5>
                    <a href="{{ route('instruments.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    @endsection
