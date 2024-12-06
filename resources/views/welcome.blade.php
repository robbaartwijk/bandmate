@extends('layouts.app', ['pageSlug' => 'dashboard'])

<style>
    body {
        background-image: url('{{ asset('images/Background_sharp.jpg') }}');
        background-size: cover;
        background-position: center;
        background-size: 120%;
        background-repeat: no-repeat;
    }

</style>

@section('content')

<div class="header py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center" style="margin-top: 120px;">
                <div class="col-lg-8 col-md-6">
                    <p class="text-lead text-light" style="border: solid 1px; border-color: rgb(190, 190, 208);">
                        <img src="{{ asset('images/Logo2.jpg') }}" />
                    </p>
                    <br>
                    <h1 class="text-white">{{ __('Welcome to Bandmate') }}</h1>
                    <p>
                        <h4 class="text-white">
                            The best place to find your bandmates, rehearsal rooms, agencies and venues. 
                            <br>
                            You can use the options in the menu on the left to navigate through the website.
                        </h4>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
