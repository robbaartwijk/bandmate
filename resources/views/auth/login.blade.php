@extends('layouts.app', ['page' => __('Login')])

@section('content')

<div class="flex items-center justify-center min-h-[calc(100vh-120px)]">
    <div class="w-full max-w-md">

        <div class="bm-card">
            <div class="bm-card-header">
                <h2 class="bm-card-title">{{ __('Sign in to Bandmate') }}</h2>
            </div>

            <div class="bm-card-body space-y-5">

                {{-- Session status --}}
                @if (session('status'))
                    <div class="bm-alert-info">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    {{-- Email --}}
                    <div class="bm-form-group">
                        <label for="email" class="bm-label">{{ __('Email address') }}</label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="you@example.com"
                               class="bm-input @error('email') ring-2 ring-red-500 border-red-500 @enderror">
                        @error('email')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="bm-form-group">
                        <label for="password" class="bm-label">{{ __('Password') }}</label>
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="••••••••"
                               class="bm-input @error('password') ring-2 ring-red-500 border-red-500 @enderror">
                        @error('password')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Remember me --}}
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox"
                                   name="remember"
                                   id="remember_me"
                                   class="bm-checkbox">
                            <span class="text-sm text-white/60">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}"
                               class="text-sm text-indigo-400 hover:text-indigo-300 transition-colors">
                                {{ __('Forgot password?') }}
                            </a>
                        @endif
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="bm-btn-primary w-full justify-center py-2.5">
                        <i class="fas fa-sign-in-alt"></i>
                        {{ __('Log in') }}
                    </button>

                </form>

                {{-- Register link --}}
                @if (Route::has('register'))
                <p class="text-center text-sm text-white/40 pt-2">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">
                        {{ __('Register') }}
                    </a>
                </p>
                @endif

            </div>
        </div>

    </div>
</div>

@endsection