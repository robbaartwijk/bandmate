@extends('layouts.app', ['page' => __('chart1'), 'pageSlug' => 'chart1'])

@section('content')

<style>
    /* .zoom {
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

    */

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


<div class="col-md-12 text-center">
    <h1>Bandmate registrations per month</h1>
</div>

<div class="col-md-12 text-center">
    <div class="grid-container" style="background: black;>
        <div class="col-md-6 text-center">
        </div>
            <div class="zoom chart-height" style="height:700px; background: rgb(40, 24, 47); border: 2px solid rgb(244, 239, 239)">
                <x-chartjs-component :chart="$chartuserregistrations" />

                <div class="col-md-3">
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
