<x-guest-layout>
@section('content')
<div class="bm-auth-card">
    <h2 class="bm-auth-title">{{ __('auth.reset_password') }}</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="bm-form-group">
            <label class="bm-label">{{ __('auth.email') }}</label>
            <input type="email" name="email" value="{{ old('email', $request->email) }}" class="bm-input @error('email') bm-input-error @enderror" required autofocus autocomplete="username">
            @error('email')<span class="bm-error">{{ $message }}</span>@enderror
        </div>

        <div class="bm-form-group">
            <label class="bm-label">{{ __('auth.new_password') }}</label>
            <input type="password" name="password" class="bm-input @error('password') bm-input-error @enderror" required autocomplete="new-password">
            @error('password')<span class="bm-error">{{ $message }}</span>@enderror
        </div>

        <div class="bm-form-group">
            <label class="bm-label">{{ __('auth.confirm_password') }}</label>
            <input type="password" name="password_confirmation" class="bm-input" required autocomplete="new-password">
        </div>

        <button type="submit" class="bm-btn bm-btn-primary w-full">{{ __('auth.reset_password') }}</button>
    </form>
</div>
</x-guest-layout>