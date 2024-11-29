@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

<div style="height: 20vh;">
    <div class="col-md-12 text-center">
        <h1>Bandmate Statistics</h1>
        <h2>Some statistics about Bandmate.<br><br>
            These statistics do not give a full overview of the site
            but they do show the usage of our musician's platform</h2>
    </div>
</div>

<div class="row" style=margin-top:20px>
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-4">
                <h3>Open Vacancies per instrument</h3>
                <div style="background: rgb(150, 132, 134); border: 2px solid rgb(244, 239, 239);">
                    <x-chartjs-component :chart="$barchartvacanciesperinstrument" />
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Monthly User Registrations</h3>
                <div style="background: rgb(202, 180, 182); border: 2px solid rgb(244, 239, 239);">
                    <x-chartjs-component :chart="$barchartuserregistrations" />
                </div>
            </div>
            <div class="col-lg-4">
                <h3>Monthly Act Registrations</h3>
                <div style="background: rgb(150, 132, 134); border: 2px solid rgb(244, 239, 239);">
                    <x-chartjs-component :chart="$barchartactregistrations" />
                </div>
            </div>
        </div>
    </div>


    @endsection
