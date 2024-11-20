@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Show act</h4>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-body text-primary">
                            <h1>General information</h1>
                            <h2>Name : {{ $act->name }}</h2>
                            <h5><b>Genre : </b> {{ $genre->name }} ( {{ $genre->group }} )</h5>
                            <h5><b>Number of members : </b> {{ $act->number_of_members }}</h5>
                            <h5><b>Rehearsal Room : </b> {{ $act->rehearsal_room  ? 'Yes' : 'No' }}</h5>
                            <h5><b>Active : </b> {{ $act->active ? 'Yes' : 'No' }}</h5>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card-body text-primary">  
                            <h1>Contact and links</h1>  
                            <h5><b>Website : </b> <a href="{{ $act->website }}">{{ $act->website }}</a></h5>
                            <h5><b>Email : </b> <a href="mailto:{{ $act->email }}">{{ $act->email }}</a></h5>
                            <h5><b>Phone : </b> {{ $act->phone }}</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body text-primary">
                            <h1>Description</h1>
                            <h5>{{ $act->description }}</h5>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body text-primary">   
                            <h3>History</h3> 
                            <h5><b>Date added : </b>{{ $act->created_at }}</h5>
                            <h5><b>Date last update : </b>{{ $act->updated_at }}</h5>
                            <a href="{{ route('acts.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
