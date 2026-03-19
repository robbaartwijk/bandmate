@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Email Logs</h1>
    </div>

    {{-- Filters --}}
    <form method="GET" action="{{ route('email-logs.index') }}" class="flex gap-3 mb-6">
        <select name="job_id"
                class="rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="">All jobs</option>
            @foreach($jobs as $job)
                <option value="{{ $job->id }}" @selected(request('job_id') == $job->id)>
                    Job #{{ $job->id }} — {{ $job->template->name ?? '?' }}
                </option>
            @endforeach
        </select>
        <select name="status"
                class="rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
            <option value="">All statuses</option>
            @foreach(['sent', 'delivered', 'opened', 'clicked', 'failed', 'bounced'] as $s)
                <option value="{{ $s }}" @selected(request('status') === $s)>{{ ucfirst($s) }}</option>
            @endforeach
        </select>
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
            Filter
        </button>
        @if(request('job_id') || request('status'))
            <a href="{{ route('email-logs.index') }}"
               class="px-4 py-2 text-sm text-gray-500 hover:text-gray-700">Clear</a>
        @endif
    </form>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recipient</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sent at</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($logs as $log)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 text-sm text-gray-900">
                            {{ $log->recipient->email }}
                            @if($log->recipient->name)
                                <span class="text-gray-400 text-xs ml-1">{{ $log->recipient->name }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-600">
                            <a href="{{ route('email-jobs.show', $log->recipient->job_id) }}" class="text-indigo-600 hover:underline">
                                Job #{{ $log->recipient->job_id }}
                            </a>
                        </td>
                        <td class="px-6 py-3">
                            <span @class([
                                'inline-flex px-2 py-1 text-xs font-medium rounded-full',
                                'bg-green-100 text-green-800'   => in_array($log->status, ['sent', 'delivered']),
                                'bg-blue-100 text-blue-800'     => in_array($log->status, ['opened', 'clicked']),
                                'bg-red-100 text-red-800'       => in_array($log->status, ['failed', 'bounced']),
                            ])>
                                {{ ucfirst($log->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-xs text-gray-400 font-mono">{{ $log->message_id ?? '—' }}</td>
                        <td class="px-6 py-3 text-sm text-gray-500">
                            {{ $log->sent_at ? $log->sent_at->format('d M Y, H:i') : '—' }}
                        </td>
                        <td class="px-6 py-3 text-right text-sm">
                            <a href="{{ route('email-logs.show', $log) }}" class="text-indigo-600 hover:underline">View</a>
                            @can('delete', $log)
                                <form action="{{ route('email-logs.destroy', $log) }}" method="POST" class="inline ml-3"
                                      onsubmit="return confirm('Delete this log entry?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-sm text-gray-400">No log entries found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>

</div>
@endsection