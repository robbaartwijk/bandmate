@extends('layouts.app', ['page' => __('Email Templates'), 'pageSlug' => 'email-templates'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ $emailTemplate->name }}</h2>
        <div class="flex items-center gap-2">
            @can('update', $emailTemplate)
            <a href="{{ route('email-templates.edit', $emailTemplate) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
            @endcan
            @can('delete', $emailTemplate)
            <form action="{{ route('email-templates.destroy', $emailTemplate) }}" method="POST" class="inline"
                  onsubmit="return confirm('Delete this template?')">
                @csrf @method('DELETE')
                <button type="submit" class="bm-btn bm-btn-danger bm-btn-sm"><i class="fas fa-trash"></i> Delete</button>
            </form>
            @endcan
        </div>
    </div>
    <div class="bm-card-body">

        <dl class="flex flex-wrap gap-x-8 gap-y-2 text-sm mb-6">
            <div class="flex gap-2"><dt class="text-white/40">Subject</dt><dd class="text-white/80">{{ $emailTemplate->subject }}</dd></div>
            <div class="flex gap-2"><dt class="text-white/40">Status</dt>
                <dd>
                    @php $sc = match($emailTemplate->status) { 'active' => 'bm-badge-green', 'inactive' => 'bm-badge-gray', default => 'bm-badge-yellow' }; @endphp
                    <span class="bm-badge {{ $sc }}">{{ ucfirst($emailTemplate->status) }}</span>
                </dd>
            </div>
            <div class="flex gap-2"><dt class="text-white/40">Created</dt><dd class="text-white/40 text-xs">{{ $emailTemplate->created_at->format('d M Y, H:i') }}</dd></div>
            <div class="flex gap-2"><dt class="text-white/40">Updated</dt><dd class="text-white/40 text-xs">{{ $emailTemplate->updated_at->format('d M Y, H:i') }}</dd></div>
        </dl>

        <div class="space-y-4">
            <div>
                <div class="flex items-center justify-between pb-2 border-b border-white/10 mb-3">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider">HTML body</h3>
                    <button type="button" class="bm-btn bm-btn-secondary bm-btn-sm"
                            onclick="document.getElementById('html-preview').classList.toggle('hidden');document.getElementById('html-source').classList.toggle('hidden')">
                        Toggle source / preview
                    </button>
                </div>
                <div id="html-preview" class="rounded-lg overflow-hidden border border-white/10">
                    <iframe srcdoc="{{ $emailTemplate->body_html }}"
                            class="w-full min-h-64 border-0" sandbox="allow-same-origin"></iframe>
                </div>
                <div id="html-source" class="hidden">
                    <pre class="bg-gray-900 rounded-lg p-4 text-xs text-white/60 overflow-x-auto whitespace-pre-wrap border border-white/10">{{ $emailTemplate->body_html }}</pre>
                </div>
            </div>

            @if($emailTemplate->body_text)
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">Plain text body</h3>
                <pre class="bg-gray-900 rounded-lg p-4 text-xs text-white/60 overflow-x-auto whitespace-pre-wrap border border-white/10">{{ $emailTemplate->body_text }}</pre>
            </div>
            @endif
        </div>

        <div class="mt-6 pt-4 border-t border-white/10">
            <a href="{{ route('email-templates.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection