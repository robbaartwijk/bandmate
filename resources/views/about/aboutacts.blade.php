@extends('layouts.app', ['page' => __('About acts'), 'pageSlug' => 'aboutacts'])
@section('content')
<div class="bm-card overflow-hidden">

    {{-- Hero --}}
    <div class="relative h-40 flex items-center px-8"
         style="background: linear-gradient(135deg, rgba(17,6,60,0.92) 0%, rgba(79,30,140,0.85) 100%),
                url('{{ asset('images/Background_sharp.jpg') }}') center/cover no-repeat;">
        <div class="relative z-10 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-guitar text-indigo-300 text-2xl"></i>
            </div>
            <div>
                <h2 class="text-white text-2xl font-semibold" style="font-family:'DM Sans',sans-serif;">Acts</h2>
                <p class="text-white/50 text-sm mt-0.5">Bands, solo artists and every kind of musical act</p>
            </div>
        </div>
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