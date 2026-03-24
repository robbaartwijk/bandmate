<x-guest-layout>
<div class="bm-auth-card">
    <h2 class="bm-auth-title">{{ __('auth.verify_email') }}</h2>
    <p class="text-sm text-white/60 mb-6">{{ __('auth.verify_instructions') }}</p>

    @if(session('resent'))
    <div class="bm-alert bm-alert-success mb-4">{{ __('auth.verification_sent') }}</div>
    @endif

    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <button type="submit" class="bm-btn bm-btn-primary w-full">{{ __('auth.resend_verification') }}</button>
    </form>
</div>
</x-guest-layout>