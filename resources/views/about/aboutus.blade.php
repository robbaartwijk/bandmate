@extends('layouts.app', ['page' => __('About us'), 'pageSlug' => 'aboutus'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">About us</h2>
    </div>
    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>Bandmate is a platform built for musicians, by a musician.</li>
            <li>The goal is to make it easy for bands to find members, musicians to find bands, and everyone to find rehearsal spaces and venues.</li>
            <li>This site is not sponsored and does not show advertising. Your data is used only to make the platform work and is never shared with third parties.</li>
            <li>If you would like to support the hosting costs, a donation via PayPal is always appreciated.</li>
        </ul>
    </div>
</div>
@endsection