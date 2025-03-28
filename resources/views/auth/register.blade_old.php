@extends('layouts.app', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page']) /* Add spaces after /* and before */ for better readability */

<style>
    body {
        background-image: url('{{ asset('images/Background.jpg') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

</style>

@section('content')

    <div class="col-md-7 mr-auto ml-auto">
        <div class="card card-register card-white">
            <div class="card-header">
                <img class="card-img" src='{{ asset('black') }}/img/card-primary.png' alt="Card image">
                <h4 class="card-title">{{ __('Register') }}</h4>
            </div>
            <form class="form" method="post" action="{{ route('register') }}">
                @csrf

                <div class="card-body">
                    <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">
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
