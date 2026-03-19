@extends('layouts.app')
 
@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
 
    <div class="mb-6">
        <a href="{{ route('email-templates.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to templates</a>
        <h1 class="text-2xl font-semibold text-gray-900 mt-2">New Template</h1>
    </div>
 
    <form action="{{ route('email-templates.store') }}" method="POST" class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-6">
        @csrf
 
        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Internal name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-400 @enderror"
                   placeholder="e.g. welcome_email">
            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
 
        {{-- Subject --}}
        <div>
            <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject line</label>
            <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('subject') border-red-400 @enderror"
                   placeholder="e.g. Welcome to our platform, {{first_name}}!">
            @error('subject') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
 
        {{-- Status --}}
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select id="status" name="status"
                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('status') border-red-400 @enderror">
                @foreach(['draft', 'active', 'inactive'] as $s)
                    <option value="{{ $s }}" @selected(old('status', 'draft') === $s)>{{ ucfirst($s) }}</option>
                @endforeach
            </select>
            @error('status') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
 
        {{-- HTML Body --}}
        <div>
            <label for="body_html" class="block text-sm font-medium text-gray-700 mb-1">HTML body</label>
            <p class="text-xs text-gray-500 mb-2">Use <code class="bg-gray-100 px-1 rounded">&#123;&#123;variable_name&#125;&#125;</code> for per-recipient merge tags.</p>
            <textarea id="body_html" name="body_html" rows="10"
                      class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('body_html') border-red-400 @enderror">{{ old('body_html') }}</textarea>
            @error('body_html') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
 
        {{-- Plain text body --}}
        <div>
            <label for="body_text" class="block text-sm font-medium text-gray-700 mb-1">Plain text body <span class="text-gray-400 font-normal">(optional)</span></label>
            <textarea id="body_text" name="body_text" rows="5"
                      class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm font-mono focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('body_text') }}</textarea>
        </div>
 
        {{-- Actions --}}
        <div class="flex items-center justify-end gap-3 pt-2">
            <a href="{{ route('email-templates.index') }}"
               class="px-4 py-2 text-sm text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                Save template
            </button>
        </div>
 
    </form>
</div>
@endsection
 