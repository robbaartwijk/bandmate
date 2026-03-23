@extends('layouts.app', ['page' => __('About vacancies'), 'pageSlug' => 'aboutvacancies'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">About vacancies</h2>
    </div>
    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>A vacancy is an opening in a band or act for a specific instrument.</li>
            <li>You can only create a vacancy for an act that you have added yourself.</li>
            <li>Other musicians can browse vacancies to find a band that suits them.</li>
            <li>Vacancies can include a description of what kind of musician the act is looking for.</li>
        </ul>
    </div>
</div>
@endsection