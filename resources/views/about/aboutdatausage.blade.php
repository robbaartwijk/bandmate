@extends('layouts.app', ['page' => __('About data usage'), 'pageSlug' => 'aboutdatausage'])
@section('content')
<div class="bm-card overflow-hidden">

    {{-- Hero --}}
    <div class="relative h-40 flex items-center px-8"
         style="background: linear-gradient(135deg, rgba(40,20,6,0.92) 0%, rgba(100,55,10,0.85) 100%),
                url('{{ asset('images/Background_sharp.jpg') }}') center/cover no-repeat;">
        <div class="relative z-10 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-shield-alt text-amber-300 text-2xl"></i>
            </div>
            <div>
                <h2 class="text-white text-2xl font-semibold" style="font-family:'DM Sans',sans-serif;">Data usage</h2>
                <p class="text-white/50 text-sm mt-0.5">How we handle your personal information</p>
            </div>
        </div>
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