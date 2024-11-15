@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Show act</h4>
                </div>

                <div class="card-body text-primary">
                    <h5><b>Name : </b>{{ $act->name }}</h5>
                    <h5><b>Number of members : </b> {{ $act->number_of_members }}</h5>
                    <h5><b>Genre : </b> {{ $act->genre_id }}</h5>

                    <h5><b>Rehearsal Room : </b> {{ $act->rehearsal_room }}</h5>

                    <h5><b>Website : </b> <a href="{{ $act->website }}">{{ $act->website }}</a></h5>

                    <h5><b>Active : </b> {{ $act->active }}</h5>
                    <h5><b>Description : </b> {{ $act->description }}</h5>

                    <h5><b>Date added : </b>{{ $act->created_at }}</h5>
                    <h5><b>Date last update : </b>{{ $act->updated_at }}</h5>
                    <a href="{{ route('acts.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    @endsection
