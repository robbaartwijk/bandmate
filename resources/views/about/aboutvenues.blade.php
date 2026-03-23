@extends('layouts.app', ['page' => __('About venues'), 'pageSlug' => 'aboutvenues'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">About venues</h2>
    </div>
    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>Venues are locations where live music is performed — bars, clubs, theatres, and concert halls.</li>
            <li>Venue owners can add their venue so that acts can find places to perform.</li>
            <li>Listings include the full address, contact information, and a description of the venue.</li>
            <li>Only administrators can add venues to keep the listings reliable and relevant.</li>
        </ul>
    </div>
</div>
@endsection