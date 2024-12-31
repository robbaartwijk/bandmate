@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Edit Profile') }}</h5>
            </div>
            <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    @include('alerts.success')

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label>{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>

                    <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                        <label>{{ __('First name') }}</label>
                        <input type="text" name="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('first_name', auth()->user()->first_name) }}">
                        @include('alerts.feedback', ['field' => 'first_name'])
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                        <label>{{ __('Last name') }}</label>
                        <input type="text" name="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Last name') }}" value="{{ old('last_name', auth()->user()->last_name) }}">
                        @include('alerts.feedback', ['field' => 'last_name'])
                    </div>

                    <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                        <label>{{ __('Street') }}</label>
                        <input type="text" name="street" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="{{ __('Street') }}" value="{{ old('street', auth()->user()->street) }}">
                        @include('alerts.feedback', ['field' => 'street'])
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>{{ __('Email address') }}</label>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                </div>
            {{-- </form> --}}
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Password') }}</h5>
            </div>
            {{-- <form method="post" action="{{ route('profile.password') }}" autocomplete="off"> --}}
                <div class="card-body">
                    @csrf
                    @method('put')

                    @include('alerts.success', ['key' => 'password_status'])

                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <label>{{ __('Current Password') }}</label>
                        <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                        @include('alerts.feedback', ['field' => 'old_password'])
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{ __('New Password') }}</label>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    <div class="form-group">
                        <label>{{ __('Confirm New Password') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Change password') }}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Edit Profile') }}</h5>
            </div>
            <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    @include('alerts.success')

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <label>{{ __('Name') }}</label>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>

                    <div class="form-group{{ $errors->has('first_name') ? ' has-danger' : '' }}">
                        <label>{{ __('First name') }}</label>
                        <input type="text" name="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('first_name', auth()->user()->first_name) }}">
                        @include('alerts.feedback', ['field' => 'first_name'])
                    </div>

                    <div class="form-group{{ $errors->has('last_name') ? ' has-danger' : '' }}">
                        <label>{{ __('Last name') }}</label>
                        <input type="text" name="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Last name') }}" value="{{ old('last_name', auth()->user()->last_name) }}">
                        @include('alerts.feedback', ['field' => 'last_name'])
                    </div>

                    <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                        <label>{{ __('Street') }}</label>
                        <input type="text" name="street" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="{{ __('Street') }}" value="{{ old('street', auth()->user()->street) }}">
                        @include('alerts.feedback', ['field' => 'street'])
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <label>{{ __('Email address') }}</label>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email address') }}" value="{{ old('email', auth()->user()->email) }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                </div>
            </form>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Password') }}</h5>
            </div>
            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    @include('alerts.success', ['key' => 'password_status'])

                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <label>{{ __('Current Password') }}</label>
                        <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                        @include('alerts.feedback', ['field' => 'old_password'])
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{ __('New Password') }}</label>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    <div class="form-group">
                        <label>{{ __('Confirm New Password') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Change password') }}</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card card-user">
            <div class="card-body">
                <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                            <img class="avatar mx-auto d-block" src="{{ asset('black') }}/img/emilyz.jpg" alt="">
                            <h5 class="title">{{ auth()->user()->name }}</h5>
                        </a>
                    </div>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
