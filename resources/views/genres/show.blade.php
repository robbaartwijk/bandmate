@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Show Genre</h3>
                </div>

                <div class="card-body text-primary">
                    <h5><b>Name : </b>{{ $genre->name }}</h5>
                    <h5><b>Group : </b>{{ $genre->group }}</h5>
                    <h5><b>Description : </b><span class="description-spacing"><br><br>{!! $genre->description !!}</span></h5>
                    <h5><b>Date added : </b>{{ $genre->created_at }}</h5>
                    <h5><b>Date Last Updated : </b>{{ $genre->updated_at }}</h5>
                    <a href="{{ route('genres.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    @endsection
