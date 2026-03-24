<x-guest-layout>
@section('content')
<div class="bm-auth-card">
    <h2 class="bm-auth-title">{{ __('auth.forgot_title') }}</h2>
    <p class="text-sm text-white/60 mb-6">{{ __('auth.forgot_instructions') }}</p>

    @if(session('status'))
    <div class="bm-alert bm-alert-success mb-4">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="bm-form-group">
            <label class="bm-label">{{ __('auth.email') }}</label>
            <input type="email" name="email" value="{{ old('email') }}" class="bm-input @error('email') bm-input-error @enderror" required autofocus>
            @error('email')<span class="bm-error">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="bm-btn bm-btn-primary w-full">{{ __('auth.send_reset_link') }}</button>
    </form>

    <p class="mt-4 text-center text-sm text-white/50">
        <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300">{{ __('auth.back_to_login') }}</a>
    </p>
</div>
</x-guest-layout>