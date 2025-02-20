@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b>Show rehearsal room</b></h3>
                @if($user->is_admin || $user->id == $rehearsalroom->user_id)
                <a href="{{ route('rehearsalrooms.edit', $rehearsalroom->id) }}" class="btn btn-warning">Edit Rehearsal Room</a>
                @endif
            </div>

            <div class="card-body text-primary">

                @if (!empty($rehearsalroom->image))
                <div style="float: left; margin-right: 20px;">
                    <img src="{{ asset('/storage/' . $rehearsalroom->image->id . '/' . $rehearsalroom->image->file_name) }}" class="img-fluid bm_image">
                </div>
                @else
                <div style="float: left; margin-right: 20px;">
                    <img src="{{ asset('storage/defaults/defaultrehearsalroom.jpg') }}" style="width:480px; height:480px;" class="img-fluid bm_image">
                </div>
                @endif

                <h4><b>Name : </b>{{ $rehearsalroom->name }}</h4>
                <h4><b>Address : </b>{{ $rehearsalroom->address }}</h4>
                <h4><b>City : </b>{{ $rehearsalroom->city }}</h4>
                <h4><b>State : </b>{{ $rehearsalroom->state }}</h4>
                <h4><b>Postal code : </b>{{ $rehearsalroom->zip }}</h4>
                <h4><b>Country : </b>{{ $rehearsalroom->country }}</h4>

                <h4><b>Phone : </b>{{ $rehearsalroom->phone }}</h4>
                <h4><b>Email : </b> <a href="mailto:{{ $rehearsalroom->email }}">{{ $rehearsalroom->email }}</a></h4>

                <h4><b>Website : </b><a href="{{ $rehearsalroom->website }}" target="_blank">{{ $rehearsalroom->website }}</a></h4>
                <h4><b>Description : </b> {{ $rehearsalroom->description }}</h4>

                <h4><b>Date added : </b>{{ $rehearsalroom->created_at }}</h4>
                <h4><b>Date last update : </b>{{ $rehearsalroom->updated_at }}</h4>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    @endsection
