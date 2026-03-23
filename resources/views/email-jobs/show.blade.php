@extends('layouts.app', ['page' => __('Email Jobs'), 'pageSlug' => 'email-jobs'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Email job #{{ $emailJob->id }}</h2>
        <div class="flex items-center gap-2">
            @can('update', $emailJob)
            @if($emailJob->status === 'pending')
            <a href="{{ route('email-jobs.edit', $emailJob) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>
            @endif
            @endcan
            @can('delete', $emailJob)
            @if($emailJob->status === 'pending')
            <form action="{{ route('email-jobs.destroy', $emailJob) }}" method="POST" class="inline"
                  onsubmit="return confirm('Cancel this job?')">
                @csrf @method('DELETE')
                <button type="submit" class="bm-btn bm-btn-danger bm-btn-sm"><i class="fas fa-times"></i> Cancel</button>
            </form>
            @endif
            @endcan
        </div>
    </div>
    <div class="bm-card-body">

        @if(session('success'))
        <div class="bm-alert bm-alert-success mb-4" id="status-alert"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <div>
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-4">Details</h3>
                <dl class="space-y-2 text-sm">
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Template</dt><dd class="text-white/80">{{ $emailJob->template->name ?? '—' }}</dd></div>
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Type</dt><dd class="text-white/80">{{ ucfirst($emailJob->type) }}</dd></div>
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Status</dt>
                        <dd>
                            @php $sc = match($emailJob->status) { 'completed' => 'bm-badge-green', 'failed' => 'bm-badge-red', 'running' => 'bm-badge-blue', default => 'bm-badge-yellow' }; @endphp
                            <span class="bm-badge {{ $sc }}">{{ ucfirst($emailJob->status) }}</span>
                        </dd>
                    </div>
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">From</dt><dd class="text-white/80">{{ $emailJob->from_name ? $emailJob->from_name . ' <' . $emailJob->from_address . '>' : $emailJob->from_address }}</dd></div>
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Scheduled</dt><dd class="text-white/80">{{ $emailJob->scheduled_at ? $emailJob->scheduled_at->format('d M Y, H:i') : 'Immediate' }}</dd></div>
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Created</dt><dd class="text-white/40 text-xs">{{ $emailJob->created_at->format('d M Y, H:i') }}</dd></div>
                    @if($emailJob->started_at)
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Started</dt><dd class="text-white/40 text-xs">{{ $emailJob->started_at->format('d M Y, H:i') }}</dd></div>
                    @endif
                    @if($emailJob->completed_at)
                    <div class="flex gap-2"><dt class="text-white/40 w-28 flex-shrink-0">Completed</dt><dd class="text-white/40 text-xs">{{ $emailJob->completed_at->format('d M Y, H:i') }}</dd></div>
                    @endif
                </dl>
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between pb-2 border-b border-white/10 mb-4">
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider">Recipients ({{ $emailJob->recipients->count() }})</h3>
                <a href="{{ route('email-logs.index', ['job_id' => $emailJob->id]) }}" class="bm-btn bm-btn-info bm-btn-sm">
                    <i class="fas fa-list"></i> View logs
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="bm-table">
                    <thead><tr>
                        <th>Email</th>
                        <th class="hidden sm:table-cell">Name</th>
                        <th>Status</th>
                        <th class="hidden md:table-cell">Sent at</th>
                    </tr></thead>
                    <tbody>
                        @forelse($emailJob->recipients as $recipient)
                        <tr>
                            <td class="text-white/70">{{ $recipient->email }}</td>
                            <td class="hidden sm:table-cell text-white/50">{{ $recipient->name ?? '—' }}</td>
                            <td>
                                @if($recipient->log)
                                    @php $sc = match($recipient->log->status) { 'sent','delivered' => 'bm-badge-green', 'failed','bounced' => 'bm-badge-red', default => 'bm-badge-gray' }; @endphp
                                    <span class="bm-badge {{ $sc }}">{{ ucfirst($recipient->log->status) }}</span>
                                @else
                                    <span class="bm-badge bm-badge-yellow">Pending</span>
                                @endif
                            </td>
                            <td class="hidden md:table-cell text-white/40 text-xs">{{ $recipient->log?->sent_at?->format('d M Y, H:i') ?? '—' }}</td>
                        </tr>
                        @empty
                        <tr><td colspan="4" class="text-center text-white/30 py-4">No recipients found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6 pt-4 border-t border-white/10">
            <a href="{{ route('email-jobs.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection