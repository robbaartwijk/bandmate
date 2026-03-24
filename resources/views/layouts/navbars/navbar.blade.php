@auth()
<header class="flex-shrink-0 flex items-center justify-between h-14 px-4 sm:px-6 border-b border-white/10"
        style="background-color: rgb(20, 20, 70);">

    {{-- Left: mobile menu toggle + page title --}}
    <div class="flex items-center gap-3">
        <button @click="sidebarMobileOpen = true"
                class="lg:hidden text-white/60 hover:text-white transition-colors">
            <i class="fas fa-bars"></i>
        </button>

        <h1 class="text-white/90 text-base font-medium" style="font-family: 'DM Sans', sans-serif;">
            {{ $page ?? config('app.name') }}
        </h1>
    </div>

    {{-- Right: language switcher + user menu --}}
    <div class="flex items-center gap-3">

        {{-- ── Language switcher ── --}}
        <div class="relative" x-data="{ langOpen: false }" @click.outside="langOpen = false">
            <button @click="langOpen = !langOpen"
                    class="flex items-center gap-1.5 text-white/60 hover:text-white transition-colors
                           text-sm px-2.5 py-1.5 rounded-lg hover:bg-white/10">
                <i class="fas fa-globe text-xs"></i>
                <span class="font-medium uppercase">{{ app()->getLocale() }}</span>
                <i class="fas fa-chevron-down text-xs text-white/40 transition-transform duration-200"
                   :class="langOpen ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="langOpen"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                 class="absolute right-0 mt-2 w-28 rounded-xl shadow-2xl overflow-hidden z-50"
                 style="background: rgba(28,28,85,0.98); border: 1px solid rgba(255,255,255,0.12); display:none;">
                <div class="py-1">
                    @foreach(config('app.available_locales', ['en']) as $locale)
                    <form method="POST" action="{{ route('language.switch', $locale) }}">
                        @csrf
                        <button type="submit"
                                class="w-full flex items-center gap-2 px-4 py-2 text-sm transition-colors
                                       {{ app()->getLocale() === $locale
                                            ? 'text-indigo-400 font-semibold'
                                            : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                            <i class="fas fa-check text-xs {{ app()->getLocale() === $locale ? 'opacity-100' : 'opacity-0' }}"></i>
                            <span class="uppercase">{{ $locale }}</span>
                        </button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ── User menu ── --}}
        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
            <button @click="open = !open"
                    class="flex items-center gap-2 text-white/70 hover:text-white transition-colors">

                @if (!empty($userAvatar))
                    <img src="{{ asset('/storage/' . $userAvatar->id . '/' . $userAvatar->file_name) }}"
                         class="w-8 h-8 rounded-full border border-white/20 object-cover">
                @else
                    <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center">
                        <span class="text-white text-xs font-semibold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                    </div>
                @endif

                <span class="hidden sm:block text-base">{{ Auth::user()->name }}</span>
                <i class="fas fa-chevron-down text-xs text-white/40 transition-transform duration-200"
                   :class="open ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="open"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                 class="absolute right-0 mt-2 w-48 rounded-xl shadow-2xl overflow-hidden z-50"
                 style="background: rgba(28,28,85,0.98); border: 1px solid rgba(255,255,255,0.12); display:none;">

                <div class="py-1">
                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-3 px-4 py-2.5 text-base text-white/70 hover:text-white hover:bg-white/10 transition-colors">
                        <i class="fas fa-user-circle w-4 text-xs"></i>
                        {{ __('navigation.profile') }}
                    </a>
                    <a href="{{ route('profile.editPassword') }}"
                       class="flex items-center gap-3 px-4 py-2.5 text-base text-white/70 hover:text-white hover:bg-white/10 transition-colors">
                        <i class="fas fa-lock w-4 text-xs"></i>
                        {{ __('navigation.change_password') }}
                    </a>
                    <a href="{{ route('profile.userdata') }}"
                       class="flex items-center gap-3 px-4 py-2.5 text-base text-white/70 hover:text-white hover:bg-white/10 transition-colors">
                        <i class="fas fa-id-card w-4 text-xs"></i>
                        {{ __('navigation.user_data') }}
                    </a>

                    <div class="my-1 border-t border-white/10"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full flex items-center gap-3 px-4 py-2.5 text-base text-red-400 hover:text-red-300 hover:bg-white/5 transition-colors">
                            <i class="fas fa-sign-out-alt w-4 text-xs"></i>
                            {{ __('navigation.log_out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</header>
@endauth

@guest()
<header class="flex items-center justify-between px-6 py-4">
    <a href="{{ url('/') }}" class="flex items-center gap-3">
        <img src="{{ asset('images/Logo2.jpg') }}" alt="Bandmate" class="h-10 w-auto rounded border border-white/20">
        <span class="text-white font-semibold text-lg" style="font-family: 'DM Sans', sans-serif;">Bandmate</span>
    </a>
    <div class="flex items-center gap-3">

        {{-- Language switcher (guests) --}}
        <div class="relative" x-data="{ langOpen: false }" @click.outside="langOpen = false">
            <button @click="langOpen = !langOpen"
                    class="flex items-center gap-1.5 text-white/60 hover:text-white transition-colors
                           text-sm px-2.5 py-1.5 rounded-lg hover:bg-white/10">
                <i class="fas fa-globe text-xs"></i>
                <span class="font-medium uppercase">{{ app()->getLocale() }}</span>
                <i class="fas fa-chevron-down text-xs text-white/40 transition-transform duration-200"
                   :class="langOpen ? 'rotate-180' : ''"></i>
            </button>

            <div x-show="langOpen"
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 scale-95 -translate-y-1"
                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                 x-transition:leave-end="opacity-0 scale-95 -translate-y-1"
                 class="absolute right-0 mt-2 w-28 rounded-xl shadow-2xl overflow-hidden z-50"
                 style="background: rgba(28,28,85,0.98); border: 1px solid rgba(255,255,255,0.12); display:none;">
                <div class="py-1">
                    @foreach(config('app.available_locales', ['en']) as $locale)
                    <form method="POST" action="{{ route('language.switch', $locale) }}">
                        @csrf
                        <button type="submit"
                                class="w-full flex items-center gap-2 px-4 py-2 text-sm transition-colors
                                       {{ app()->getLocale() === $locale
                                            ? 'text-indigo-400 font-semibold'
                                            : 'text-white/70 hover:text-white hover:bg-white/10' }}">
                            <i class="fas fa-check text-xs {{ app()->getLocale() === $locale ? 'opacity-100' : 'opacity-0' }}"></i>
                            <span class="uppercase">{{ $locale }}</span>
                        </button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>

        <a href="{{ route('login') }}"
           class="text-base text-white/70 hover:text-white transition-colors px-4 py-2 rounded-lg hover:bg-white/10">
            {{ __('auth.login') }}
        </a>
        <a href="{{ route('register') }}"
           class="text-base text-white font-medium px-4 py-2 rounded-lg transition-colors"
           style="background-color: rgb(79, 70, 229);">
            {{ __('auth.register') }}
        </a>
    </div>
</header>
@endguest