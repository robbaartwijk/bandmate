@extends('layouts.app', ['page' => __('About vacancies'), 'pageSlug' => 'aboutvacancies'])
@section('content')
<div class="bm-card overflow-hidden">

    {{-- Hero --}}
    <div class="relative h-40 flex items-center px-8"
         style="background: linear-gradient(135deg, rgba(6,30,40,0.92) 0%, rgba(10,80,100,0.85) 100%),
                url('{{ asset('images/Background_sharp.jpg') }}') center/cover no-repeat;">
        <div class="relative z-10 flex items-center gap-5">
            <div class="w-14 h-14 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                <i class="fas fa-search text-cyan-300 text-2xl"></i>
            </div>
            <div>
                <h2 class="text-white text-2xl font-semibold" style="font-family:'DM Sans',sans-serif;">Vacancies</h2>
                <p class="text-white/50 text-sm mt-0.5">Open spots in bands looking for the right musician</p>
            </div>
        </div>
    </div>

    <div class="bm-card-body prose-sm">
        <ul class="space-y-3 text-white/70 text-sm leading-relaxed list-disc list-inside">
            <li>A vacancy is an opening in a band or act for a specific instrument.</li>
            <li>You can only create a vacancy for an act that you have added yourself.</li>
            <li>Other musicians can browse vacancies to find a band that suits them.</li>
            <li>Vacancies can include a description of what kind of musician the act is looking for.</li>
        </ul>
    </div>
</div>
@endsection