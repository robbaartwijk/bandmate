@extends('layouts.app', ['page' => __('About statistics'), 'pageSlug' => 'aboutstatistics'])
@section('content')
<div class="bm-card overflow-hidden">

    {{-- Hero --}}
    <div class="relative h-40 flex items-center px-8"
         style="background: linear-gradient(135deg, rgba(6,20,50,0.92) 0%, rgba(20,50,120,0.85) 100%),
                url('{{ asset('images/Background_sharp.jpg') }}') center/cover no-repeat;">
        <div class="relative z-10 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-chart-bar text-blue-300 text-2xl"></i>
            </div>
            <div>
                <h2 class="text-white text-2xl font-semibold" style="font-family:'DM Sans',sans-serif;">Statistics</h2>
                <p class="text-white/50 text-sm mt-0.5">How Bandmate is growing over time</p>
            </div>
        </div>
    </div>

    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>The statistics section shows charts of platform activity over time.</li>
            <li>You can see the growth of user registrations, acts, vacancies, and available musician listings.</li>
            <li>Charts are generated from anonymised counts — no personal data is shown.</li>
            <li>Statistics are intended to give the community a sense of how Bandmate is growing.</li>
        </ul>
    </div>
</div>
@endsection