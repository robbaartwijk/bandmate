@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="flex items-center justify-between mb-6">
        <div>
            <a href="{{ route('email-jobs.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to jobs</a>
            <h1 class="text-2xl font-semibold text-gray-900 mt-2">Email Job #{{ $emailJob->id }}</h1>
        </div>
        <div class="flex gap-3">
            @can('update', $emailJob)
                @if($emailJob->status === 'pending')
                    <a href="{{ route('email-jobs.edit', $emailJob) }}"
                       class="px-4 py-2 text-sm border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">Edit</a>
                @endif
            @endcan
            @can('delete', $emailJob)
                @if($emailJob->status === 'pending')
                    <form action="{{ route('email-jobs.destroy', $emailJob) }}" method="POST"
                          onsubmit="return confirm('Cancel this job?')">
                        @csrf @method('DELETE')
                        <button type="submit"
                                class="px-4 py-2 text-sm border border-red-300 rounded-lg text-red-600 hover:bg-red-50 transition">Cancel job</button>
                    </form>
                @endif
            @endcan
        </div>
    </div>

    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-800 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Job meta --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6 grid grid-cols-2 md:grid-cols-3 gap-4 text-sm">
        <div>
            <p class="text-gray-500 mb-1">Template</p>
            <p class="font-medium text-gray-900">{{ $emailJob->template->name ?? '—' }}</p>
        </div>
        <div>
            <p class="text-gray-500 mb-1">Type</p>
            <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full bg-indigo-100 text-indigo-800">
                {{ ucfirst($emailJob->type) }}
            </span>
        </div>
        <div>
            <p class="text-gray-500 mb-1">Status</p>
            <span @class([
                'inline-flex px-2 py-1 text-xs font-medium rounded-full',
                'bg-yellow-100 text-yellow-800' => $emailJob->status === 'pending',
                'bg-blue-100 text-blue-800'     => $emailJob->status === 'processing',
                'bg-green-100 text-green-800'   => $emailJob->status === 'completed',
                'bg-red-100 text-red-800'       => $emailJob->status === 'failed',
                'bg-gray-100 text-gray-600'     => $emailJob->status === 'cancelled',
            ])>
                {{ ucfirst($emailJob->status) }}
            </span>
        </div>
        <div>
            <p class="text-gray-500 mb-1">From</p>
            <p class="text-gray-900">{{ $emailJob->from_name ? $emailJob->from_name . ' <' . $emailJob->from_address . '>' : $emailJob->from_address }}</p>
        </div>
        <div>
            <p class="text-gray-500 mb-1">Scheduled</p>
            <p class="text-gray-900">{{ $emailJob->scheduled_at ? $emailJob->scheduled_at->format('d M Y, H:i') : 'Immediate' }}</p>
        </div>
        <div>
            <p class="text-gray-500 mb-1">Created</p>
            <p class="text-gray-900">{{ $emailJob->created_at->format('d M Y, H:i') }}</p>
        </div>
        @if($emailJob->started_at)
        <div>
            <p class="text-gray-500 mb-1">Started</p>
            <p class="text-gray-900">{{ $emailJob->started_at->format('d M Y, H:i') }}</p>
        </div>
        @endif
        @if($emailJob->completed_at)
        <div>
            <p class="text-gray-500 mb-1">Completed</p>
            <p class="text-gray-900">{{ $emailJob->completed_at->format('d M Y, H:i') }}</p>
        </div>
        @endif
    </div>

    {{-- Recipients --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex items-center justify-between">
            <span class="text-sm font-medium text-gray-700">Recipients ({{ $emailJob->recipients->count() }})</span>
            <a href="{{ route('email-logs.index', ['job_id' => $emailJob->id]) }}"
               class="text-xs text-indigo-600 hover:underline">View logs</a>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delivery status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sent at</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($emailJob->recipients as $recipient)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 text-sm text-gray-900">{{ $recipient->email }}</td>
                        <td class="px-6 py-3 text-sm text-gray-600">{{ $recipient->name ?? '—' }}</td>
                        <td class="px-6 py-3">
                            @if($recipient->log)
                                <span @class([
                                    'inline-flex px-2 py-1 text-xs font-medium rounded-full',
                                    'bg-green-100 text-green-800'   => in_array($recipient->log->status, ['sent', 'delivered']),
                                    'bg-blue-100 text-blue-800'     => in_array($recipient->log->status, ['opened', 'clicked']),
                                    'bg-red-100 text-red-800'       => in_array($recipient->log->status, ['failed', 'bounced']),
                                ])>
                                    {{ ucfirst($recipient->log->status) }}
                                </span>
                            @else
                                <span class="text-xs text-gray-400">Pending</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-sm text-gray-500">
                            {{ $recipient->log?->sent_at?->format('d M Y, H:i') ?? '—' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-sm text-gray-400">No recipients found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection