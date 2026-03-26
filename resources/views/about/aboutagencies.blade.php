@extends('layouts.app', ['page' => __('About agencies'), 'pageSlug' => 'aboutagencies'])
@section('content')
<div class="bm-card overflow-hidden">

    {{-- Hero --}}
    <div class="relative h-40 flex items-center px-8"
         style="background: linear-gradient(135deg, rgba(6,30,60,0.92) 0%, rgba(14,80,120,0.85) 100%),
                url('{{ asset('images/Background_sharp.jpg') }}') center/cover no-repeat;">
        <div class="relative z-10 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-briefcase text-sky-300 text-2xl"></i>
            </div>
            <div>
                <h2 class="text-white text-2xl font-semibold" style="font-family:'DM Sans',sans-serif;">Agencies</h2>
                <p class="text-white/50 text-sm mt-0.5">Connecting acts with bookings and performance opportunities</p>
            </div>
        </div>
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