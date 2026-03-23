@extends('layouts.app', ['page' => __('About rehearsal rooms'), 'pageSlug' => 'aboutrehearsalrooms'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">About rehearsal rooms</h2>
    </div>
    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>Rehearsal rooms are spaces where bands can practice.</li>
            <li>If you own or manage a rehearsal room you can list it here for musicians to find.</li>
            <li>Listings include address, contact details, and a description of the facilities.</li>
            <li>You can edit or remove your own rehearsal room listings at any time.</li>
        </ul>
    </div>
</div>
@endsection