@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="mb-6 flex items-center justify-between">
        <div>
            <a href="{{ route('email-templates.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to templates</a>
            <h1 class="text-2xl font-semibold text-gray-900 mt-2">{{ $emailTemplate->name }}</h1>
        </div>
        <div class="flex gap-3">
            @can('update', $emailTemplate)
                <a href="{{ route('email-templates.edit', $emailTemplate) }}"
                   class="px-4 py-2 text-sm border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">Edit</a>
            @endcan
            @can('delete', $emailTemplate)
                <form action="{{ route('email-templates.destroy', $emailTemplate) }}" method="POST"
                      onsubmit="return confirm('Delete this template?')">
                    @csrf @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 text-sm border border-red-300 rounded-lg text-red-600 hover:bg-red-50 transition">Delete</button>
                </form>
            @endcan
        </div>
    </div>

    {{-- Meta --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6 grid grid-cols-2 gap-4 text-sm">
        <div>
            <p class="text-gray-500 mb-1">Subject</p>
            <p class="font-medium text-gray-900">{{ $emailTemplate->subject }}</p>
        </div>
        <div>
            <p class="text-gray-500 mb-1">Status</p>
            <span @class([
                'inline-flex px-2 py-1 text-xs font-medium rounded-full',
                'bg-green-100 text-green-800'   => $emailTemplate->status === 'active',
                'bg-yellow-100 text-yellow-800' => $emailTemplate->status === 'draft',
                'bg-gray-100 text-gray-600'     => $emailTemplate->status === 'inactive',
            ])>
                {{ ucfirst($emailTemplate->status) }}
            </span>
        </div>
        <div>
            <p class="text-gray-500 mb-1">Created</p>
            <p class="text-gray-900">{{ $emailTemplate->created_at->format('d M Y, H:i') }}</p>
        </div>
        <div>
            <p class="text-gray-500 mb-1">Last updated</p>
            <p class="text-gray-900">{{ $emailTemplate->updated_at->format('d M Y, H:i') }}</p>
        </div>
    </div>

    {{-- HTML Body preview --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
        <div class="flex items-center justify-between px-6 py-3 border-b border-gray-200 bg-gray-50">
            <span class="text-sm font-medium text-gray-700">HTML body</span>
            <button onclick="document.getElementById('html-preview').classList.toggle('hidden');document.getElementById('html-source').classList.toggle('hidden')"
                    class="text-xs text-indigo-600 hover:underline">Toggle source / preview</button>
        </div>
        <div id="html-preview" class="p-6">
            <iframe srcdoc="{{ $emailTemplate->body_html }}" class="w-full min-h-64 border-0" sandbox="allow-same-origin"></iframe>
        </div>
        <div id="html-source" class="hidden p-6">
            <pre class="text-xs text-gray-700 font-mono whitespace-pre-wrap">{{ $emailTemplate->body_html }}</pre>
        </div>
    </div>

    {{-- Plain text body --}}
    @if($emailTemplate->body_text)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="px-6 py-3 border-b border-gray-200 bg-gray-50">
                <span class="text-sm font-medium text-gray-700">Plain text body</span>
            </div>
            <div class="p-6">
                <pre class="text-sm text-gray-700 font-mono whitespace-pre-wrap">{{ $emailTemplate->body_text }}</pre>
            </div>
        </div>
    @endif

</div>
@endsection