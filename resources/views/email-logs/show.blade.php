@extends('layouts.app', ['page' => __('Email Logs'), 'pageSlug' => 'email-logs'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Log entry #{{ $emailLog->id }}</h2>
        @can('delete', $emailLog)
        <form action="{{ route('email-logs.destroy', $emailLog) }}" method="POST" class="inline"
              onsubmit="return confirm('Delete this log entry?')">
            @csrf @method('DELETE')
            <button type="submit" class="bm-btn bm-btn-danger bm-btn-sm"><i class="fas fa-trash"></i> Delete</button>
        </form>
        @endcan
    </div>
    <div class="bm-card-body">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Details</h3>
                <dl class="space-y-2 text-sm">
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Recipient</dt>
                        <dd class="text-white/80">{{ $emailLog->recipient->email }}
                            @if($emailLog->recipient->name)<span class="text-white/40 text-xs ml-1">({{ $emailLog->recipient->name }})</span>@endif
                        </dd></div>
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Job</dt>
                        <dd><a href="{{ route('email-jobs.show', $emailLog->recipient->job_id) }}" class="text-indigo-400 hover:text-indigo-300">
                            Job #{{ $emailLog->recipient->job_id }}</a>
                            — {{ $emailLog->recipient->job->template->name ?? '—' }}</dd></div>
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Status</dt>
                        <dd>
                            @php $sc = match($emailLog->status) { 'sent','delivered' => 'bm-badge-green', 'opened','clicked' => 'bm-badge-blue', 'failed','bounced' => 'bm-badge-red', default => 'bm-badge-gray' }; @endphp
                            <span class="bm-badge {{ $sc }}">{{ ucfirst($emailLog->status) }}</span>
                        </dd></div>
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Message ID</dt><dd class="text-white/50 font-mono text-xs">{{ $emailLog->message_id ?? '—' }}</dd></div>
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Sent at</dt><dd class="text-white/40 text-xs">{{ $emailLog->sent_at ? $emailLog->sent_at->format('d M Y, H:i:s') : '—' }}</dd></div>
                    @if($emailLog->failed_at)
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Failed at</dt><dd class="text-red-400 text-xs">{{ $emailLog->failed_at->format('d M Y, H:i:s') }}</dd></div>
                    @endif
                </dl>
            </div>
        </div>

        @if($emailLog->error_message)
        <div class="mb-6">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">Error message</h3>
            <pre class="bg-gray-900 rounded-lg p-4 text-xs text-red-400 overflow-x-auto whitespace-pre-wrap border border-red-500/20">{{ $emailLog->error_message }}</pre>
        </div>
        @endif

        @if($emailLog->recipient->variables)
        <div class="mb-6">
            <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">Merge variables used</h3>
            <pre class="bg-gray-900 rounded-lg p-4 text-xs text-white/60 overflow-x-auto whitespace-pre-wrap border border-white/10">{{ json_encode($emailLog->recipient->variables, JSON_PRETTY_PRINT) }}</pre>
        </div>
        @endif

        <div class="pt-4 border-t border-white/10">
            <a href="{{ route('email-logs.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection