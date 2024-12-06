@extends('layouts.app', ['page' => __('chart2'), 'pageSlug' => 'chart2'])

@section('content')

    <style>
        .zoom {
            padding: 50px;
            background-color: green;
            transition: transform .2s;
            /* Animation */
            width: 100%;
            height: 90%;
            margin: 0 auto;
            z-index: 10;
        }

        .zoom:hover {
            transform: scale(2);
            position: absolute;
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            background-color: #2196F3;
            padding: 10px;
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }
    </style>
 
 <div style="height: 20vh;">
    <div class="col-md-12 text-center">
        <h1>Bandmate Statistics</h1>
        <h2>Some statistics about Bandmate.</h2>
        <h3>These statistics do not give a full overview of the site
            but they do show the usage of our musician's platform</h3>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4>Open Vacancies per instrument</h4>
            <div class="zoom" style="background: rgb(205, 203, 213); border: 2px solid rgb(244, 239, 239);">
                <x-chartjs-component :chart="$chartvacanciesperinstrument" />
            </div>
        </div>
    </div>

</div>

@endsection
