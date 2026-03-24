@extends('layouts.app', ['page' => __('Verify Email')])

@section('content')

<div class="flex items-center justify-center min-h-[calc(100vh-120px)]">
    <div class="w-full max-w-md">

        <div class="bm-card">
            <div class="bm-card-header">
                <h2 class="bm-card-title">{{ __('Verify your email address') }}</h2>
            </div>

            <div class="bm-card-body space-y-5">

                <p class="text-sm text-white/60">
                    {{ __('Before continuing, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email, click the button below to request another.') }}
                </p>

                {{-- Success status --}}
                @if (session('resent'))
                    <div class="bm-alert-success">
                        <i class="fas fa-check-circle"></i>
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                <div class="flex flex-col gap-3">

                    {{-- Resend button --}}
                    @if (Route::has('verification.resend'))
                    <form method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="bm-btn-primary w-full justify-center py-2.5">
                            <i class="fas fa-envelope"></i>
                            {{ __('Resend verification email') }}
                        </button>
                    </form>
                    @endif

                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="bm-btn bm-btn-secondary w-full justify-center py-2.5">
                            <i class="fas fa-sign-out-alt"></i>
                            {{ __('Log out') }}
                        </button>
                    </form>

                </div>

            </div>
        </div>

    </div>
</div>

@endsection