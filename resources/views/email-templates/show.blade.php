@extends('layouts.app', ['page' => __('Email Templates'), 'pageSlug' => 'email-templates'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"><b>{{ $emailTemplate->name }}</b></h3>
                @can('update', $emailTemplate)
                    <a href="{{ route('email-templates.edit', $emailTemplate) }}" class="btn btn-warning">Edit</a>
                @endcan
                @can('delete', $emailTemplate)
                    <form action="{{ route('email-templates.destroy', $emailTemplate) }}" method="POST" style="display:inline"
                          onsubmit="return confirm('Delete this template?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endcan
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body text-primary">
                        <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">
                            <h4><b>Subject: </b>{{ $emailTemplate->subject }}</h4>
                            <h4><b>Status: </b>{{ ucfirst($emailTemplate->status) }}</h4>
                            <h4><b>Created: </b>{{ $emailTemplate->created_at->format('d M Y, H:i') }}</h4>
                            <h4><b>Last updated: </b>{{ $emailTemplate->updated_at->format('d M Y, H:i') }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                        <h4><b>HTML body</b>
                            <button type="button" class="btn btn-info btn-sm" style="margin-left:10px;"
                                onclick="document.getElementById('html-preview').classList.toggle('hidden');document.getElementById('html-source').classList.toggle('hidden')">
                                Toggle source / preview
                            </button>
                        </h4>
                        <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">
                            <div id="html-preview">
                                <iframe srcdoc="{{ $emailTemplate->body_html }}" style="width:100%; min-height:300px; border:none;" sandbox="allow-same-origin"></iframe>
                            </div>
                            <div id="html-source" class="hidden">
                                <pre style="color:#ccc; background:#1e1e2e; padding:12px; border-radius:6px; font-size:12px; overflow-x:auto; white-space:pre-wrap;">{{ $emailTemplate->body_html }}</pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($emailTemplate->body_text)
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                        <h4><b>Plain text body</b></h4>
                        <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">
                            <pre style="color:#ccc; background:#1e1e2e; padding:12px; border-radius:6px; font-size:12px; white-space:pre-wrap;">{{ $emailTemplate->body_text }}</pre>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <a href="{{ route('email-templates.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection