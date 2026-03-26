@extends('layouts.app', ['page' => __('About available musicians'), 'pageSlug' => 'aboutavailablemusicians'])
@section('content')
<div class="bm-card overflow-hidden">

    {{-- Hero --}}
    <div class="relative h-40 flex items-center px-8"
         style="background: linear-gradient(135deg, rgba(10,40,20,0.92) 0%, rgba(20,100,60,0.85) 100%),
                url('{{ asset('images/Background_sharp.jpg') }}') center/cover no-repeat;">
        <div class="relative z-10 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-user text-emerald-300 text-2xl"></i>
            </div>
            <div>
                <h2 class="text-white text-2xl font-semibold" style="font-family:'DM Sans',sans-serif;">Available musicians</h2>
                <p class="text-white/50 text-sm mt-0.5">Musicians looking for a band to join</p>
            </div>
        </div>
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