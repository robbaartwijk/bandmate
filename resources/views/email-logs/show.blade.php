@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="mb-6">
        <a href="{{ route('email-logs.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to logs</a>
        <h1 class="text-2xl font-semibold text-gray-900 mt-2">Log Entry #{{ $emailLog->id }}</h1>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-4 text-sm">

        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-gray-500 mb-1">Recipient</p>
                <p class="font-medium text-gray-900">{{ $emailLog->recipient->email }}</p>
                @if($emailLog->recipient->name)
                    <p class="text-gray-500 text-xs">{{ $emailLog->recipient->name }}</p>
                @endif
            </div>
            <div>
                <p class="text-gray-500 mb-1">Job</p>
                <a href="{{ route('email-jobs.show', $emailLog->recipient->job_id) }}" class="text-indigo-600 hover:underline font-medium">
                    Job #{{ $emailLog->recipient->job_id }}
                </a>
                <p class="text-gray-500 text-xs">{{ $emailLog->recipient->job->template->name ?? '—' }}</p>
            </div>
            <div>
                <p class="text-gray-500 mb-1">Status</p>
                <span @class([
                    'inline-flex px-2 py-1 text-xs font-medium rounded-full',
                    'bg-green-100 text-green-800'   => in_array($emailLog->status, ['sent', 'delivered']),
                    'bg-blue-100 text-blue-800'     => in_array($emailLog->status, ['opened', 'clicked']),
                    'bg-red-100 text-red-800'       => in_array($emailLog->status, ['failed', 'bounced']),
                ])>
                    {{ ucfirst($emailLog->status) }}
                </span>
            </div>
            <div>
                <p class="text-gray-500 mb-1">Message ID</p>
                <p class="font-mono text-xs text-gray-700 break-all">{{ $emailLog->message_id ?? '—' }}</p>
            </div>
            <div>
                <p class="text-gray-500 mb-1">Sent at</p>
                <p class="text-gray-900">{{ $emailLog->sent_at ? $emailLog->sent_at->format('d M Y, H:i:s') : '—' }}</p>
            </div>
            <div>
                <p class="text-gray-500 mb-1">Failed at</p>
                <p class="text-gray-900">{{ $emailLog->failed_at ? $emailLog->failed_at->format('d M Y, H:i:s') : '—' }}</p>
            </div>
        </div>

        @if($emailLog->error_message)
            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <p class="text-xs font-medium text-red-700 mb-1">Error message</p>
                <p class="text-xs text-red-600 font-mono">{{ $emailLog->error_message }}</p>
            </div>
        @endif

        @if($emailLog->recipient->variables)
            <div class="mt-4">
                <p class="text-gray-500 mb-2">Merge variables used</p>
                <pre class="text-xs bg-gray-50 border border-gray-200 rounded-lg p-4 font-mono text-gray-700 overflow-x-auto">{{ json_encode($emailLog->recipient->variables, JSON_PRETTY_PRINT) }}</pre>
            </div>
        @endif

    </div>

    @can('delete', $emailLog)
        <div class="mt-4 flex justify-end">
            <form action="{{ route('email-logs.destroy', $emailLog) }}" method="POST"
                  onsubmit="return confirm('Delete this log entry?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 text-sm border border-red-300 rounded-lg text-red-600 hover:bg-red-50 transition">
                    Delete log entry
                </button>
            </form>
        </div>
    @endcan

</div>
@endsection