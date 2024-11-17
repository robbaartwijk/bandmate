@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Show genre</h4>
                </div>

                <div class="card-body text-primary">
                    <h5><b>Name : </b>{{ $genre->name }}</h5>
                    <h5><b>Group : </b>{{ $genre->group }}</h5>
                    <h5><b>Description : </b> {{ $genre->description }}</h5>
                    <h5><b>Date added : </b>{{ $genre->created_at }}</h5>
                    <h5><b>Date last update : </b>{{ $genre->updated_at }}</h5>
                    <a href="{{ route('genres.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    @endsection
