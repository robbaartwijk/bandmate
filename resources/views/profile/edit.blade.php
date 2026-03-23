@extends('layouts.app', ['page' => __('User profile'), 'pageSlug' => 'userprofile'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Edit profile</h2>
    </div>

    <div class="bm-card-body">

        {{-- Flash --}}
        @if (session('status'))
        <div class="bm-alert bm-alert-success" id="status-alert">
            <i class="fas fa-check-circle"></i> {{ session('status') }}
        </div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Column 1: Personal details --}}
                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Personal details</h3>

                    @foreach([
                        ['name',          'Full name',     'text', 'Full name'],
                        ['first_name',     'First name',    'text', 'First name'],
                        ['last_name',      'Last name',     'text', 'Last name'],
                        ['stage_name',     'Stage name',    'text', 'Stage name'],
                        ['email',          'Email',         'text', 'Email address'],
                        ['street',         'Street',        'text', 'Street'],
                        ['street_number',  'Street number', 'text', 'Street number'],
                        ['zip',            'Zip',           'text', 'Zip code'],
                        ['city',           'City',          'text', 'City'],
                        ['state',          'State',         'text', 'State / Province'],
                        ['country',        'Country',       'text', 'Country'],
                        ['phone',          'Phone',         'text', 'Phone number'],
                        ['website',        'Website',       'text', 'https://'],
                    ] as [$field, $label, $type, $placeholder])
                    <div class="bm-form-group">
                        <label class="bm-label">{{ $label }}</label>
                        <input type="{{ $type }}" name="{{ $field }}"
                               class="bm-input @error($field) border-red-500 @enderror"
                               placeholder="{{ $placeholder }}"
                               value="{{ old($field, $user->$field) }}">
                        @include('alerts.feedback', ['field' => $field])
                    </div>
                    @endforeach
                </div>

                {{-- Column 2: Notifications + Avatar --}}
                <div class="space-y-6">

                    {{-- Email notifications --}}
                    <div>
                        <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">Email notifications</h3>
                        <div class="space-y-1">
                            @foreach([
                                'email_notification_all'                => 'All emails',
                                'email_notification_acts'               => 'New registered acts',
                                'email_notification_vacancies'          => 'New registered vacancies',
                                'email_notification_availablemusicians' => 'New registered available musicians',
                                'email_notification_rehearsalrooms'     => 'New registered rehearsal rooms',
                                'email_notification_venues'             => 'New registered venues',
                                'email_notification_agencies'           => 'New registered agencies',
                                'email_notification_newsletter'         => 'Newsletters',
                            ] as $field => $label)
                            <div class="flex items-center justify-between px-3 py-2 rounded hover:bg-white/5 border-b border-white/5">
                                <span class="text-sm text-white/80">{{ $label }}</span>
                                <input type="checkbox" name="{{ $field }}"
                                       class="bm-checkbox"
                                       {{ $user->$field ? 'checked' : '' }}>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Avatar --}}
                    <div>
                        <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">Avatar</h3>
                        <div class="flex flex-wrap items-center gap-4">
                            @if (!empty($user->avatar))
                            <img src="{{ asset('/storage/' . $user->avatar->id . '/' . $user->avatar->file_name) }}"
                                 class="w-20 h-20 rounded-full object-cover border-2 border-white/20" alt="Avatar">
                            @endif
                            <div class="flex-1">
                                <input type="file" id="AvatarThumbnailPic" name="AvatarThumbnailPic" accept="image/*"
                                       class="block w-full text-sm text-white/60 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:bg-indigo-600 file:text-white hover:file:bg-indigo-500"
                                       onchange="validateFileSize(this)">
                                @include('alerts.feedback', ['field' => 'AvatarThumbnailPic'])
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            {{-- Submit buttons --}}
            <div class="flex items-center gap-3 mt-6 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary">
                    <i class="fas fa-save"></i> Update profile
                </button>
                <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>

        </form>
    </div>
</div>

<script>
function validateFileSize(input) {
    const file = input.files[0];
    if (file && file.size > 1048576) {
        alert('File size must be less than 1MB');
        input.value = '';
    }
}
</script>

@endsection