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
            <div class="row justify-content-center" style="margin-top: 10px;">
                <div class="col-lg-8 col-md-6">
                    <p class="text-lead text-light" style="border: solid 1px; border-color: rgb(190, 190, 208);">
                        <img src="{{ asset('images/Logo2.jpg') }}" />
                    </p>
                    <br>
                    <h1 class="text-white">{{ __('Welcome to Bandmate') }}</h1>
                </div>
            </div>
        </div>

        <p>
            <h4 class="text-white">
                The best place to find your bandmates, rehearsal rooms, agencies and venues. You can use the options in the menu on the left to browse through all the available information and add your own information. You will then be able to edit the information you have entered yourself, but only browse through other users' information.
            </h4>
        </p>

        <h4>
            <ul class="text-white">
                <li>
                    An act is typically either a band or a solo artist. You can of course add your own act.
                </li>
                <li>
                    A vacancy is just what it says; a vacancy in a band. You can add your own vacancies but only for the acts you have entered into the database yourself.
                </li>
                <li>
                    If you are a rehearsal room owner, you can add your own rehearsal rooms.
                </li>
                <li>
                    If you are an agency, you can add your own agency information for artists to find. Finally if you are a venue owner, you can add your own venue information.
                </li>
            </ul>
        </h4>

        </h4>
        </p>

    </div>
</div>

@endsection
