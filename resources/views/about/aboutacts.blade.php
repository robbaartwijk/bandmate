@extends('layouts.app', ['page' => __('About acts'), 'pageSlug' => 'aboutacts'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">About acts</h2>
    </div>
    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>Acts are bands, trios, solo acts, orchestras, and any other musical group or individual performer.</li>
            <li>Once registered you can enter your own act(s) into the database and browse through all listed acts.</li>
            <li>You can edit or delete any act you have added yourself.</li>
            <li>Each act can include contact details, social media links, a photo, and a video demo.</li>
        </ul>
    </div>
</div>
@endsection