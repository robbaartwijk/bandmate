@extends('layouts.app', ['page' => __('Change password'), 'pageSlug' => 'editpassword'])
@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="bm-card">
            <div class="bm-card-header"><h2 class="bm-card-title">Change password</h2></div>
            <div class="bm-card-body">

                <div class="flex flex-col items-center mb-6">
                    @if(!empty($user->avatar))
                    <img src="{{ asset('/storage/' . $user->avatar->id . '/' . $user->avatar->file_name) }}"
                         class="bm_thumbnail mb-3">
                    @else
                    <div class="w-16 h-16 rounded-full bg-indigo-600 flex items-center justify-center mb-3">
                        <span class="text-white text-xl font-semibold">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    </div>
                    @endif
                    <p class="text-white/60 text-sm">{{ $user->name }}</p>
                </div>

                @if($errors->any())
                <div class="bm-alert bm-alert-error mb-4">
                    <ul class="list-disc list-inside text-xs space-y-1">
                        @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                    </ul>
                </div>
                @endif

                @if(session('status'))
                <div class="bm-alert bm-alert-error mb-4">{{ session('status') }}</div>
                @endif

                <form action="{{ route('profile.updatePassword') }}" method="post">
                    @csrf
                    <div class="bm-form-group">
                        <label class="bm-label">Current password</label>
                        <input type="password" name="currentpassword"
                               class="bm-input @error('currentpassword') border-red-500 @enderror"
                               placeholder="Current password">
                        @include('alerts.feedback', ['field' => 'currentpassword'])
                    </div>
                    <div class="bm-form-group">
                        <label class="bm-label">New password</label>
                        <input type="password" name="newpassword"
                               class="bm-input @error('newpassword') border-red-500 @enderror"
                               placeholder="New password">
                        @include('alerts.feedback', ['field' => 'newpassword'])
                    </div>
                    <div class="bm-form-group">
                        <label class="bm-label">Confirm new password</label>
                        <input type="password" name="confirmpassword"
                               class="bm-input @error('confirmpassword') border-red-500 @enderror"
                               placeholder="Confirm new password">
                        @include('alerts.feedback', ['field' => 'confirmpassword'])
                    </div>
                    <div class="flex items-center gap-3 mt-4 pt-4 border-t border-white/10">
                        <button type="submit" class="bm-btn bm-btn-danger"><i class="fas fa-key"></i> Update password</button>
                        <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection