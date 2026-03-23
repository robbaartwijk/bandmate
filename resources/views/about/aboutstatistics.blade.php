@extends('layouts.app', ['page' => __('About statistics'), 'pageSlug' => 'aboutstatistics'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">About statistics</h2>
    </div>
    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>The statistics section shows charts of platform activity over time.</li>
            <li>You can see the growth of user registrations, acts, vacancies, and available musician listings.</li>
            <li>Charts are generated from anonymised counts — no personal data is shown.</li>
            <li>Statistics are intended to give the community a sense of how Bandmate is growing.</li>
        </ul>
    </div>
</div>
@endsection