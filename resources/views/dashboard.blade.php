@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-6">
                <h2>Open Vacancies per instrument</h2>
                <div style="background: rgb(120, 153, 161); border: 2px solid rgb(244, 239, 239);">
                    <x-chartjs-component :chart="$barchartvacanciesperinstrument" />
                </div>
            </div>
            <div class="col-lg-6">
                <h2>Monthly User Registrations</h2>
                <div style="background: rgb(120, 153, 161); border: 2px solid rgb(244, 239, 239);">
                    <x-chartjs-component :chart="$barchartuserregistrations" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
