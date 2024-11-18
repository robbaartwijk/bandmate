@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Show user</h4>
                </div>

                <div class="card-body text-primary">
                    <h5><b>Name : </b>{{ $user->name }}</h5>
                    <h5><b>Email : </b> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></h5>                    
                    <h5><b>Date added : </b>{{ $user->created_at }}</h5>
                    <h5><b>Date last update : </b>{{ $user->updated_at }}</h5>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    @endsection
