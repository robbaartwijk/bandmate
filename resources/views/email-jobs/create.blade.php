@extends('layouts.app', ['page' => __('Email Jobs'), 'pageSlug' => 'email-jobs'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header"><h2 class="bm-card-title">New email job</h2></div>
    <div class="bm-card-body">
        <form action="{{ route('email-jobs.store') }}" method="POST" id="job-form">
            @csrf
            <input type="hidden" id="initial-type" value="{{ old('type', 'single') }}">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Job settings --}}
                <div class="space-y-4">
                    <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10">Job settings</h3>

                    <div class="bm-form-group">
                        <label class="bm-label">Template</label>
                        <select name="template_id" class="bm-select @error('template_id') border-red-500 @enderror">
                            <option value="">— Select a template —</option>
                            @foreach($templates as $template)
                            <option value="{{ $template->id }}" @selected(old('template_id') == $template->id)>
                                {{ $template->name }} — {{ $template->subject }}
                            </option>
                            @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'template_id'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Type</label>
                        <div class="flex items-center gap-6">
                            <label class="flex items-center gap-2 text-sm text-white/70 cursor-pointer">
                                <input type="radio" name="type" value="single" class="text-indigo-500"
                                       @checked(old('type', 'single') === 'single') onchange="setType('single')"> Single
                            </label>
                            <label class="flex items-center gap-2 text-sm text-white/70 cursor-pointer">
                                <input type="radio" name="type" value="bulk" class="text-indigo-500"
                                       @checked(old('type') === 'bulk') onchange="setType('bulk')"> Bulk
                            </label>
                        </div>
                        @include('alerts.feedback', ['field' => 'type'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">From address</label>
                        <input type="email" name="from_address" class="bm-input @error('from_address') border-red-500 @enderror"
                               placeholder="no-reply@example.com" value="{{ old('from_address') }}">
                        @include('alerts.feedback', ['field' => 'from_address'])
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">From name <span class="text-white/30">(optional)</span></label>
                        <input type="text" name="from_name" class="bm-input"
                               placeholder="Bandmate" value="{{ old('from_name') }}">
                    </div>

                    <div class="bm-form-group">
                        <label class="bm-label">Schedule for <span class="text-white/30">(optional — leave blank to send immediately)</span></label>
                        <input type="datetime-local" name="scheduled_at"
                               class="bm-input @error('scheduled_at') border-red-500 @enderror"
                               value="{{ old('scheduled_at') }}">
                        @include('alerts.feedback', ['field' => 'scheduled_at'])
                    </div>
                </div>

                {{-- Recipients --}}
                <div class="space-y-4">
                    <div class="flex items-center justify-between pb-2 border-b border-white/10">
                        <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider">Recipients</h3>
                        <button type="button" id="add-recipient"
                                class="bm-btn bm-btn-secondary bm-btn-sm hidden">
                            <i class="fas fa-plus"></i> Add recipient
                        </button>
                    </div>

                    <div class="flex flex-wrap items-center gap-2">
                        <select id="subscription-type" class="bm-select text-sm py-1.5 flex-1" style="min-width:180px;">
                            <option value="">— Load from subscription list —</option>
                            <option value="all">All subscribers</option>
                            <option value="acts">Acts notification</option>
                            <option value="vacancies">Vacancies notification</option>
                            <option value="availablemusicians">Available musicians notification</option>
                            <option value="rehearsalrooms">Rehearsal rooms notification</option>
                            <option value="venues">Venues notification</option>
                            <option value="agencies">Agencies notification</option>
                            <option value="newsletter">Newsletter</option>
                        </select>
                        <button type="button" id="load-subscribers" class="bm-btn bm-btn-info bm-btn-sm">Load</button>
                    </div>
                    <p id="subscriber-feedback" class="text-xs text-white/40"></p>

                    @error('recipients')
                    <div class="bm-alert bm-alert-error">{{ $message }}</div>
                    @enderror

                    <div id="recipients-list" class="space-y-2"></div>
                </div>

            </div>

            <div class="flex items-center gap-3 mt-6 pt-4 border-t border-white/10">
                <button type="submit" class="bm-btn bm-btn-primary"><i class="fas fa-paper-plane"></i> Create job</button>
                <a href="{{ route('email-jobs.index') }}" class="bm-btn bm-btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
let recipientCount = 0;
let currentType = document.getElementById('initial-type').value;

function recipientRow(index, email, name) {
    email = email || ''; name = name || '';
    return `<div class="flex flex-wrap gap-2 items-center" id="row-${index}">
        <input type="email" name="recipients[${index}][email]" class="bm-input flex-1 text-sm py-1.5" style="min-width:180px;" placeholder="recipient@example.com" value="${email}" required>
        <input type="text"  name="recipients[${index}][name]"  class="bm-input text-sm py-1.5" style="width:140px;" placeholder="Name (optional)" value="${name}">
        ${currentType === 'bulk' ? `<button type="button" onclick="removeRow(${index})" class="bm-btn bm-btn-danger bm-btn-sm"><i class="fas fa-times"></i></button>` : ''}
    </div>`;
}

function addRecipient(email, name) {
    document.getElementById('recipients-list').insertAdjacentHTML('beforeend', recipientRow(recipientCount++, email, name));
}

function removeRow(index) {
    const row = document.getElementById('row-' + index);
    if (row) row.remove();
}

function setType(type) {
    currentType = type;
    document.getElementById('recipients-list').innerHTML = '';
    recipientCount = 0;
    addRecipient();
    document.getElementById('add-recipient').classList.toggle('hidden', type !== 'bulk');
}

setType(currentType);
document.getElementById('add-recipient').addEventListener('click', () => addRecipient());

document.getElementById('load-subscribers').addEventListener('click', function() {
    const type = document.getElementById('subscription-type').value;
    const feedback = document.getElementById('subscriber-feedback');
    if (!type) { feedback.textContent = 'Please select a subscription type first.'; feedback.className = 'text-xs text-red-400'; return; }

    document.querySelector('input[name="type"][value="bulk"]').checked = true;
    setType('bulk');
    feedback.textContent = 'Loading...'; feedback.className = 'text-xs text-white/40';

    fetch('{{ url("email-jobs-subscribers") }}/' + type, { headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' } })
        .then(r => r.json())
        .then(users => {
            if (users.error) { feedback.textContent = users.error; feedback.className = 'text-xs text-red-400'; return; }
            document.getElementById('recipients-list').innerHTML = '';
            recipientCount = 0;
            if (users.length === 0) { feedback.textContent = 'No subscribers found.'; feedback.className = 'text-xs text-amber-400'; addRecipient(); return; }
            users.forEach(u => addRecipient(u.email, u.name || ''));
            feedback.textContent = users.length + ' subscriber' + (users.length !== 1 ? 's' : '') + ' loaded.';
            feedback.className = 'text-xs text-emerald-400';
        })
        .catch(() => { feedback.textContent = 'Failed to load subscribers.'; feedback.className = 'text-xs text-red-400'; });
});
</script>
@endpush
@endsection