@extends('layouts.app', ['page' => __('Email Jobs'), 'pageSlug' => 'email-jobs'])

@section('content')
<div class="col-container">
    <div class="row">
        <div class="col-md-12">
            <div class="bm_card_height_large bm_card card">
                <div class="card-header">
                    <h3 class="card-title"><b>New email job</b></h3>
                </div>

                <form action="{{ route('email-jobs.store') }}" method="POST" id="job-form">
                @csrf

                <div class="bm_row_layout row">
                    <div class="col-lg-6">
                        <div class="card-body text-primary">
                            <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">

                                <div class="bm_form_group form-group {{ $errors->has('template_id') ? 'has-danger' : '' }}">
                                    <label for="template_id" class="bm_label_layout"><h3>Template</h3></label>
                                    <select id="template_id" name="template_id"
                                            class="bm_general_input form-control {{ $errors->has('template_id') ? 'is-invalid' : '' }}">
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
                                    <div style="margin-left: 10px;">
                                        <label style="margin-right: 20px;">
                                            <input type="radio" name="type" value="single"
                                                   @checked(old('type', 'single') === 'single')
                                                   onchange="setType('single')"> Single
                                        </label>
                                        <label>
                                            <input type="radio" name="type" value="bulk"
                                                   @checked(old('type') === 'bulk')
                                                   onchange="setType('bulk')"> Bulk
                                        </label>
                                    </div>
                                    @include('alerts.feedback', ['field' => 'type'])
                                </div>

                                <div class="bm_form_group form-group {{ $errors->has('from_address') ? 'has-danger' : '' }}">
                                    <label for="from_address" class="bm_label_layout"><h3>From address</h3></label>
                                    <input type="email" id="from_address" name="from_address" value="{{ old('from_address') }}"
                                           class="bm_general_input form-control {{ $errors->has('from_address') ? 'is-invalid' : '' }}"
                                           placeholder="no-reply@example.com">
                                    @include('alerts.feedback', ['field' => 'from_address'])
                                </div>

                                <div class="bm_form_group form-group">
                                    <label for="from_name" class="bm_label_layout"><h3>From name <small style="font-weight:normal;">(optional)</small></h3></label>
                                    <input type="text" id="from_name" name="from_name" value="{{ old('from_name') }}"
                                           class="bm_general_input form-control"
                                           placeholder="Bandmate">
                                </div>

                                <div class="bm_form_group form-group {{ $errors->has('scheduled_at') ? 'has-danger' : '' }}">
                                    <label for="scheduled_at" class="bm_label_layout"><h3>Schedule for <small style="font-weight:normal;">(optional)</small></h3></label>
                                    <input type="datetime-local" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at') }}"
                                           class="bm_general_input form-control {{ $errors->has('scheduled_at') ? 'is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'scheduled_at'])
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card-body text-primary">
                            <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">

                                <h3>Recipients
                                    <button type="button" id="add-recipient" class="btn btn-info btn-sm" style="margin-left:10px; display:none;">
                                        + Add recipient
                                    </button>
                                </h3>

                                @error('recipients')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div id="recipients-list" style="margin-top:10px;"></div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
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
let currentType = '{{ old('type', 'single') }}';

function recipientRow(index) {
    return `
    <div class="row" id="row-${index}" style="margin-bottom:10px;">
        <div class="col-lg-5">
            <input type="email" name="recipients[${index}][email]"
                   class="bm_general_input form-control"
                   placeholder="recipient@example.com" required>
        </div>
        <div class="col-lg-4">
            <input type="text" name="recipients[${index}][name]"
                   class="bm_general_input form-control"
                   placeholder="Name (optional)">
        </div>
        ${currentType === 'bulk' ? `
        <div class="col-lg-2">
            <button type="button" onclick="removeRow(${index})" class="btn btn-danger btn-sm">Remove</button>
        </div>` : ''}
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
    addBtn.style.display = type === 'bulk' ? 'inline-block' : 'none';
}

setType(currentType);
document.getElementById('add-recipient').addEventListener('click', addRecipient);
</script>
@endsection