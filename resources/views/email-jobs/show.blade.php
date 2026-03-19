@extends('layouts.app', ['page' => __('Email Jobs'), 'pageSlug' => 'email-jobs'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"><b>Email job #{{ $emailJob->id }}</b></h3>
                @can('update', $emailJob)
                @if($emailJob->status === 'pending')
                    <a href="{{ route('email-jobs.edit', $emailJob) }}" class="btn btn-warning">Edit</a>
                @endif
                @endcan
                @can('delete', $emailJob)
                @if($emailJob->status === 'pending')
                    <form action="{{ route('email-jobs.destroy', $emailJob) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Cancel this job?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancel job</button>
                    </form>
                @endif
                @endcan
            </div>

            @if (session('success'))
            <div class="alert alert-success" style="margin:10px;" id="status-alert">
                {{ session('success') }}
            </div>
            <script>setTimeout(function(){ document.getElementById('status-alert').style.display='none'; }, 2000);</script>
            @endif

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body text-primary">
                        <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">
                            <h4><b>Template: </b>{{ $emailJob->template->name ?? '—' }}</h4>
                            <h4><b>Type: </b>{{ ucfirst($emailJob->type) }}</h4>
                            <h4><b>Status: </b>{{ ucfirst($emailJob->status) }}</h4>
                            <h4><b>From: </b>{{ $emailJob->from_name ? $emailJob->from_name . ' <' . $emailJob->from_address . '>' : $emailJob->from_address }}</h4>
                            <h4><b>Scheduled: </b>{{ $emailJob->scheduled_at ? $emailJob->scheduled_at->format('d M Y, H:i') : 'Immediate' }}</h4>
                            <h4><b>Created: </b>{{ $emailJob->created_at->format('d M Y, H:i') }}</h4>
                            @if($emailJob->started_at)
                            <h4><b>Started: </b>{{ $emailJob->started_at->format('d M Y, H:i') }}</h4>
                            @endif
                            @if($emailJob->completed_at)
                            <h4><b>Completed: </b>{{ $emailJob->completed_at->format('d M Y, H:i') }}</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                        <h3>Recipients ({{ $emailJob->recipients->count() }})
                            <a href="{{ route('email-logs.index', ['job_id' => $emailJob->id]) }}" class="btn btn-info btn-sm" style="margin-left:10px;">View logs</a>
                        </h3>

                        <table class="table tablesorter" style="margin-top:10px;">
                            <thead class="text-primary">
                                <tr>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Delivery status</th>
                                    <th>Sent at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($emailJob->recipients as $recipient)
                                <tr>
                                    <td>{{ $recipient->email }}</td>
                                    <td>{{ $recipient->name ?? '—' }}</td>
                                    <td>
                                        @if($recipient->log)
                                            {{ ucfirst($recipient->log->status) }}
                                        @else
                                            Pending
                                        @endif
                                    </td>
                                    <td>{{ $recipient->log?->sent_at?->format('d M Y, H:i') ?? '—' }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="text-center">No recipients found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <a href="{{ route('email-jobs.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection