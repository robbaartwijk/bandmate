@extends('layouts.app', ['page' => __('Email Templates'), 'pageSlug' => 'email-templates'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header"><h2 class="bm-card-title">Add email template</h2></div>
    <div class="bm-card-body">
        <form action="{{ route('email-templates.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Settings</h3>
                    <div class="bm-form-group">
                        <label class="bm-label">Internal name</label>
                        <input type="text" name="name" class="bm-input @error('name') border-red-500 @enderror"
                               placeholder="e.g. welcome_email" value="{{ old('name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <div class="bm-form-group">
                        <label class="bm-label">Subject line</label>
                        <input type="text" name="subject" class="bm-input @error('subject') border-red-500 @enderror"
                               placeholder="e.g. Welcome to Bandmate!" value="{{ old('subject') }}">
                        @include('alerts.feedback', ['field' => 'subject'])
                    </div>
                    <div class="bm-form-group">
                        <label class="bm-label">Status</label>
                        <select name="status" class="bm-select @error('status') border-red-500 @enderror">
                            @foreach(['draft', 'active', 'inactive'] as $s)
                            <option value="{{ $s }}" @selected(old('status', 'draft') === $s)>{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'status'])
                    </div>
                </div>

                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Content</h3>
                    <div class="bm-form-group">
                        <label class="bm-label">HTML body</label>
                        <textarea name="body_html" rows="10"
                                  class="bm-textarea font-mono text-xs @error('body_html') border-red-500 @enderror"
                                  placeholder="<p>Hello @{{ first_name }},</p>">{{ old('body_html') }}</textarea>
                        @include('alerts.feedback', ['field' => 'body_html'])
                    </div>
                    <div class="bm-form-group">
                        <label class="bm-label">Plain text body <span class="text-white/30">(optional)</span></label>
                        <textarea name="body_text" rows="5"
                                  class="bm-textarea font-mono text-xs"
                                  placeholder="Plain text fallback...">{{ old('body_text') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-3 mt-4 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary"><i class="fas fa-save"></i> Save template</button>
                <a href="{{ route('email-templates.index') }}" class="bm-btn bm-btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </form>
    </div>
</div>
@endsection