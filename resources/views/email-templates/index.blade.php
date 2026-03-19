@extends('layouts.app')
 
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
 
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Email Templates</h1>
        @can('create', \App\Models\EmailTemplate::class)
            <a href="{{ route('email-templates.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                + New Template
            </a>
        @endcan
    </div>
 
    {{-- Flash message --}}
    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-800 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif
 
    {{-- Table --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($templates as $template)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $template->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $template->subject }}</td>
                        <td class="px-6 py-4">
                            <span @class([
                                'inline-flex px-2 py-1 text-xs font-medium rounded-full',
                                'bg-green-100 text-green-800'  => $template->status === 'active',
                                'bg-yellow-100 text-yellow-800' => $template->status === 'draft',
                                'bg-gray-100 text-gray-600'    => $template->status === 'inactive',
                            ])>
                                {{ ucfirst($template->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $template->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4 text-right space-x-3 text-sm">
                            <a href="{{ route('email-templates.show', $template) }}" class="text-indigo-600 hover:underline">View</a>
                            @can('update', $template)
                                <a href="{{ route('email-templates.edit', $template) }}" class="text-indigo-600 hover:underline">Edit</a>
                            @endcan
                            @can('delete', $template)
                                <form action="{{ route('email-templates.destroy', $template) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Delete this template?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-400">
                            No templates found. <a href="{{ route('email-templates.create') }}" class="text-indigo-600 hover:underline">Create one</a>.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
 
    {{-- Pagination --}}
    <div class="mt-4">
        {{ $templates->links() }}
    </div>
 
</div>
@endsection
 