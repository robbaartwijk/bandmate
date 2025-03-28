@extends('layouts.app', ['page' => __('Instruments'), 'pageSlug' => 'instruments'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"> Show instrument</h3>
            </div>

            <div class="card-body text-primary">
                <h3><b>Name : </b>{{ $instrument->name }}</h3>
                <h3><b>Type : </b> {{ $instrument->type }}</h3>
                <h4><b>Date added : </b>{{ $instrument->created_at }}</h4>
                <h4><b>Date last update : </b>{{ $instrument->updated_at }}</h4>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @endsection
