@extends('layouts.app', ['page' => __('auth.register')])

@section('content')

<div class="flex items-center justify-center min-h-[calc(100vh-120px)]">
    <div class="w-full max-w-md">

        <div class="bm-card">
            <div class="bm-card-header">
                <h2 class="bm-card-title">{{ __('auth.create_account') }}</h2>
            </div>

            <div class="bm-card-body space-y-5">

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    {{-- Name --}}
                    <div class="bm-form-group">
                        <label for="name" class="bm-label">{{ __('auth.your_name') }}</label>
                        <input id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               required
                               autofocus
                               autocomplete="name"
                               placeholder="{{ __('auth.your_name') }}"
                               class="bm-input @error('name') ring-2 ring-red-500 border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="bm-form-group">
                        <label for="email" class="bm-label">{{ __('auth.email') }}</label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autocomplete="username"
                               placeholder="you@example.com"
                               class="bm-input @error('email') ring-2 ring-red-500 border-red-500 @enderror">
                        @error('email')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="bm-form-group">
                        <label for="password" class="bm-label">{{ __('auth.password') }}</label>
                        <input id="password"
                               type="password"
                               name="password"
                               required
                               autocomplete="new-password"
                               placeholder="••••••••"
                               class="bm-input @error('password') ring-2 ring-red-500 border-red-500 @enderror">
                        @error('password')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Confirm password --}}
                    <div class="bm-form-group">
                        <label for="password_confirmation" class="bm-label">{{ __('auth.confirm_password') }}</label>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               required
                               autocomplete="new-password"
                               placeholder="••••••••"
                               class="bm-input">
                    </div>

                    {{-- Terms --}}
                    <div class="flex items-start gap-2">
                        <input type="checkbox"
                               id="terms"
                               name="terms"
                               required
                               class="bm-checkbox mt-0.5 flex-shrink-0">
                        <label for="terms" class="text-sm text-white/60 cursor-pointer">
                            {{ __('auth.agree_to') }}
                            <a href="{{ route('terms.show') }}" target="_blank"
                               class="text-indigo-400 hover:text-indigo-300 transition-colors">
                                {{ __('auth.terms') }}
                            </a>
                            {{ __('auth.and') }}
                            <a href="{{ route('policy.show') }}" target="_blank"
                               class="text-indigo-400 hover:text-indigo-300 transition-colors">
                                {{ __('auth.privacy_policy') }}
                            </a>
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="bm-btn-primary w-full justify-center py-2.5">
                        <i class="fas fa-user-plus"></i>
                        {{ __('auth.register') }}
                    </button>

                </form>

                {{-- Login link --}}
                <p class="text-center text-sm text-white/40 pt-2">
                    {{ __('auth.already_have_account') }}
                    <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">
                        {{ __('auth.login') }}
                    </a>
                </p>

            </div>
        </div>

    </div>
</div>

@endsection