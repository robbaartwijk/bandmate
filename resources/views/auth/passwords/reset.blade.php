@extends('layouts.app', ['page' => __('Reset password'), 'pageSlug' => ''])

@section('content')
<div class="flex justify-center items-start pt-8">
    <div class="w-full max-w-md">
        <div class="bm-card">
            <div class="bm-card-header">
                <h2 class="bm-card-title">Reset password</h2>
            </div>
            <div class="bm-card-body">

                @include('alerts.success', ['key' => 'status'])

                @if($errors->any())
                <div class="bm-alert bm-alert-error mb-4">
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="bm-form-group">
                        <label class="bm-label">Email address</label>
                        <input type="email" name="email"
                               class="bm-input @error('email') border-red-500 @enderror"
                               placeholder="your@email.com"
                               value="{{ old('email') }}" required autofocus>
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">New password</label>
                        <input type="password" name="password"
                               class="bm-input @error('password') border-red-500 @enderror"
                               placeholder="New password" required>
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Confirm new password</label>
                        <input type="password" name="password_confirmation"
                               class="bm-input"
                               placeholder="Confirm new password" required>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="bm-btn bm-btn-primary w-full justify-center">
                            <i class="fas fa-key"></i> Reset password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection