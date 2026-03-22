@extends('layouts.app', ['page' => __('Email Jobs'), 'pageSlug' => 'email-jobs'])

@section('content')
<div class="col-container">
    <div class="row">
        <div class="col-md-12">
            <div class="bm_card card">
                <div class="card-header">
                    <h3 class="card-title"><b>New email job</b></h3>
                </div>

                <form action="{{ route('email-jobs.store') }}" method="POST" id="job-form">
                    @csrf

                    <input type="hidden" id="initial-type" value="{{ old('type', 'single') }}">

                    <div class="bm_row_layout row">

                        {{-- Column 1: Job settings --}}
                        <div class="col-12 col-lg-6">
                            <div class="card-body text-primary">
                                <div style="border:1px solid rgb(200,130,130); padding:10px; margin-bottom:10px;">

                                    <div class="bm_form_group form-group {{ $errors->has('template_id') ? 'has-danger' : '' }}">
                                        <label for="template_id" class="bm_label_layout"><h3>Template</h3></label>
                                        <select id="template_id" name="template_id"
                                                class="bm_general_input form-control {{ $errors->has('template_id') ? 'is-invalid' : '' }}"
                                                style="width:100%;">
                                            <option value="">— Select a template —</option>
                                            @foreach($templates as $template)
                                            <option value="{{ $template->id }}" @selected(old('template_id') == $template->id)>
                                                {{ $template->name }} — {{ $template->subject }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'template_id'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('type') ? 'has-danger' : '' }}">
                                        <label class="bm_label_layout"><h3>Type</h3></label>
                                        <div style="margin-left:10px;">
                                            <label style="margin-right:20px;">
                                                <input type="radio" name="type" value="single" @checked(old('type', 'single') === 'single') onchange="setType('single')"> Single
                                            </label>
                                            <label>
                                                <input type="radio" name="type" value="bulk" @checked(old('type') === 'bulk') onchange="setType('bulk')"> Bulk
                                            </label>
                                        </div>
                                        @include('alerts.feedback', ['field' => 'type'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('from_address') ? 'has-danger' : '' }}">
                                        <label for="from_address" class="bm_label_layout"><h3>From address</h3></label>
                                        <input type="email" id="from_address" name="from_address" value="{{ old('from_address') }}"
                                               class="bm_general_input form-control {{ $errors->has('from_address') ? 'is-invalid' : '' }}"
                                               placeholder="no-reply@example.com" style="width:100%;">
                                        @include('alerts.feedback', ['field' => 'from_address'])
                                    </div>

                                    <div class="bm_form_group form-group">
                                        <label for="from_name" class="bm_label_layout">
                                            <h3>From name <small style="font-weight:normal;">(optional)</small></h3>
                                        </label>
                                        <input type="text" id="from_name" name="from_name" value="{{ old('from_name') }}"
                                               class="bm_general_input form-control" placeholder="Bandmate" style="width:100%;">
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('scheduled_at') ? 'has-danger' : '' }}">
                                        <label for="scheduled_at" class="bm_label_layout">
                                            <h3>Schedule for <small style="font-weight:normal;">(optional)</small></h3>
                                        </label>
                                        <input type="datetime-local" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at') }}"
                                               class="bm_general_input form-control {{ $errors->has('scheduled_at') ? 'is-invalid' : '' }}"
                                               style="width:100%;">
                                        @include('alerts.feedback', ['field' => 'scheduled_at'])
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Column 2: Recipients --}}
                        <div class="col-12 col-lg-6">
                            <div class="card-body text-primary">
                                <div style="border:1px solid rgb(200,130,130); padding:10px; margin-bottom:10px;">

                                    <h3>Recipients
                                        <button type="button" id="add-recipient" class="btn btn-info btn-sm" style="margin-left:10px; display:none;">
                                            + Add recipient
                                        </button>
                                    </h3>

                                    <div style="margin-top:10px; margin-bottom:10px;">
                                        <label for="subscription-type" style="font-size:0.85rem; color:#aaa;">Load from subscription list:</label>
                                        <div style="display:flex; flex-wrap:wrap; gap:8px; align-items:center; margin-top:4px;">
                                            <select id="subscription-type" class="bm_general_input form-control" style="width:auto; flex:1; min-width:180px;">
                                                <option value="">— Select type —</option>
                                                <option value="all">All</option>
                                                <option value="acts">Acts notification</option>
                                                <option value="vacancies">Vacancies notification</option>
                                                <option value="availablemusicians">Available musicians notification</option>
                                                <option value="rehearsalrooms">Rehearsal rooms notification</option>
                                                <option value="venues">Venues notification</option>
                                                <option value="agencies">Agencies notification</option>
                                                <option value="newsletter">Newsletter notification</option>
                                            </select>
                                            <button type="button" id="load-subscribers" class="btn btn-warning btn-sm">Load</button>
                                        </div>
                                        <div id="subscriber-feedback" style="font-size:0.85rem; margin-top:4px;"></div>
                                    </div>

                                    @error('recipients')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                    <div id="recipients-list" style="margin-top:10px;"></div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card-body text-primary">
                                <button type="submit" class="btn btn-info">Create job</button>
                                <a href="{{ route('email-jobs.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
let recipientCount = 0;
let currentType = document.getElementById('initial-type').value;

function recipientRow(index, email, name) {
    email = email || '';
    name  = name  || '';
    return '<div class="row" id="row-' + index + '" style="margin-bottom:10px; flex-wrap:wrap; gap:4px;">'
        + '<div class="col-12 col-sm-5">'
        + '<input type="email" name="recipients[' + index + '][email]" class="form-control" placeholder="recipient@example.com" value="' + email + '" required style="width:100%;">'
        + '</div>'
        + '<div class="col-12 col-sm-4">'
        + '<input type="text" name="recipients[' + index + '][name]" class="form-control" placeholder="Name (optional)" value="' + name + '" style="width:100%;">'
        + '</div>'
        + (currentType === 'bulk' ? '<div class="col-12 col-sm-2"><button type="button" onclick="removeRow(' + index + ')" class="btn btn-danger btn-sm">Remove</button></div>' : '')
        + '</div>';
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
    const addBtn = document.getElementById('add-recipient');
    const list   = document.getElementById('recipients-list');
    list.innerHTML = '';
    recipientCount = 0;
    addRecipient();
    addBtn.style.display = type === 'bulk' ? 'inline-block' : 'none';
}

setType(currentType);
document.getElementById('add-recipient').addEventListener('click', function() { addRecipient(); });

document.getElementById('load-subscribers').addEventListener('click', function() {
    const type     = document.getElementById('subscription-type').value;
    const feedback = document.getElementById('subscriber-feedback');

    if (!type) {
        feedback.style.color = '#e74c3c';
        feedback.textContent = 'Please select a subscription type first.';
        return;
    }

    document.querySelector('input[name="type"][value="bulk"]').checked = true;
    setType('bulk');

    feedback.style.color = '#aaa';
    feedback.textContent = 'Loading...';

    fetch('{{ url("email-jobs-subscribers") }}/' + type, {
        headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(function(r) { return r.json(); })
    .then(function(users) {
        if (users.error) {
            feedback.style.color = '#e74c3c';
            feedback.textContent = users.error;
            return;
        }

        document.getElementById('recipients-list').innerHTML = '';
        recipientCount = 0;

        if (users.length === 0) {
            feedback.style.color = '#e67e22';
            feedback.textContent = 'No subscribers found for this type.';
            addRecipient();
            return;
        }

        users.forEach(function(u) { addRecipient(u.email, u.name || ''); });

        feedback.style.color = '#2ecc71';
        feedback.textContent = users.length + ' subscriber' + (users.length !== 1 ? 's' : '') + ' loaded.';
    })
    .catch(function() {
        feedback.style.color = '#e74c3c';
        feedback.textContent = 'Failed to load subscribers. Please try again.';
    });
});
</script>
@endsection