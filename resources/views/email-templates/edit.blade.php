@extends('layouts.app', ['page' => __('Email Templates'), 'pageSlug' => 'email-templates'])

@section('content')
<div class="col-container">
    <div class="row">
        <div class="col-md-12">
            <div class="bm_card_height_large bm_card card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit email template</b></h3>
                </div>

                <form action="{{ route('email-templates.update', $emailTemplate) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bm_row_layout row">
                    <div class="col-lg-6">
                        <div class="card-body text-primary">
                            <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">

                                <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                    <label for="name" class="bm_label_layout"><h3>Internal name</h3></label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $emailTemplate->name) }}"
                                           class="bm_general_input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>

                                <div class="bm_form_group form-group {{ $errors->has('subject') ? 'has-danger' : '' }}">
                                    <label for="subject" class="bm_label_layout"><h3>Subject line</h3></label>
                                    <input type="text" id="subject" name="subject" value="{{ old('subject', $emailTemplate->subject) }}"
                                           class="bm_general_input form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}">
                                    @include('alerts.feedback', ['field' => 'subject'])
                                </div>

                                <div class="bm_form_group form-group {{ $errors->has('status') ? 'has-danger' : '' }}">
                                    <label for="status" class="bm_label_layout"><h3>Status</h3></label>
                                    <select id="status" name="status"
                                            class="bm_general_input form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                        @foreach(['draft', 'active', 'inactive'] as $s)
                                            <option value="{{ $s }}" @selected(old('status', $emailTemplate->status) === $s)>{{ ucfirst($s) }}</option>
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'status'])
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card-body text-primary">
                            <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">

                                <div class="bm_form_group form-group {{ $errors->has('body_html') ? 'has-danger' : '' }}">
                                    <label for="body_html" class="bm_label_layout"><h3>HTML body</h3></label>
                                    <textarea id="body_html" name="body_html" rows="12"
                                              class="bm_textarea_layout form-control {{ $errors->has('body_html') ? 'is-invalid' : '' }}"
                                              style="border: 1px solid rgb(200, 130, 130);">{{ old('body_html', $emailTemplate->body_html) }}</textarea>
                                    @include('alerts.feedback', ['field' => 'body_html'])
                                </div>

                                <div class="bm_form_group form-group">
                                    <label for="body_text" class="bm_label_layout">
                                        <h3>Plain text body <small style="font-weight:normal;">(optional)</small></h3>
                                    </label>
                                    <textarea id="body_text" name="body_text" rows="6"
                                              class="bm_textarea_layout form-control"
                                              style="border: 1px solid rgb(200, 130, 130);">{{ old('body_text', $emailTemplate->body_text) }}</textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body text-primary">
                            <button type="submit" class="btn btn-info">Save changes</button>
                            <a href="{{ route('email-templates.show', $emailTemplate) }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection