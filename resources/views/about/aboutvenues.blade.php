@extends('layouts.app', ['page' => __('About venues'), 'pageSlug' => 'aboutvenues'])
@section('content')
<div class="bm-card overflow-hidden">

    {{-- Hero --}}
    <div class="relative h-40 flex items-center px-8"
         style="background: linear-gradient(135deg, rgba(6,20,10,0.92) 0%, rgba(20,70,30,0.85) 100%),
                url('{{ asset('images/Background_sharp.jpg') }}') center/cover no-repeat;">
        <div class="relative z-10 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-microphone text-green-300 text-2xl"></i>
            </div>
            <div>
                <h2 class="text-white text-2xl font-semibold" style="font-family:'DM Sans',sans-serif;">Venues</h2>
                <p class="text-white/50 text-sm mt-0.5">Bars, clubs, theatres and concert halls</p>
            </div>
        </div>
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