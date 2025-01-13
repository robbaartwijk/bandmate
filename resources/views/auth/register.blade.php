@extends('layouts.app', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page'])

@section('content')
    <div class="row">

        <div class="col-md-7 mr-auto ml-auto">
            <div class="bm_card card">
            <div class="card-header">
                <h1 class="card-title">{{ __('Register') }}</h1>
            </div>
            <form class="form" method="post" action="{{ route('register') }}">
                @csrf

                <div class="card-body">

                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-single-02""></i>
                    </div>
                    </div>
                    <input type="text" name="name" style="border: solid 1px; background: white; color: black;" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                    @include('alerts.feedback', ['field' => 'name'])
                </div>

                <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-email-85"></i>
                    </div>
                    </div>
                    <input type="email" name="email" style="border: solid 1px; background: white; color: black;" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                    @include('alerts.feedback', ['field' => 'email'])
                </div>

                <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-lock-circle"></i>
                    </div>
                    </div>
                    <input type="password" name="password" style="border: solid 1px; background: white; color: black;" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                    @include('alerts.feedback', ['field' => 'password'])
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="tim-icons icon-lock-circle"></i>
                    </div>
                    </div>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}">
                </div>
                <div class="form-check text-left">
                    <label class="form-check-label">
                    <input class="form-check-input" type="checkbox">
                    <span class="form-check-sign"></span>
                    {{ __('I agree to the') }}
                    <a href="#">{{ __('terms and conditions') }}</a>.
                    </label>
                </div>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-info btn-round btn-lg">{{ __('Register and continue') }}</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
