@php
$user = auth()->user();

$navGroups = [
    'user' => [
        'label' => 'User Access',
        'icon'  => 'fa-music',
        'pages' => ['dashboard', 'acts', 'vacancies', 'availablemusicians', 'rehearsalrooms', 'venues', 'agencies', 'about'],
        'links' => [
            ['route' => 'acts.index',               'slug' => 'acts',               'icon' => 'fa-music',        'label' => 'Acts'],
            ['route' => 'vacancies.index',           'slug' => 'vacancies',          'icon' => 'fa-music',        'label' => 'Vacancies'],
            ['route' => 'availablemusicians.index',  'slug' => 'availablemusicians', 'icon' => 'fa-music',        'label' => 'Available musicians'],
            ['route' => 'rehearsalrooms.index',      'slug' => 'rehearsalrooms',     'icon' => 'fa-music',        'label' => 'Rehearsal rooms'],
            ['route' => 'venues.index',              'slug' => 'venues',             'icon' => 'fa-music',        'label' => 'Venues'],
            ['route' => 'agencies.index',            'slug' => 'agencies',           'icon' => 'fa-music',        'label' => 'Agencies'],
        ],
    ],
    'statistics' => [
        'label' => 'Statistics',
        'icon'  => 'fa-chart-bar',
        'pages' => ['chart1', 'chart2', 'chart3', 'chart4', 'chart5'],
        'links' => [
            ['route' => 'statistics.chart1', 'slug' => 'chart1', 'icon' => 'fa-chart-bar', 'label' => 'Users'],
            ['route' => 'statistics.chart2', 'slug' => 'chart2', 'icon' => 'fa-chart-bar', 'label' => 'Vacancies'],
            ['route' => 'statistics.chart3', 'slug' => 'chart3', 'icon' => 'fa-chart-bar', 'label' => 'Acts'],
            ['route' => 'statistics.chart4', 'slug' => 'chart4', 'icon' => 'fa-chart-bar', 'label' => 'Available musicians'],
            ['route' => 'statistics.chart5', 'slug' => 'chart5', 'icon' => 'fa-chart-bar', 'label' => 'AM per instrument'],
        ],
    ],
    'about' => [
        'label' => 'About',
        'icon'  => 'fa-info-circle',
        'pages' => ['aboutus', 'aboutdatausage', 'aboutacts', 'aboutvacancies', 'aboutavailablemusicians', 'aboutrehearsalrooms', 'aboutagencies', 'aboutvenues'],
        'links' => [
            ['route' => 'about.acts',               'slug' => 'aboutacts',               'icon' => 'fa-chevron-right', 'label' => 'Acts'],
            ['route' => 'about.vacancies',           'slug' => 'aboutvacancies',          'icon' => 'fa-chevron-right', 'label' => 'Vacancies'],
            ['route' => 'about.availablemusicians',  'slug' => 'aboutavailablemusicians', 'icon' => 'fa-chevron-right', 'label' => 'Available musicians'],
            ['route' => 'about.rehearsalrooms',      'slug' => 'aboutrehearsalrooms',     'icon' => 'fa-chevron-right', 'label' => 'Rehearsal rooms'],
            ['route' => 'about.agencies',            'slug' => 'aboutagencies',           'icon' => 'fa-chevron-right', 'label' => 'Agencies'],
            ['route' => 'about.venues',              'slug' => 'aboutvenues',             'icon' => 'fa-chevron-right', 'label' => 'Venues'],
            ['route' => 'about.us',                  'slug' => 'aboutus',                 'icon' => 'fa-chevron-right', 'label' => 'About us'],
            ['route' => 'about.datausage',           'slug' => 'aboutdatausage',          'icon' => 'fa-chevron-right', 'label' => 'Data usage'],
        ],
    ],
];

$adminGroups = [
    'support' => [
        'label' => 'Support data',
        'icon'  => 'fa-database',
        'pages' => ['instruments', 'genres'],
        'links' => [
            ['route' => 'instruments.index', 'slug' => 'instruments', 'icon' => 'fa-database', 'label' => 'Instruments'],
            ['route' => 'genres.index',      'slug' => 'genres',      'icon' => 'fa-database', 'label' => 'Genres'],
        ],
    ],
    'management' => [
        'label' => 'Management',
        'icon'  => 'fa-user-shield',
        'pages' => ['users', 'email-templates', 'email-jobs', 'email-logs'],
        'links' => [
            ['route' => 'profile.edit',           'slug' => 'profile',          'icon' => 'fa-user-circle',  'label' => 'User Profile'],
            ['route' => 'users.index',             'slug' => 'users',            'icon' => 'fa-users',        'label' => 'User Management'],
            ['route' => 'email-templates.index',   'slug' => 'email-templates',  'icon' => 'fa-envelope',     'label' => 'Email Templates'],
            ['route' => 'email-jobs.index',        'slug' => 'email-jobs',       'icon' => 'fa-paper-plane',  'label' => 'Email Jobs'],
            ['route' => 'email-logs.index',        'slug' => 'email-logs',       'icon' => 'fa-list',         'label' => 'Email Logs'],
        ],
    ],
];
@endphp

{{-- ── Desktop sidebar ── --}}
<aside
    :class="sidebarOpen ? 'w-64' : 'w-16'"
    class="hidden lg:flex flex-col flex-shrink-0 transition-all duration-300 ease-in-out overflow-hidden"
    style="background-color: rgb(28, 28, 85);">

    {{-- Logo --}}
    <div class="flex items-center justify-between px-4 py-4 border-b border-white/10 flex-shrink-0">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 min-w-0">
            <img src="{{ asset('images/Logo.jpg') }}"
                 alt="Bandmate"
                 class="h-8 w-auto flex-shrink-0 rounded border border-white/20">
            <span x-show="sidebarOpen"
                  x-transition:enter="transition-opacity duration-200 delay-100"
                  x-transition:enter-start="opacity-0"
                  x-transition:enter-end="opacity-100"
                  x-transition:leave="transition-opacity duration-100"
                  x-transition:leave-start="opacity-100"
                  x-transition:leave-end="opacity-0"
                  class="text-white font-semibold text-sm truncate"
                  style="font-family: 'DM Sans', sans-serif;">
                Bandmate
            </span>
        </a>
        <button @click="sidebarOpen = !sidebarOpen"
                class="text-white/50 hover:text-white transition-colors flex-shrink-0 ml-2">
            <i class="fas fa-bars text-sm"></i>
        </button>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto overflow-x-hidden py-4 space-y-1 px-2">

        {{-- Dashboard link --}}
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors
                  {{ $pageSlug === 'dashboard' ? 'bg-white/15 text-white' : 'text-white/60 hover:text-white hover:bg-white/10' }}">
            <i class="fas fa-home w-4 text-center flex-shrink-0 text-xs"></i>
            <span x-show="sidebarOpen" class="truncate">Dashboard</span>
        </a>

        {{-- Regular nav groups --}}
        @foreach($navGroups as $groupKey => $group)
        @php $isGroupActive = in_array($pageSlug ?? '', $group['pages']); @endphp
        <div x-data="{ open: {{ $isGroupActive ? 'true' : 'false' }} }">
            <button @click="open = !open"
                    class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors
                           {{ $isGroupActive ? 'text-white' : 'text-white/60 hover:text-white hover:bg-white/10' }}">
                <i class="fas {{ $group['icon'] }} w-4 text-center flex-shrink-0 text-xs"></i>
                <span x-show="sidebarOpen" class="flex-1 text-left truncate">{{ $group['label'] }}</span>
                <i x-show="sidebarOpen"
                   :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"
                   class="fas text-xs text-white/40 flex-shrink-0 transition-transform duration-200"></i>
            </button>

            <div x-show="open && sidebarOpen"
                 x-transition:enter="transition-all ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="mt-1 ml-4 space-y-0.5">
                @foreach($group['links'] as $link)
                <a href="{{ route($link['route']) }}"
                   class="flex items-center gap-3 px-3 py-1.5 rounded-lg text-xs transition-colors
                          {{ ($pageSlug ?? '') === $link['slug'] ? 'bg-indigo-500/30 text-indigo-200 font-medium' : 'text-white/50 hover:text-white hover:bg-white/10' }}">
                    <i class="fas {{ $link['icon'] }} w-3 text-center flex-shrink-0" style="font-size:10px;"></i>
                    <span class="truncate">{{ $link['label'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
        @endforeach

        {{-- Admin-only groups --}}
        @if($user->is_admin)
        <div class="pt-2 mt-2 border-t border-white/10">
            <p x-show="sidebarOpen" class="px-3 py-1 text-xs font-semibold uppercase tracking-wider text-white/30">Admin</p>
        </div>
        @foreach($adminGroups as $groupKey => $group)
        @php $isGroupActive = in_array($pageSlug ?? '', $group['pages']); @endphp
        <div x-data="{ open: {{ $isGroupActive ? 'true' : 'false' }} }">
            <button @click="open = !open"
                    class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors
                           {{ $isGroupActive ? 'text-white' : 'text-white/60 hover:text-white hover:bg-white/10' }}">
                <i class="fas {{ $group['icon'] }} w-4 text-center flex-shrink-0 text-xs"></i>
                <span x-show="sidebarOpen" class="flex-1 text-left truncate">{{ $group['label'] }}</span>
                <i x-show="sidebarOpen"
                   :class="open ? 'fa-chevron-down' : 'fa-chevron-right'"
                   class="fas text-xs text-white/40 flex-shrink-0"></i>
            </button>

            <div x-show="open && sidebarOpen"
                 x-transition:enter="transition-all ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-1"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="mt-1 ml-4 space-y-0.5">
                @foreach($group['links'] as $link)
                <a href="{{ route($link['route']) }}"
                   class="flex items-center gap-3 px-3 py-1.5 rounded-lg text-xs transition-colors
                          {{ ($pageSlug ?? '') === $link['slug'] ? 'bg-indigo-500/30 text-indigo-200 font-medium' : 'text-white/50 hover:text-white hover:bg-white/10' }}">
                    <i class="fas {{ $link['icon'] }} w-3 text-center flex-shrink-0" style="font-size:10px;"></i>
                    <span class="truncate">{{ $link['label'] }}</span>
                </a>
                @endforeach
                @if($groupKey === 'management')
                <a href="/docs" target="_blank" rel="noopener noreferrer"
                   class="flex items-center gap-3 px-3 py-1.5 rounded-lg text-xs text-white/50 hover:text-white hover:bg-white/10 transition-colors">
                    <i class="fas fa-book w-3 text-center flex-shrink-0" style="font-size:10px;"></i>
                    <span class="truncate">Technical Docs</span>
                    <i class="fas fa-external-link-alt ml-auto" style="font-size:9px; opacity:0.4;"></i>
                </a>
                @endif
            </div>
        </div>
        @endforeach
        @endif

    </nav>

    {{-- User footer --}}
    <div x-show="sidebarOpen" class="flex-shrink-0 px-4 py-3 border-t border-white/10">
        <div class="flex items-center gap-3">
            @if (!empty($userAvatar))
            <img src="{{ asset('/storage/' . $userAvatar->id . '/' . $userAvatar->file_name) }}"
                 class="w-8 h-8 rounded-full border border-white/20 object-cover flex-shrink-0">
            @else
            <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center flex-shrink-0">
                <span class="text-white text-xs font-semibold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
            </div>
            @endif
            <div class="min-w-0">
                <p class="text-white text-xs font-medium truncate">{{ Auth::user()->name }}</p>
                <p class="text-white/40 text-xs truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
</aside>

{{-- ── Mobile sidebar ── --}}
<aside
    x-show="sidebarMobileOpen"
    x-transition:enter="transition-transform ease-out duration-200"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition-transform ease-in duration-150"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
    class="fixed inset-y-0 left-0 z-30 w-64 flex flex-col lg:hidden overflow-y-auto"
    style="background-color: rgb(28, 28, 85); display:none;">

    <div class="flex items-center justify-between px-4 py-4 border-b border-white/10">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
            <img src="{{ asset('images/Logo.jpg') }}" alt="Bandmate" class="h-8 w-auto rounded border border-white/20">
            <span class="text-white font-semibold text-sm" style="font-family: 'DM Sans', sans-serif;">Bandmate</span>
        </a>
        <button @click="sidebarMobileOpen = false" class="text-white/50 hover:text-white transition-colors">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <nav class="flex-1 py-4 space-y-1 px-2">
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors
                  {{ ($pageSlug ?? '') === 'dashboard' ? 'bg-white/15 text-white' : 'text-white/60 hover:text-white hover:bg-white/10' }}">
            <i class="fas fa-home w-4 text-center text-xs"></i>
            <span>Dashboard</span>
        </a>

        @foreach($navGroups as $groupKey => $group)
        @php $isGroupActive = in_array($pageSlug ?? '', $group['pages']); @endphp
        <div x-data="{ open: {{ $isGroupActive ? 'true' : 'false' }} }">
            <button @click="open = !open"
                    class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors text-white/60 hover:text-white hover:bg-white/10">
                <i class="fas {{ $group['icon'] }} w-4 text-center text-xs"></i>
                <span class="flex-1 text-left">{{ $group['label'] }}</span>
                <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas text-xs text-white/40"></i>
            </button>
            <div x-show="open" class="mt-1 ml-4 space-y-0.5">
                @foreach($group['links'] as $link)
                <a href="{{ route($link['route']) }}"
                   class="flex items-center gap-3 px-3 py-1.5 rounded-lg text-xs transition-colors
                          {{ ($pageSlug ?? '') === $link['slug'] ? 'bg-indigo-500/30 text-indigo-200 font-medium' : 'text-white/50 hover:text-white hover:bg-white/10' }}">
                    <i class="fas {{ $link['icon'] }} w-3 text-center" style="font-size:10px;"></i>
                    <span>{{ $link['label'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
        @endforeach

        @if($user->is_admin)
        <div class="pt-2 mt-2 border-t border-white/10">
            <p class="px-3 py-1 text-xs font-semibold uppercase tracking-wider text-white/30">Admin</p>
        </div>
        @foreach($adminGroups as $groupKey => $group)
        @php $isGroupActive = in_array($pageSlug ?? '', $group['pages']); @endphp
        <div x-data="{ open: {{ $isGroupActive ? 'true' : 'false' }} }">
            <button @click="open = !open"
                    class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors text-white/60 hover:text-white hover:bg-white/10">
                <i class="fas {{ $group['icon'] }} w-4 text-center text-xs"></i>
                <span class="flex-1 text-left">{{ $group['label'] }}</span>
                <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas text-xs text-white/40"></i>
            </button>
            <div x-show="open" class="mt-1 ml-4 space-y-0.5">
                @foreach($group['links'] as $link)
                <a href="{{ route($link['route']) }}"
                   class="flex items-center gap-3 px-3 py-1.5 rounded-lg text-xs transition-colors
                          {{ ($pageSlug ?? '') === $link['slug'] ? 'bg-indigo-500/30 text-indigo-200 font-medium' : 'text-white/50 hover:text-white hover:bg-white/10' }}">
                    <i class="fas {{ $link['icon'] }} w-3 text-center" style="font-size:10px;"></i>
                    <span>{{ $link['label'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
        @endforeach
        @endif
    </nav>
</aside>