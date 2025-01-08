@extends('layouts.app', ['page' => __('Edit password'), 'pageSlug' => 'editpassword'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Change password</b></h3>
            </div>

            <div class="bm_row_layout row">

                <div class="col-lg-4" style="position: relative; left: 50%; transform: translateX(-50%);">

                    <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px; margin-left:15px;"">

                        <div class=" card-body text-primary">

                        <div class="table-responsive">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{ route('profile.updatePassword', $user->id) }}" method="post">
                                        @csrf
                                        @method('get')

                                        @if (!empty($user->avatar))
                                        <img src="{{ asset('/storage/' . $user->avatar->id . '/' . $user->avatar->file_name) }}" class="bm_zoom thumbnail" style="width: 150px; height: 150px;">
                                        @endif

                                        <div class="bm_userbox">
                                            {{ $user->name}}
                                        </div>

                                        <br />

                                        <div class="input-group{{ $errors->has('currentpassword') ? ' has-danger' : '' }}">
                                            <input type="password" placeholder="{{ __('  Current password') }}" name="currentpassword" class=bm_password_input form-control{{ $errors->has('currentpassword') ? ' is-invalid' : '' }}">
                                            @include('alerts.feedback', ['field' => 'currentpassword'])
                                        </div>

                                        <div class="input-group{{ $errors->has('newpassword') ? ' has-danger' : '' }}">
                                            <input type="password" placeholder="{{ __('  New password') }}" name="newpassword" class=bm_password_input form-control{{ $errors->has('newpassword') ? ' is-invalid' : '' }}">
                                            @include('alerts.feedback', ['field' => 'newpassword'])
                                        </div>

                                        <div class="input-group{{ $errors->has('confirmpassword') ? ' has-danger' : '' }}">
                                            <input type="password" placeholder="{{ __('  Confirm password') }}" name="confirmpassword" class=bm_password_input form-control{{ $errors->has('confirmpassword') ? ' is-invalid' : '' }}">
                                            @include('alerts.feedback', ['field' => 'confirmpassword'])
                                        </div>
                                    
                                        @if (session('status'))
                                        <div class="alert alert-danger">
                                            {{ session('status') }}
                                        </div>
                                        @endif
                                        
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <div style="margin-top:30px; margin-left:80px;">
                                            <button type="submit" class="btn btn-danger">Update</button>
                                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
