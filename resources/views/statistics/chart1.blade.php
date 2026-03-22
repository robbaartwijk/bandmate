@extends('layouts.app', ['page' => __('chart1'), 'pageSlug' => 'chart1'])

@section('content')

<style>
    .bm-chart-wrapper {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        background: rgb(40, 24, 47);
        border: 2px solid rgb(244, 239, 239);
        padding: 20px;
        box-sizing: border-box;
    }
    .bm-chart-wrapper:hover {
        transform: none;
    }
    @media (min-width: 992px) {
        .bm-chart-wrapper:hover {
            transform: scale(1.05);
            transition: transform .2s;
        }
    }
</style>

<div class="col-md-12 text-center">
    <h1>User registration growth</h1>
</div>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">
            <div class="bm-chart-wrapper">
                <x-chartjs-component :chart="$chartuserregistrations" />
            </div>
        </div>
    </div>
</div>

@endsection