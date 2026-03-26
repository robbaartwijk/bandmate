@extends('layouts.app', ['page' => __('About us'), 'pageSlug' => 'aboutus'])
@section('content')
<div class="bm-card overflow-hidden">

    {{-- Hero --}}
    <div class="relative h-40 flex items-center px-8"
         style="background: linear-gradient(135deg, rgba(28,6,50,0.92) 0%, rgba(80,20,100,0.85) 100%),
                url('{{ asset('images/Background_sharp.jpg') }}') center/cover no-repeat;">
        <div class="relative z-10 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-heart text-purple-300 text-2xl"></i>
            </div>
            <div>
                <h2 class="text-white text-2xl font-semibold" style="font-family:'DM Sans',sans-serif;">About us</h2>
                <p class="text-white/50 text-sm mt-0.5">Built for musicians, by a musician</p>
            </div>
        </div>
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