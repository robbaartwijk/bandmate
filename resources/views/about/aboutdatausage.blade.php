@extends('layouts.app', ['page' => __('About data usage'), 'pageSlug' => 'aboutdatausage'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">About data usage</h2>
    </div>
    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>We collect only the data you provide when registering and using the platform.</li>
            <li>Your personal details (name, email, address) are used to identify you and to let other musicians contact you through your listings.</li>
            <li>We do not share your data with any third party organisations or individuals.</li>
            <li>You can update or delete your profile at any time from the Edit profile page.</li>
            <li>Email notification preferences can be managed in your profile settings.</li>
        </ul>
    </div>
</div>
@endsection