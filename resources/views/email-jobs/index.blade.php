@extends('layouts.app', ['page' => __('Email Jobs'), 'pageSlug' => 'email-jobs'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Email jobs</h2>
        @can('create', \App\Models\EmailJob::class)
        <a href="{{ route('email-jobs.create') }}" class="bm-btn bm-btn-primary bm-btn-sm"><i class="fas fa-plus"></i> New job</a>
        @endcan
    </div>
    <div class="bm-card-body">
        @if(session('success'))
        <div class="bm-alert bm-alert-success mb-4" id="status-alert"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        <div class="overflow-x-auto">
            <table class="bm-table">
                <thead><tr>
                    <th>Template</th>
                    <th class="hidden sm:table-cell">Status</th>
                    <th class="hidden md:table-cell">Recipients</th>
                    <th class="hidden lg:table-cell">Type</th>
                    <th class="hidden lg:table-cell">Scheduled</th>
                    <th class="hidden xl:table-cell">Created</th>
                    <th></th>
                </tr></thead>
                <tbody>
                    @forelse($jobs as $job)
                    <tr>
                        <td><a href="{{ route('email-jobs.show', $job) }}" class="text-indigo-400 hover:text-indigo-300">{{ $job->template->name ?? '—' }}</a></td>
                        <td class="hidden sm:table-cell">
                            @php $sc = match($job->status) { 'completed' => 'bm-badge-green', 'failed' => 'bm-badge-red', 'running' => 'bm-badge-blue', default => 'bm-badge-yellow' }; @endphp
                            <span class="bm-badge {{ $sc }}">{{ ucfirst($job->status) }}</span>
                        </td>
                        <td class="hidden md:table-cell text-white/60">{{ $job->recipients_count ?? $job->recipients()->count() }}</td>
                        <td class="hidden lg:table-cell text-white/60">{{ ucfirst($job->type) }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $job->scheduled_at ? $job->scheduled_at->format('d M Y, H:i') : 'Immediate' }}</td>
                        <td class="hidden xl:table-cell text-white/40 text-xs">{{ $job->created_at->format('d M Y') }}</td>
                        <td class="whitespace-nowrap">
                            @can('update', $job)
                            @if($job->status === 'pending')
                            <a href="{{ route('email-jobs.edit', $job) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                            @endif
                            @endcan
                            @can('delete', $job)
                            @if($job->status === 'pending')
                            <form action="{{ route('email-jobs.destroy', $job) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Cancel this job?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bm-btn bm-btn-danger bm-btn-sm"><i class="fas fa-times"></i></button>
                            </form>
                            @endif
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center text-white/30 py-4">No email jobs yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $jobs->links() }}</div>
    </div>
</div>
@endsection