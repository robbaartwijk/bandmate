@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Add rehearsal room</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('rehearsalrooms.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Column 1: Address --}}
                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Address</h3>

                    @foreach([
                        ['name',    'Name',    'Name'],
                        ['address', 'Address', 'Street address'],
                        ['zip',     'Zip',     'Postal code'],
                        ['city',    'City',    'City'],
                        ['state',   'State',   'State / Province'],
                        ['country', 'Country', 'Country'],
                    ] as [$field, $label, $placeholder])
                    <div class="bm-form-group">
                        <label class="bm-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}"
                               class="bm-input @error($field) border-red-500 @enderror"
                               placeholder="{{ $placeholder }}" value="{{ old($field) }}">
                        @include('alerts.feedback', ['field' => $field])
                    </div>
                    @endforeach
                </div>

                {{-- Column 2: Contact --}}
                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Contact</h3>

                    @foreach([
                        ['phone',   'Phone',   'Phone number'],
                        ['email',   'Email',   'Email address'],
                        ['website', 'Website', 'https://'],
                    ] as [$field, $label, $placeholder])
                    <div class="bm-form-group">
                        <label class="bm-label">{{ $label }}</label>
                        <input type="text" name="{{ $field }}"
                               class="bm-input @error($field) border-red-500 @enderror"
                               placeholder="{{ $placeholder }}" value="{{ old($field) }}">
                        @include('alerts.feedback', ['field' => $field])
                    </div>
                    @endforeach

                    <div class="bm-form-group">
                        <label class="bm-label">Picture</label>
                        <input type="file" id="rehearsalroompic" name="rehearsalroompic" accept="image/*"
                               class="block w-full text-sm text-white/60 file:mr-3 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:bg-indigo-600 file:text-white hover:file:bg-indigo-500"
                               onchange="validateFileSize(this)">
                        @include('alerts.feedback', ['field' => 'rehearsalroompic'])
                    </div>
                </div>

            </div>

            {{-- Description: full width --}}
            <div class="mt-6">
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Description</h3>
                <div class="bm-form-group">
                    <textarea name="description" class="bm-textarea @error('description') border-red-500 @enderror"
                              placeholder="Describe the rehearsal room...">{{ old('description') }}</textarea>
                    @include('alerts.feedback', ['field' => 'description'])
                </div>
            </div>

            <div class="flex items-center gap-3 mt-6 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary">
                    <i class="fas fa-plus"></i> Add rehearsal room
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