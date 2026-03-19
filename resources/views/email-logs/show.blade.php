@extends('layouts.app', ['page' => __('Email Logs'), 'pageSlug' => 'email-logs'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"><b>Log entry #{{ $emailLog->id }}</b></h3>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body text-primary">
                        <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">
                            <h4><b>Recipient: </b>{{ $emailLog->recipient->email }}
                                @if($emailLog->recipient->name)
                                    <small style="color:#aaa;"> ({{ $emailLog->recipient->name }})</small>
                                @endif
                            </h4>
                            <h4><b>Job: </b>
                                <a href="{{ route('email-jobs.show', $emailLog->recipient->job_id) }}">
                                    Job #{{ $emailLog->recipient->job_id }}
                                </a>
                                — {{ $emailLog->recipient->job->template->name ?? '—' }}
                            </h4>
                            <h4><b>Status: </b>{{ ucfirst($emailLog->status) }}</h4>
                            <h4><b>Message ID: </b><code>{{ $emailLog->message_id ?? '—' }}</code></h4>
                            <h4><b>Sent at: </b>{{ $emailLog->sent_at ? $emailLog->sent_at->format('d M Y, H:i:s') : '—' }}</h4>
                            <h4><b>Failed at: </b>{{ $emailLog->failed_at ? $emailLog->failed_at->format('d M Y, H:i:s') : '—' }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            @if($emailLog->error_message)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                        <h4><b>Error message</b></h4>
                        <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">
                            <pre style="color:#e55; background:#1e1e2e; padding:12px; border-radius:6px; font-size:12px; white-space:pre-wrap;">{{ $emailLog->error_message }}</pre>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($emailLog->recipient->variables)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                        <h4><b>Merge variables used</b></h4>
                        <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">
                            <pre style="color:#ccc; background:#1e1e2e; padding:12px; border-radius:6px; font-size:12px; white-space:pre-wrap;">{{ json_encode($emailLog->recipient->variables, JSON_PRETTY_PRINT) }}</pre>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <a href="{{ route('email-logs.index') }}" class="btn btn-primary">Back</a>
                        @can('delete', $emailLog)
                        <form action="{{ route('email-logs.destroy', $emailLog) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Delete this log entry?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete log entry</button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection