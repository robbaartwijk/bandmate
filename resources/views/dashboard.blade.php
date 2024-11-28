@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<h2>Monthly User Registrations</h2>

<div style="width:75%;">
    <x-chartjs-component :chart="$chart" />
</div>
@endsection
