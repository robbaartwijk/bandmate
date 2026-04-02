@extends('layouts.app', ['page' => __('profile.title'), 'pageSlug' => 'userprofile'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('profile.edit') }}</h2>
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
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">{{ __('profile.my_data') }}</h3>

                    @foreach([
                        ['name',          'profile.name',          'text', 'profile.name'],
                        ['first_name',    'profile.first_name',    'text', 'profile.first_name'],
                        ['last_name',     'profile.last_name',     'text', 'profile.last_name'],
                        ['stage_name',    'profile.stage_name',    'text', 'profile.stage_name'],
                        ['email',         'profile.email',         'text', 'profile.email'],
                        ['street',        'profile.street',        'text', 'profile.street'],
                        ['street_number', 'profile.street_number', 'text', 'profile.street_number'],
                        ['zip',           'profile.zip',           'text', 'profile.zip'],
                        ['city',          'profile.city',          'text', 'profile.city'],
                        ['state',         'profile.state',         'text', 'profile.state'],
                        ['country',       'profile.country',       'text', 'profile.country'],
                        ['phone',         'profile.phone',         'text', 'profile.phone'],
                        ['website',       'profile.website',       'text', 'https://'],
                    ] as [$field, $labelKey, $type, $placeholderKey])
                    <div class="bm-form-group">
                        <label class="bm-label">{{ __($labelKey) }}</label>
                        <input type="{{ $type }}" name="{{ $field }}"
                               class="bm-input @error($field) border-red-500 @enderror"
                               placeholder="{{ $placeholderKey === 'https://' ? 'https://' : __($placeholderKey) }}"
                               value="{{ old($field, $user->$field) }}">
                        @include('alerts.feedback', ['field' => $field])
                    </div>
                    @endforeach
                </div>

                {{-- Column 2: Preferences + Notifications + Avatar --}}
                <div class="space-y-6">

                    {{-- Language preference --}}
                    <div>
                        <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">{{ __('profile.language') }}</h3>
                        <div class="bm-form-group">
                            <label class="bm-label">{{ __('profile.language') }}</label>
                            <select name="locale" class="bm-select">
                                @foreach(config('app.available_locales') as $locale)
                                <option value="{{ $locale }}" {{ old('locale', $user->locale) === $locale ? 'selected' : '' }}>
                                    {{ strtoupper($locale) }}
                                </option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-white/40">{{ __('profile.language_hint') }}</p>
                        </div>
                    </div>

                    {{-- Email notifications --}}
                    <div>
                        <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">{{ __('profile.notifications') }}</h3>
                        <div class="space-y-1">
                            @foreach([
                                'email_notification_all'                => 'profile.notify_all',
                                'email_notification_acts'               => 'profile.notify_acts',
                                'email_notification_vacancies'          => 'profile.notify_vacancies',
                                'email_notification_availablemusicians' => 'profile.notify_musicians',
                                'email_notification_rehearsalrooms'     => 'profile.notify_rooms',
                                'email_notification_venues'             => 'profile.notify_venues',
                                'email_notification_agencies'           => 'profile.notify_agencies',
                                'email_notification_newsletter'         => 'profile.notify_newsletter',
                            ] as $field => $labelKey)
                            <div class="flex items-center justify-between px-3 py-2 rounded hover:bg-white/5 border-b border-white/5">
                                <span class="text-sm text-white/80">{{ __($labelKey) }}</span>
                                <input type="checkbox" name="{{ $field }}"
                                       class="bm-checkbox"
                                       {{ $user->$field ? 'checked' : '' }}>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Avatar --}}
                    <div>
                        <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">{{ __('profile.photo') }}</h3>
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
                    <i class="fas fa-save"></i> {{ __('common.update') }}
                </button>
                <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary">
                    <i class="fas fa-arrow-left"></i> {{ __('common.back') }}
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