@extends('layouts.app', ['page' => __('Email Logs'), 'pageSlug' => 'email-logs'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"><b>Email logs</b></h3>
            </div>

            <div class="card-body">

                <form method="GET" action="{{ route('email-logs.index') }}" style="margin-bottom:15px;">
                    <div class="input-group no-border">
                        <select name="job_id" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin:10px; width:240px;">
                            <option value="">All jobs</option>
                            @foreach($jobs as $job)
                                <option value="{{ $job->id }}" @selected(request('job_id') == $job->id)>
                                    Job #{{ $job->id }} — {{ $job->template->name ?? '?' }}
                                </option>
                            @endforeach
                        </select>

                        <select name="status" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin:10px; width:180px;">
                            <option value="">All statuses</option>
                            @foreach(['sent', 'delivered', 'opened', 'clicked', 'failed', 'bounced'] as $s)
                                <option value="{{ $s }}" @selected(request('status') === $s)>{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-info" style="margin:10px;">Filter</button>

                        @if(request('job_id') || request('status'))
                            <a href="{{ route('email-logs.index') }}" class="btn btn-primary" style="margin:10px;">Clear</a>
                        @endif
                    </div>
                </form>

                <table class="table tablesorter">
                    <thead class="text-primary">
                        <tr>
                            <th>Recipient</th>
                            <th>Job</th>
                            <th>Status</th>
                            <th>Sent at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                        <tr>
                            <td>
                                {{ $log->recipient->email }}
                                @if($log->recipient->name)
                                    <small style="color:#aaa;"> {{ $log->recipient->name }}</small>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('email-jobs.show', $log->recipient->job_id) }}">
                                    Job #{{ $log->recipient->job_id }}
                                </a>
                            </td>
                            <td>{{ ucfirst($log->status) }}</td>
                            <td>{{ $log->sent_at ? $log->sent_at->format('d M Y, H:i') : '—' }}</td>
                            <td>
                                <a href="{{ route('email-logs.show', $log) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-zoom-split"></i>
                                </a>
                                @can('delete', $log)
                                <form action="{{ route('email-logs.destroy', $log) }}" method="POST" style="display:inline"
                                      onsubmit="return confirm('Delete this log entry?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No log entries found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $logs->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection