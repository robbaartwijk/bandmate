@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Show agency</h3>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-body text-primary">
                            <h1>General information</h1>
                            <h2>Name : {{ $agency->name }}</h2>
                            <h5>{{ $agency->description }}</h5>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card-body text-primary">  
                            <h1>Contact and links</h1>  
                            @if($agency->website)
                                <h5><a href="{{ $agency->website }}" target="_blank"><i class="fa fa-anchor"></i> {{ $agency->website }}</a></h5>
                            @endif

                            @if($agency->email)
                            <h5><a href="{{ $agency->email }}" target="_blank"><i class="	fa fa-envelope"></i> {{ $agency->email }}</a></h5>
                            @endif

                            @if($agency->phone)
                            <h5><i class="fa fa-phone"></i> {{ $agency->phone }}</a></h5>
                            @endif

                            @if($agency->facebook)    
                            <h5><a href="{{ $agency->facebook }}" target="_blank"><i class="fab fa-facebook"></i> {{ $agency->facebook }}</a></h5>
                            @endif

                            @if($agency->youtube)  
                            <h5><a href="{{ $agency->youtube }}" target="_blank"><i class="fab fa-youtube"></i> {{ $agency->youtube }}</a></h5>
                            @endif

                            @if($agency->twitter)
                            <h5><a href="{{ $agency->twitter }}" target="_blank"><i class="fab fa-twitter"></i> {{ $agency->twitter }}</a></h5>
                            @endif

                            @if($agency->instagram)
                            <h5><a href="{{ $agency->instagram }}" target="_blank"><i class="fab fa-instagram"></i> {{ $agency->instagram }}</a></h5>
                            @endif

                            @if($agency->soundcloud)
                            <h5><a href="{{ $agency->soundcloud }}" target="_blank"><i class="fab fa-soundcloud"></i> {{ $agency->soundcloud }}</a></h5>
                            @endif

                            @if($agency->spotify)  
                            <h5><a href="{{ $agency->spotify }}" target="_blank"><i class="fab fa-spotify"></i> {{ $agency->spotify }}</a></h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body text-primary">
                            <a href="{{ route('agencies.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body text-primary">   
                            <h3>History</h3> 
                            <h5><b>Date added : </b>{{ $agency->created_at }}</h5>
                            <h5><b>Date last update : </b>{{ $agency->updated_at }}</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
