@extends('layouts.app', ['page' => __('Email Templates'), 'pageSlug' => 'email-templates'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Email templates</h2>
        @can('create', \App\Models\EmailTemplate::class)
        <a href="{{ route('email-templates.create') }}" class="bm-btn bm-btn-primary bm-btn-sm"><i class="fas fa-plus"></i> Add template</a>
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
                    <th>Name</th><th>Subject</th><th>Status</th><th>Created</th><th></th>
                </tr></thead>
                <tbody>
                    @forelse($templates as $template)
                    <tr>
                        <td><a href="{{ route('email-templates.show', $template) }}" class="text-indigo-400 hover:text-indigo-300">{{ $template->name }}</a></td>
                        <td class="text-white/60">{{ Str::limit($template->subject, 60) }}</td>
                        <td>
                            @php $sc = match($template->status) { 'active' => 'bm-badge-green', 'inactive' => 'bm-badge-gray', default => 'bm-badge-yellow' }; @endphp
                            <span class="bm-badge {{ $sc }}">{{ ucfirst($template->status) }}</span>
                        </td>
                        <td class="text-white/40 text-xs">{{ $template->created_at->format('d M Y') }}</td>
                        <td class="whitespace-nowrap">
                            @can('update', $template)
                            <a href="{{ route('email-templates.edit', $template) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                            @endcan
                            @can('delete', $template)
                            <form action="{{ route('email-templates.destroy', $template) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Delete this template?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="bm-btn bm-btn-danger bm-btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-white/30 py-4">No templates found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $templates->links() }}</div>
    </div>
</div>
@endsection