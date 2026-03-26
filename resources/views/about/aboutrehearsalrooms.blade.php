@extends('layouts.app', ['page' => __('About rehearsal rooms'), 'pageSlug' => 'aboutrehearsalrooms'])
@section('content')
<div class="bm-card overflow-hidden">

    {{-- Hero --}}
    <div class="relative h-40 flex items-center px-8"
         style="background: linear-gradient(135deg, rgba(40,6,6,0.92) 0%, rgba(120,20,20,0.85) 100%),
                url('{{ asset('images/Background_sharp.jpg') }}') center/cover no-repeat;">
        <div class="relative z-10 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-drum text-red-300 text-2xl"></i>
            </div>
            <div>
                <h2 class="text-white text-2xl font-semibold" style="font-family:'DM Sans',sans-serif;">Rehearsal rooms</h2>
                <p class="text-white/50 text-sm mt-0.5">Spaces where bands can practise and create</p>
            </div>
        </div>
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