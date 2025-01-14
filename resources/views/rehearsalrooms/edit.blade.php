@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')

<div class="col-container">

    <div class="row">
        <div class="col-md-12">
            <div class="bm_card bm_card_height_large card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit rehearsal room</h3>
                </div>

                <div class="bm_row_layout row" style="height: 100vh;">
                    <div class="col-lg-5">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('rehearsalrooms.update', $rehearsalroom->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="bm_general_input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ $rehearsalroom->name }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
                                        <label for="address" class="bm_label_layout">
                                            <h3>Address</h3>
                                        </label>
                                        <input type="text" name="address" class="bm_general_input form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Address" value="{{ $rehearsalroom->address }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                        <label for="zip" class="bm_label_layout">
                                            <h3>Zip</h3>
                                        </label>
                                        <input type="text" name="zip" class="bm_general_input form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" placeholder="Zip" value="{{ $rehearsalroom->zip }}">
                                        @include('alerts.feedback', ['field' => 'zip'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('city') ? 'has-danger' : '' }}">
                                        <label for="city" class="bm_label_layout">
                                            <h3>City</h3>
                                        </label>
                                        <input type="text" name="city" class="bm_general_input form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City" value="{{ $rehearsalroom->city }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('state') ? 'has-danger' : '' }}">
                                        <label for="state" class="bm_label_layout">
                                            <h3>State</h3>
                                        </label>
                                        <input type="text" name="state" class="bm_general_input form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="State" value="{{ $rehearsalroom->state }}">
                                        @include('alerts.feedback', ['field' => 'state'])
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="bm_form_group form-group {{ $errors->has('country') ? 'has-danger' : '' }}">
                            <label for="country" class="bm_label_layout">
                                <h3>Country</h3>
                            </label>
                            <input type="text" name="country" class="bm_general_input form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" placeholder="Country" value="{{ $rehearsalroom->country }}">
                            @include('alerts.feedback', ['field' => 'country'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone" class="bm_label_layout">
                                <h3>Phone</h3>
                            </label>
                            <input type="text" name="phone" class="bm_general_input form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ $rehearsalroom->phone }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email" class="bm_label_layout">
                                <h3>Email</h3>
                            </label>
                            <input type="text" name="email" class="bm_general_input form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ $rehearsalroom->email }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                            <label for="website" class="bm_label_layout">
                                <h3>Website</h3>
                            </label>
                            <input type="text" name="website" class="bm_general_input form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ $rehearsalroom->website }}">
                            @include('alerts.feedback', ['field' => 'website'])
                        </div>

                        <div style="height:80px;" class="bm_upload_box">
                            <label class="bm_upload_label" for="rehearsalroompic">
                                <h3>Add picture</h3>
                            </label>
                            <input type="file" class="bm_upload btn btn-info" id="rehearsalroompic" name="rehearsalroompic" accept="image/*" onchange="validateFileSize(this)" style="width: 360px; margin-top:15px; margin-right:10px; float: right;">
                            @include('alerts.feedback', ['field' => 'rehearsalroompic'])
                        </div>

                    </div>

                    <div class="col-lg-12">
                        <div class="card-body text-primary">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="card-body text-primary">

                                            <div class="table-responsive">

                                                <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                                                    <label for="description" class="bm_label_layout">
                                                        <h3>Description</h3>
                                                    </label>
                                                    <textarea id="description" name="description" class="bm_textarea_layout form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description">{{ $rehearsalroom->description }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'description'])

                                                    <button type="submit" class="btn btn-info">Update</button>
                                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>


    <script>
        function validateFileSize(input) {
            const file = input.files[0];
            if (file && file.size > 1048576) {
                alert('File size must be less than 1MB');
                input.value = '';
            }
        }

    </script>

    @endsection
