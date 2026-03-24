@extends('layouts.app', ['page' => __('Reset Password')])

@section('content')

<div class="flex items-center justify-center min-h-[calc(100vh-120px)]">
    <div class="w-full max-w-md">

        <div class="bm-card">
            <div class="bm-card-header">
                <h2 class="bm-card-title">{{ __('Forgot your password?') }}</h2>
            </div>

            <div class="bm-card-body space-y-5">

                <p class="text-sm text-white/50">
                    {{ __("No problem. Enter your email address and we'll send you a password reset link.") }}
                </p>

                {{-- Status message --}}
                @if (session('status'))
                    <div class="bm-alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
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

                    {{-- Submit --}}
                    <button type="submit" class="bm-btn-primary w-full justify-center py-2.5">
                        <i class="fas fa-paper-plane"></i>
                        {{ __('Send Password Reset Link') }}
                    </button>

                </form>

                {{-- Back to login --}}
                <p class="text-center text-sm text-white/40 pt-2">
                    <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 transition-colors">
                        <i class="fas fa-arrow-left text-xs"></i>
                        {{ __('Back to login') }}
                    </a>
                </p>

            </div>
        </div>

    </div>
</div>

@endsection