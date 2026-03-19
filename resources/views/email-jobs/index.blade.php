@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Email Jobs</h1>
        @can('create', \App\Models\EmailJob::class)
            <a href="{{ route('email-jobs.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                + New Job
            </a>
        @endcan
    </div>

    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-800 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Template</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recipients</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Scheduled</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($jobs as $job)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $job->template->name ?? '—' }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-indigo-100 text-indigo-800">
                                {{ ucfirst($job->type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span @class([
                                'inline-flex px-2 py-1 text-xs font-medium rounded-full',
                                'bg-yellow-100 text-yellow-800' => $job->status === 'pending',
                                'bg-blue-100 text-blue-800'     => $job->status === 'processing',
                                'bg-green-100 text-green-800'   => $job->status === 'completed',
                                'bg-red-100 text-red-800'       => $job->status === 'failed',
                                'bg-gray-100 text-gray-600'     => $job->status === 'cancelled',
                            ])>
                                {{ ucfirst($job->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $job->recipients_count ?? $job->recipients()->count() }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $job->scheduled_at ? $job->scheduled_at->format('d M Y, H:i') : 'Immediate' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $job->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right space-x-3 text-sm">
                            <a href="{{ route('email-jobs.show', $job) }}" class="text-indigo-600 hover:underline">View</a>
                            @can('update', $job)
                                @if($job->status === 'pending')
                                    <a href="{{ route('email-jobs.edit', $job) }}" class="text-indigo-600 hover:underline">Edit</a>
                                @endif
                            @endcan
                            @can('delete', $job)
                                @if($job->status === 'pending')
                                    <form action="{{ route('email-jobs.destroy', $job) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Cancel this job?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline">Cancel</button>
                                    </form>
                                @endif
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-sm text-gray-400">
                            No email jobs yet. <a href="{{ route('email-jobs.create') }}" class="text-indigo-600 hover:underline">Create one</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $jobs->links() }}
    </div>

</div>
@endsection