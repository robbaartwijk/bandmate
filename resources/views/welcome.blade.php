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
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-6">
                    <p class="text-lead text-light" style="border: solid 1px; border-color: rgb(190, 190, 208);">
                        <img src="{{ asset('images/Logo2.jpg') }}" />
                    </p>
                    <br>
                    <h1 class="text-white">{{ __('Welcome to Bandmate') }}</h1>
                    <p>
                        <h4 class="text-white">
                            The best place to find your bandmates, rehearsal rooms, agencies and venues
                        </h4>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--7" style="margin-top:100px; border: solid 1px; border-color: white;">
    <div class="row">
        <div class="col-xl-4">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <p class="text-lead text-light">
                            <img src="{{ asset('images/Stats1.png') }}" style="width: 400px; height: 320px;" />
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-body">
                <div class="row">
                    <p class="text-lead text-light">
                        <img src="{{ asset('images/Stats2.png') }}" style="width: 400px; height: 320px;" />
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card-body">
                <div class="row">
                    <p class="text-lead text-light">
                        <img src="{{ asset('images/Stats3.png') }}" style="width: 400px; height: 320px;" />
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
