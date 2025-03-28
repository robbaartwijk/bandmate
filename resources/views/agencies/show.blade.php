@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"> Show agency</h3>

                @if($user->is_admin || $user->id == $agency->user_id)
                <a href="{{ route('agencies.edit', $agency->id) }}" class="btn btn-warning">Edit Agency</a>
                @endif

            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body text-primary">
                        <h1>General information</h1>
                        <h2>Name : {{ $agency->name }}</h2>

                        <h4><b>Address :</b> {{ $agency->address }}</h4>
                        <h4><b>Zip :</b> {{ $agency->zip }}</h4>
                        <h4><b>City :</b> {{ $agency->city }}</h4>
                        <h4><b>State :</b> {{ $agency->state }}</h4>
                        <h4><b>Country :</b> {{ $agency->country }}</h4>
                        <br>
                        <h2>Description : </h3>
                            <h4>{!! nl2br(e($agency->description)) !!}
                        </h2>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card-body text-primary">
                        <h1>Contact and links</h1>
                        @if ($agency->website)
                        <h4><a href="{{ $agency->website }}" target="_blank"><i class="fa fa-anchor"></i>
                                {{ $agency->website }}</a></h4>
                        @endif

                        @if ($agency->email)
                        <h4><a href="{{ $agency->email }}" target="_blank"><i class="	fa fa-envelope"></i>
                                {{ $agency->email }}</a></h4>
                        @endif

                        @if ($agency->phone)
                        <h4><i class="fa fa-phone"></i> {{ $agency->phone }}</a></h4>
                        @endif

                        @if ($agency->facebook)
                        <h4><a href="{{ $agency->facebook }}" target="_blank"><i class="fab fa-facebook"></i>
                                {{ $agency->facebook }}</a></h4>
                        @endif

                        @if ($agency->youtube)
                        <h4><a href="{{ $agency->youtube }}" target="_blank"><i class="fab fa-youtube"></i>
                                {{ $agency->youtube }}</a></h4>
                        @endif

                        @if ($agency->twitter)
                        <h4><a href="{{ $agency->twitter }}" target="_blank"><i class="fab fa-twitter"></i>
                                {{ $agency->twitter }}</a></h4>
                        @endif

                        @if ($agency->instagram)
                        <h4><a href="{{ $agency->instagram }}" target="_blank"><i class="fab fa-instagram"></i>
                                {{ $agency->instagram }}</a></h4>
                        @endif

                        @if ($agency->soundcloud)
                        <h4><a href="{{ $agency->soundcloud }}" target="_blank"><i class="fab fa-soundcloud"></i>
                                {{ $agency->soundcloud }}</a></h4>
                        @endif

                        @if ($agency->spotify)
                        <h4><a href="{{ $agency->spotify }}" target="_blank"><i class="fab fa-spotify"></i>
                                {{ $agency->spotify }}</a></h4>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                        <h3>History</h3>
                        <h4><b>Date added : </b>{{ $agency->created_at }}</h4>
                        <h4><b>Date last update : </b>{{ $agency->updated_at }}</h4>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection
