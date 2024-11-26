@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Show Genre</h3>
                </div>

                <div class="card-body text-primary">
                    <h4><b>Name : </b>{{ $genre->name }}</h4>
                    <h4><b>Group : </b>{{ $genre->group }}</h4>
                    <h4><b>Description : </b><span class="description-spacing"><br><br>{!! $genre->description !!}</span></h4>
                    <h4><b>Date added : </b>{{ $genre->created_at }}</h4>
                    <h4><b>Date Last Updated : </b>{{ $genre->updated_at }}</h4>
                    <a href="{{ route('genres.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    @endsection