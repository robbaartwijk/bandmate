@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')

<div class="col-container">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Add rehearsalroom</b></h3>
                </div>

                <div class="bm_row_layout row" style="height: 55vh;">
                    <div class="col-lg-6">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('rehearsalrooms.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="bm_general_input form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ old('name') }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('address') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="address" class="bm_label_layout">
                                            <h3>Address</h3>
                                        </label>
                                        <input type="text" name="address" class="bm_general_input form-control
                                            {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Address" value="{{ old('address') }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>


                                    <div class="bm_form_group form-group {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                        <label for="zip" class="bm_label_layout">
                                            <h3>Zip</h3>
                                        </label>
                                        <input type="text" name="zip" class="bm_general_input form-control
                                            {{ $errors->has('zip') ? 'is-invalid' : '' }}" placeholder="Zip" value="{{ old('zip') }}">
                                        @include('alerts.feedback', ['field' => 'zip'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('city') ? 'has-danger' : '' }}">
                                        <label for="city" class="bm_label_layout">
                                            <h3>City</h3>
                                        </label>
                                        <input type="text" name="city" class="bm_general_input form-control
                                            {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City" value="{{ old('city') }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('state') ? 'has-danger' : '' }}">
                                        <label for="state" class="bm_label_layout">
                                            <h3>State</h3>
                                        </label>
                                        <input type="text" name="state" class="bm_general_input form-control
                                            {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="State" value="{{ old('state') }}">
                                        @include('alerts.feedback', ['field' => 'state'])
                                    </div>

                            </div>

                        </div>
                    </div>


                    <div class="col-lg-6">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('rehearsalrooms.store') }}" method="post">
                                    @csrf

                                    <div class="bm_form_group form-group {{ $errors->has('country') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Country</h3>
                                        </label>
                                        <input type="text" name="country" class="bm_general_input form-control
                                            {{ $errors->has('country') ? 'is-invalid' : '' }}" placeholder="Country" value="{{ old('country') }}">
                                        @include('alerts.feedback', ['field' => 'country'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                        <label for="phone" class="bm_label_layout">
                                            <h3>Phone</h3>
                                        </label>
                                        <input type="text" name="phone" class="bm_general_input form-control
                                            {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ old('phone') }}">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                                        <label for="email" class="bm_label_layout">
                                            <h3>Email</h3>
                                        </label>
                                        <input type="text" name="email" class="bm_general_input form-control
                                            {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                                        <label for="website" class="bm_label_layout">
                                            <h3>Website</h3>
                                        </label>
                                        <input type="text" name="website" class="bm_general_input form-control
                                            {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ old('website') }}">
                                        @include('alerts.feedback', ['field' => 'website'])
                                    </div>

                                    <div>
                                        <label class="bm_label_layout" for="rehearsalroompic">
                                            <h3>Add picture</h3>
                                        </label>
                                        <input type="file" class="bm_upload_box bm_upload btn btn-info" id="rehearsalroompic" name="rehearsalroompic" accept="image/*" onchange="validateFileSize(this)" style="width: 360px; margin-top:15px; margin-right:10px; float: right;">
                                        @include('alerts.feedback', ['field' => 'rehearsalroompic'])
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row" style="height: 10vh;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title
                        
            <div class="card-body text-primary col-lg-12">
                <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                    <label for="description">
                        <h3>Description</h3>
                    </label>
                    <textarea id="description" name="description" class="bm_general_input form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description" style="height: 10px;">{{ old('description') }}</textarea>
                    @include('alerts.feedback', ['field' => 'description'])
                </div>
                <button type="submit" class="btn btn-info">Add</button>
                <a href="{{ route('rehearsalrooms.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>

    </div>
    </form>
</div>

<script>
    document.getElementById('rehearsalroompic').addEventListener('change', function() {
        const file = this.files[0];
        if (file.size > 1048576) { // 1MB in bytes
            alert('File size must be less than 1MB');
            this.value = '';
        }
    });
</script>

@endsection
