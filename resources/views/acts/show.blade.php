@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Show act</h3>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-body text-primary">
                            <h1>General information</h1>
                            <h2>Name : {{ $act->name }}</h2>
                            <h5><b>Genre : </b> <a href="{{ route('genres.show', $act->genre->id) }}">{{ $act->genre->name }} ( {{ $act->genre->group }} )</a></h5>
                            <h5><b>Number of members : </b> {{ $act->number_of_members }}</h5>
                            <h5><b>Rehearsal Room : </b> {{ $act->rehearsal_room  ? 'Yes' : 'No' }}</h5>
                            <h5><b>Active : </b> {{ $act->active ? 'Yes' : 'No' }}</h5>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card-body text-primary">  
                            <h1>Contact and links</h1>  
                            @if($act->website)
                                <h5><a href="{{ $act->website }}" target="_blank"><i class="fa fa-anchor"></i> {{ $act->website }}</a></h5>
                            @endif

                            @if($act->email)
                            <h5><a href="{{ $act->email }}" target="_blank"><i class="	fa fa-envelope"></i> {{ $act->email }}</a></h5>
                            @endif

                            @if($act->phone)
                            <h5><i class="	fa fa-phone"></i> {{ $act->phone }}</a></h5>
                            @endif

                            @if($act->facebook)    
                            <h5><a href="{{ $act->facebook }}" target="_blank"><i class="fab fa-facebook"></i> {{ $act->facebook }}</a></h5>
                            @endif

                            @if($act->youtube)  
                            <h5><a href="{{ $act->youtube }}" target="_blank"><i class="fab fa-youtube"></i> {{ $act->youtube }}</a></h5>
                            @endif

                            @if($act->twitter)
                            <h5><a href="{{ $act->twitter }}" target="_blank"><i class="fab fa-twitter"></i> {{ $act->twitter }}</a></h5>
                            @endif

                            @if($act->instagram)
                            <h5><a href="{{ $act->instagram }}" target="_blank"><i class="fab fa-instagram"></i> {{ $act->instagram }}</a></h5>
                            @endif

                            @if($act->soundcloud)
                            <h5><a href="{{ $act->soundcloud }}" target="_blank"><i class="fab fa-soundcloud"></i> {{ $act->soundcloud }}</a></h5>
                            @endif

                            @if($act->spotify)  
                            <h5><a href="{{ $act->spotify }}" target="_blank"><i class="fab fa-spotify"></i> {{ $act->spotify }}</a></h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body text-primary">
                            <h1>Description</h1>
                            <h5>{{ $act->description }}</h5>
                            <a href="{{ route('acts.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body text-primary">   
                            <h3>History</h3> 
                            <h5><b>Date added : </b>{{ $act->created_at }}</h5>
                            <h5><b>Date last update : </b>{{ $act->updated_at }}</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
