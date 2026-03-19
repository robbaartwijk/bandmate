@extends('layouts.app', ['page' => __('Email Templates'), 'pageSlug' => 'email-templates'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"><b>Email templates</b></h3>
            </div>

            <div class="card-body">

                @can('create', \App\Models\EmailTemplate::class)
                    <a href="{{ route('email-templates.create') }}" class="btn btn-primary">Add template</a>
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

                <table class="table tablesorter">
                    <thead class="text-primary">
                        <tr>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($templates as $template)
                        <tr>
                            <td><a href="{{ route('email-templates.show', $template) }}">{{ $template->name }}</a></td>
                            <td>{{ Str::limit($template->subject, 60) }}</td>
                            <td>{{ ucfirst($template->status) }}</td>
                            <td>{{ $template->created_at->format('d M Y') }}</td>
                            <td>
                                @can('update', $template)
                                <a href="{{ route('email-templates.edit', $template) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-pencil"></i>
                                </a>
                                @endcan
                                @can('delete', $template)
                                <form action="{{ route('email-templates.destroy', $template) }}" method="POST" style="display:inline"
                                      onsubmit="return confirm('Delete this template?')">
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
                            <td colspan="5" class="text-center">No templates found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $templates->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection