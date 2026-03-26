<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: true, sidebarMobileOpen: false }">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bandmate') }}{{ isset($page) ? ' — ' . $page : '' }}</title>

    <!-- Open Graph / social sharing -->
    @php
        $ogTitle       = config('app.name', 'Bandmate') . (isset($page) ? ' — ' . $page : '');
        $ogDescription = 'Find bandmates, rehearsal rooms, venues and agencies — the community platform for musicians.';
        $ogImage       = asset('images/welcomebanner.png');
        $ogUrl         = url()->current();
    @endphp
    <meta property="og:type"        content="website">
    <meta property="og:site_name"   content="{{ config('app.name', 'Bandmate') }}">
    <meta property="og:title"       content="{{ $ogTitle }}">
    <meta property="og:description" content="{{ $ogDescription }}">
    <meta property="og:image"       content="{{ $ogImage }}">
    <meta property="og:url"         content="{{ $ogUrl }}">
    {{-- Twitter / X Card (also read by WhatsApp, Telegram, iMessage) --}}
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="{{ $ogTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription }}">
    <meta name="twitter:image"       content="{{ $ogImage }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">

    <!-- Chart.js — loaded as a classic script so it is globally available before any inline scripts in the body -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.6/dist/chart.umd.min.js"></script>

    @stack('styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-950 font-sans antialiased">

    @auth()
    <div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: window.innerWidth >= 1024, sidebarMobileOpen: false }">

        @include('layouts.navbars.sidebar')

        {{-- Mobile backdrop --}}
        <div
            x-show="sidebarMobileOpen"
            x-transition:enter="transition-opacity ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="sidebarMobileOpen = false"
            class="fixed inset-0 z-20 bg-black/60 lg:hidden"
            style="display:none;">
        </div>

        <div class="flex flex-col flex-1 min-w-0 overflow-hidden">
            @include('layouts.navbars.navbar')

            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-950 px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </main>

            @include('layouts.footer')
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

    @else

    <div class="min-h-screen bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('images/Background_sharp.jpg') }}');">
        <div class="min-h-screen bg-black/40">
            @include('layouts.navbars.navbar')
            <div class="container mx-auto px-4 py-8">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
    </div>

    @endauth

    @stack('scripts')
</body>
</html>