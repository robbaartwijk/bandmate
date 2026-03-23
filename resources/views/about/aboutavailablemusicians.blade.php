@extends('layouts.app', ['page' => __('About available musicians'), 'pageSlug' => 'aboutavailablemusicians'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">About available musicians</h2>
    </div>
    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>An available musician listing lets you advertise that you are looking to join a band.</li>
            <li>You specify your instrument, preferred genre, and the period you are available.</li>
            <li>Bands and acts can browse these listings to find suitable musicians.</li>
            <li>You can add a photo and description to make your listing stand out.</li>
        </ul>
    </div>
</div>
@endsection