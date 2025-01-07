@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')

@if(session()->has('status'))
<div class="alert alert-success" id="status-message">
    {{ session()->get('status') }}
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b> Show act</b></h3>
            </div>

            <div class="row">
                <div class="col-lg-6">

                    <div class="card-body text-primary">
                        <h1>General information</h1>
                        <h2>Name : {{ $act->name }}</h2>
                        <h4><b>Genre : </b>
                            @if ($act->genre)
                            <a href="{{ route('genres.show', $act->genre->id) }}">{{ $act->genre->name }} ( {{ $act->genre->group }} )</a>
                            @else
                            N/A
                            @endif
                        </h4>
                        <h4><b>Number of members : </b> {{ $act->number_of_members }}</h4>
                        <h4><b>Rehearsal Room : </b> {{ $act->rehearsal_room ? 'Yes' : 'No' }}</h4>
                        <h4><b>Active : </b> {{ $act->active ? 'Yes' : 'No' }}</h4>

                        @if (!empty($act->image))
                        <img src="{{ asset('/storage/' . $act->image->id . '/' . $act->image->file_name) }}" class="img-fluid bm_image bm_zoom bm_zoom_hover">
                        @endif

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card-body text-primary">
                        <h1>Contact and links</h1>
                        @if ($act->website)
                        <h4><a href="{{ $act->website }}" target="_blank"><i class="fa fa-anchor"></i>
                                {{ $act->website }}</a></h4>
                        @endif

                        @if ($act->email)
                        <h4><a href="mailto:{{ $act->email }}" target="_blank"><i class="fa fa-envelope"></i>
                                {{ $act->email }}</a></h4>
                        @endif

                        @if ($act->phone)
                        <h4><i class="fa fa-phone"></i> {{ $act->phone }}</h4>
                        @endif

                        @if ($act->facebook)
                        <h4><a href="{{ $act->facebook }}" target="_blank"><i class="fab fa-facebook"></i>
                                {{ $act->facebook }}</a></h4>
                        @endif

                        @if ($act->youtube)
                        <h4><a href="{{ $act->youtube }}" target="_blank"><i class="fab fa-youtube"></i>
                                {{ $act->youtube }}</a></h4>
                        @endif

                        @if ($act->twitter)
                        <h4><a href="{{ $act->twitter }}" target="_blank"><i class="fab fa-twitter"></i>
                                {{ $act->twitter }}</a></h4>
                        @endif

                        @if ($act->instagram)
                        <h4><a href="{{ $act->instagram }}" target="_blank"><i class="fab fa-instagram"></i>
                                {{ $act->instagram }}</a></h4>
                        @endif

                        @if ($act->soundcloud)
                        <h4><a href="{{ $act->soundcloud }}" target="_blank"><i class="fab fa-soundcloud"></i>
                                {{ $act->soundcloud }}</a></h4>
                        @endif

                        @if ($act->spotify)
                        <h4><a href="{{ $act->spotify }}" target="_blank"><i class="fab fa-spotify"></i>
                                {{ $act->spotify }}</a></h4>
                        @endif

                        @if ($act->bluesky)
                            <h4><a href="{{ $act->bluesky }}" target="_blank"><img src="{{ asset('images/bluesky.jpg') }}" style="position:absolute; width:16px; height: 16px; margin-top: 5px;">"         " {{ $act->bluesky }}</a></h4>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                        <h1>Description</h1>
                        <h4>{!! nl2br(e($act->description)) !!}</h4>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>

            @if (!empty($act->youtubedemo))
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary" style="height: 900px;">
                        <iframe width="100%" height="100%" src="{{ $act->youtubedemo }}"></iframe>
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                        <h4>History</h4>
                        <h4><b>Date added : </b>{{ $act->created_at }}</h4>
                        <h4><b>Date last update : </b>{{ $act->updated_at }}</h4>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('status-message').style.display = 'none';
        }, 2000);

    </script>

    @endsection
