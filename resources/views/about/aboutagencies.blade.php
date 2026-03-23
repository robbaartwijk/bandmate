@extends('layouts.app', ['page' => __('About agencies'), 'pageSlug' => 'aboutagencies'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">About agencies</h2>
    </div>
    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>Agencies represent acts and help them find bookings and performance opportunities.</li>
            <li>If you run a music agency you can list your agency here for acts to find you.</li>
            <li>Agency listings include contact details, address, and a description of your services.</li>
            <li>Only administrators can add agencies to maintain the quality of the directory.</li>
        </ul>
    </div>
</div>
@endsection
