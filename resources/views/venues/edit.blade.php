@extends('layouts.app', ['page' => __('Venues'), 'pageSlug' => 'venues'])

@section('content')

<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Edit venue</h2>
    </div>
    <div class="bm-card-body">
        <form action="{{ route('venues.update', $venue->id) }}" method="post">
            @csrf
            @method('put')

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
                               placeholder="{{ $placeholder }}" value="{{ old($field, $venue->$field) }}">
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
                               placeholder="{{ $placeholder }}" value="{{ old($field, $venue->$field) }}">
                        @include('alerts.feedback', ['field' => $field])
                    </div>
                    @endforeach
                </div>

            </div>

            {{-- Description: full width --}}
            <div class="mt-6">
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Description</h3>
                <div class="bm-form-group">
                    <textarea name="description" class="bm-textarea @error('description') border-red-500 @enderror"
                              placeholder="Describe the venue...">{{ old('description', $venue->description) }}</textarea>
                    @include('alerts.feedback', ['field' => 'description'])
                </div>
            </div>

            <div class="flex items-center gap-3 mt-6 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary">
                    <i class="fas fa-save"></i> Update venue
                </button>
                <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>

@endsection