@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6">
                <h3>Open Vacancies per instrument</h3>
                <div style="background: rgb(202, 180, 182); border: 2px solid rgb(244, 239, 239);">
                    <x-chartjs-component :chart="$barchartvacanciesperinstrument" />
                </div>
            </div>
            <div class="col-lg-6">
                <h3>Monthly User Registrations</h3>
                <div style="background: rgb(202, 180, 182); border: 2px solid rgb(244, 239, 239);">
                    <x-chartjs-component :chart="$barchartuserregistrations" />
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <div class="col-lg-6">
            <h3>Monthly Act Registrations</h3>
            <div style="background: rgb(202, 180, 182); border: 2px solid rgb(244, 239, 239);">
                <x-chartjs-component :chart="$barchartactregistrations" />
            </div>
        </div>
    </div>
</div>


@endsection
