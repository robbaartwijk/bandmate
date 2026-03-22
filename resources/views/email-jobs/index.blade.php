@extends('layouts.app', ['page' => __('Email Jobs'), 'pageSlug' => 'email-jobs'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"><b>Email jobs</b></h3>
            </div>

            <div class="card-body">

                @can('create', \App\Models\EmailJob::class)
                <a href="{{ route('email-jobs.create') }}" class="btn btn-primary" style="margin-bottom:12px;">New job</a>
                @endcan

                @if (session('success'))
                <div class="alert alert-success" role="alert" id="status-alert">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('status-alert').style.display = 'none';
                    }, 2000);
                </script>
                @endif

                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Template</th>
                                <th class="d-none d-sm-table-cell">Status</th>
                                <th class="d-none d-md-table-cell">Recipients</th>
                                <th class="d-none d-lg-table-cell">Type</th>
                                <th class="d-none d-lg-table-cell">Scheduled</th>
                                <th class="d-none d-xl-table-cell">Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($jobs as $job)
                            <tr>
                                <td><a href="{{ route('email-jobs.show', $job) }}">{{ $job->template->name ?? '—' }}</a></td>
                                <td class="d-none d-sm-table-cell">{{ ucfirst($job->status) }}</td>
                                <td class="d-none d-md-table-cell">{{ $job->recipients_count ?? $job->recipients()->count() }}</td>
                                <td class="d-none d-lg-table-cell">{{ ucfirst($job->type) }}</td>
                                <td class="d-none d-lg-table-cell">{{ $job->scheduled_at ? $job->scheduled_at->format('d M Y, H:i') : 'Immediate' }}</td>
                                <td class="d-none d-xl-table-cell">{{ $job->created_at->format('d M Y') }}</td>
                                <td style="white-space:nowrap;">
                                    @can('update', $job)
                                    @if($job->status === 'pending')
                                    <a href="{{ route('email-jobs.edit', $job) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    @endif
                                    @endcan
                                    @can('delete', $job)
                                    @if($job->status === 'pending')
                                    <form action="{{ route('email-jobs.destroy', $job) }}" method="POST" style="display:inline"
                                          onsubmit="return confirm('Cancel this job?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-link btn-icon btn-sm">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </form>
                                    @endif
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No email jobs yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $jobs->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection