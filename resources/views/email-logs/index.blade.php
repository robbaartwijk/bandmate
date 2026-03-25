@extends('layouts.app', ['page' => __('Email Logs'), 'pageSlug' => 'email-logs'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header"><h2 class="bm-card-title">Email logs</h2></div>
    <div class="bm-card-body">

        <form method="GET" action="{{ route('email-logs.index') }}" class="flex flex-wrap items-center gap-2 mb-4">
            <select name="job_id" class="bm-select text-sm py-1.5" style="min-width:180px;" onchange="this.form.submit()">
                <option value="">All jobs</option>
                @foreach($jobs as $job)
                <option value="{{ $job->id }}" @selected(request('job_id') == $job->id)>
                    Job #{{ $job->id }} — {{ $job->template->name ?? '?' }}
                </option>
                @endforeach
            </select>
            <select name="status" class="bm-select text-sm py-1.5" style="min-width:140px;" onchange="this.form.submit()">
                <option value="">All statuses</option>
                @foreach(['sent', 'delivered', 'opened', 'clicked', 'failed', 'bounced'] as $s)
                <option value="{{ $s }}" @selected(request('status') === $s)>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            <button type="submit" class="bm-btn bm-btn-primary bm-btn-sm"><i class="fas fa-filter"></i> Filter</button>
            @if(request('job_id') || request('status'))
            <a href="{{ route('email-logs.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">Clear</a>
            @endif
        </form>

        <div class="overflow-x-auto">
            <table class="bm-table">
                <thead><tr>
                    <th>Recipient</th>
                    <th class="hidden sm:table-cell">Job</th>
                    <th>Status</th>
                    <th class="hidden md:table-cell">Sent at</th>
                    <th></th>
                </tr></thead>
                <tbody>
                    @forelse($logs as $log)
                    <tr>
                        <td>
                            <span class="text-white/70">{{ $log->recipient->email }}</span>
                            @if($log->recipient->name)
                            <span class="text-white/30 text-xs ml-1">{{ $log->recipient->name }}</span>
                            @endif
                        </td>
                        <td class="hidden sm:table-cell">
                            <a href="{{ route('email-jobs.show', $log->recipient->job_id) }}" class="text-indigo-400 hover:text-indigo-300">
                                Job #{{ $log->recipient->job_id }}
                            </a>
                        </td>
                        <td>
                            @php $sc = match($log->status) { 'sent','delivered' => 'bm-badge-green', 'opened','clicked' => 'bm-badge-blue', 'failed','bounced' => 'bm-badge-red', default => 'bm-badge-gray' }; @endphp
                            <span class="bm-badge {{ $sc }}">{{ ucfirst($log->status) }}</span>
                        </td>
                        <td class="hidden md:table-cell text-white/40 text-xs">{{ $log->sent_at ? $log->sent_at->format('d M Y, H:i') : '—' }}</td>
                        <td class="whitespace-nowrap">
                            <a href="{{ route('email-logs.show', $log) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-eye"></i></a>
                            @can('delete', $log)
                            <form action="{{ route('email-logs.destroy', $log) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Delete this log entry?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bm-btn bm-btn-danger bm-btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-white/30 py-4">No log entries found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex flex-col items-center gap-2">
            {{ $logs->appends(request()->query())->links() }}
            <span class="text-white/40 text-xs">{{ $logs->firstItem() ?? 0 }} – {{ $logs->lastItem() ?? 0 }} of {{ $logs->total() }}</span>
        </div>
    </div>
</div>
@endsection