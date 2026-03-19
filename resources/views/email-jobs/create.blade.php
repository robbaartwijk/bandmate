@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="mb-6">
        <a href="{{ route('email-jobs.index') }}" class="text-sm text-indigo-600 hover:underline">&larr; Back to jobs</a>
        <h1 class="text-2xl font-semibold text-gray-900 mt-2">New Email Job</h1>
    </div>

    <form action="{{ route('email-jobs.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Job settings --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 space-y-5">
            <h2 class="text-base font-medium text-gray-900">Job settings</h2>

            {{-- Template --}}
            <div>
                <label for="template_id" class="block text-sm font-medium text-gray-700 mb-1">Template</label>
                <select id="template_id" name="template_id"
                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('template_id') border-red-400 @enderror">
                    <option value="">— Select a template —</option>
                    @foreach($templates as $template)
                        <option value="{{ $template->id }}" @selected(old('template_id') == $template->id)>
                            {{ $template->name }} — {{ $template->subject }}
                        </option>
                    @endforeach
                </select>
                @error('template_id') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- Type --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                <div class="flex gap-6">
                    <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                        <input type="radio" name="type" value="single"
                               @checked(old('type', 'single') === 'single')
                               onchange="setType('single')" class="text-indigo-600">
                        Single
                    </label>
                    <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                        <input type="radio" name="type" value="bulk"
                               @checked(old('type') === 'bulk')
                               onchange="setType('bulk')" class="text-indigo-600">
                        Bulk
                    </label>
                </div>
                @error('type') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            {{-- From --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="from_address" class="block text-sm font-medium text-gray-700 mb-1">From address</label>
                    <input type="email" id="from_address" name="from_address" value="{{ old('from_address') }}"
                           class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('from_address') border-red-400 @enderror"
                           placeholder="no-reply@example.com">
                    @error('from_address') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="from_name" class="block text-sm font-medium text-gray-700 mb-1">From name <span class="text-gray-400 font-normal">(optional)</span></label>
                    <input type="text" id="from_name" name="from_name" value="{{ old('from_name') }}"
                           class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="My App">
                </div>
            </div>

            {{-- Scheduled at --}}
            <div>
                <label for="scheduled_at" class="block text-sm font-medium text-gray-700 mb-1">Schedule for <span class="text-gray-400 font-normal">(optional — leave blank to send immediately)</span></label>
                <input type="datetime-local" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at') }}"
                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('scheduled_at') border-red-400 @enderror">
                @error('scheduled_at') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Recipients --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-base font-medium text-gray-900">Recipients</h2>
                <button type="button" id="add-recipient"
                        class="text-sm text-indigo-600 hover:underline hidden">+ Add recipient</button>
            </div>

            @error('recipients') <p class="mb-3 text-xs text-red-600">{{ $message }}</p> @enderror

            <div id="recipients-list" class="space-y-3">
                {{-- Populated by JS --}}
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('email-jobs.index') }}" class="px-4 py-2 text-sm text-gray-600 hover:text-gray-900">Cancel</a>
            <button type="submit"
                    class="px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                Create job
            </button>
        </div>

    </form>
</div>

<script>
let recipientCount = 0;
let currentType = '{{ old('type', 'single') }}';

function recipientRow(index) {
    return `
    <div class="recipient-row grid grid-cols-2 gap-3 p-3 bg-gray-50 rounded-lg border border-gray-200 relative" id="row-${index}">
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Email</label>
            <input type="email" name="recipients[${index}][email]"
                   value="{{ old('recipients.${index}.email') }}"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   placeholder="recipient@example.com" required>
        </div>
        <div>
            <label class="block text-xs font-medium text-gray-600 mb-1">Name <span class="text-gray-400">(optional)</span></label>
            <input type="text" name="recipients[${index}][name]"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                   placeholder="Jan de Vries">
        </div>
        ${currentType === 'bulk' ? `
        <button type="button" onclick="removeRow(${index})"
                class="absolute top-2 right-2 text-gray-400 hover:text-red-500 text-xs">&times; Remove</button>` : ''}
    </div>`;
}

function addRecipient() {
    document.getElementById('recipients-list').insertAdjacentHTML('beforeend', recipientRow(recipientCount++));
}

function removeRow(index) {
    const row = document.getElementById('row-' + index);
    if (row) row.remove();
}

function setType(type) {
    currentType = type;
    const addBtn = document.getElementById('add-recipient');
    const list = document.getElementById('recipients-list');

    list.innerHTML = '';
    recipientCount = 0;
    addRecipient();

    addBtn.classList.toggle('hidden', type === 'single');
}

// Initialise
setType(currentType);

document.getElementById('add-recipient').addEventListener('click', addRecipient);
</script>
@endsection