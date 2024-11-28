@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<h2>Monthly User Registrations</h2>

<div style="background: rgb(120, 153, 161); border: 2px solid grey;">
    <x-chartjs-component :chart="$barchartuserregistrations" />
</div>

<br><br>

<div style="background: rgb(120, 153, 161); border: 2px solid grey;">
    <x-chartjs-component :chart="$barchartvacanciesperinstrument" />
</div>

@endsection
