@extends('layouts.app', ['page' => __('User registration growth'), 'pageSlug' => 'chart1'])
@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">User registration growth</h2>
    </div>
    <div class="bm-card-body">
        <div class="mx-auto" style="max-width:800px;">
            <div class="border border-white/20 rounded-lg p-4 bg-white/5 transition-transform duration-200 hover:scale-105">
                <x-chartjs-component :chart="$chartuserregistrations" />
            </div>
        </div>
    </div>
</div>

@endsection