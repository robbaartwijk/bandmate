@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="bm_card card">
                <div class="card-header">
                    <h3 class="card-title"> Show Genre</h3>
                </div>

                <div class="card-body text-primary">
                    <h3><b>Name : </b>{{ $genre->name }}</h3>
                    <h3><b>Group : </b>{{ $genre->group }}</h3>
                    <h4><b>Description : </b>{!! nl2br(e($genre->description)) !!}</h4>
                    <h4><b>Date added : </b>{{ $genre->created_at }}</h4>
                    <h4><b>Date Last Updated : </b>{{ $genre->updated_at }}</h4>

                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                </div>
            </div>
        </div>
    @endsection