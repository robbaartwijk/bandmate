@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')

<div class="col-container">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Add agency</b></h3>
                </div>

                <div class="bm_row_layout row" style="height: 55vh;">
                    <div class="col-lg-4">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('agencies.store') }}" method="post">
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


                    <div class="col-lg-4">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('agencies.store') }}" method="post">
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

                                    <div class="bm_form_group form-group {{ $errors->has('facebook') ? 'has-danger' : '' }}">
                                        <label for="facebook" class="bm_label_layout">
                                            <h3>Facebook</h3>
                                        </label>
                                        <input type="text" name="facebook" class="bm_general_input form-control
                                            {{ $errors->has('facebook') ? 'is-invalid' : '' }}" placeholder="Facebook" value="{{ old('facebook') }}">
                                        @include('alerts.feedback', ['field' => 'facebook'])
                                    </div>

                            </div>

                        </div>
                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="table-responsive">

                            <div class="bm_form_group form-group {{ $errors->has('youtube') ? 'has-danger' : '' }}">
                                <label for="youtube" class="bm_label_layout">
                                    <h3>Youtube</h3>
                                </label>
                                <input type="text" name="youtube" class="bm_general_input form-control
                                            {{ $errors->has('youtube') ? 'is-invalid' : '' }}" placeholder="Youtube" value="{{ old('youtube') }}">
                                @include('alerts.feedback', ['field' => 'youtube'])
                            </div>

                            <div class="bm_form_group form-group {{ $errors->has('twitter') ? 'has-danger' : '' }}">
                                <label for="twitter" class="bm_label_layout">
                                    <h3>Twitter</h3>
                                </label>
                                <input type="text" name="twitter" class="bm_general_input form-control
                                            {{ $errors->has('twitter') ? 'is-invalid' : '' }}" placeholder="Twitter" value="{{ old('twitter') }}">
                                @include('alerts.feedback', ['field' => 'twitter'])
                            </div>

                            <div class="bm_form_group form-group {{ $errors->has('instagram') ? 'has-danger' : '' }}">
                                <label for="instagram" class="bm_label_layout">
                                    <h3>Instagram</h3>
                                </label>
                                <input type="text" name="instagram" class="bm_general_input form-control
                                            {{ $errors->has('instagram') ? 'is-invalid' : '' }}" placeholder="Instagram" value="{{ old('instagram') }}">
                                @include('alerts.feedback', ['field' => 'instagram'])
                            </div>

                            <div class="bm_form_group form-group {{ $errors->has('soundcloud') ? 'has-danger' : '' }}">
                                <label for="soundcloud" class="bm_label_layout">
                                    <h3>Soundcloud</h3>
                                </label>
                                <input type="text" name="soundcloud" class="bm_general_input form-control
                                            {{ $errors->has('soundcloud') ? 'is-invalid' : '' }}" placeholder="Soundcloud" value="{{ old('soundcloud') }}">
                                @include('alerts.feedback', ['field' => 'soundcloud'])
                            </div>

                            <div class="bm_form_group form-group {{ $errors->has('spotify') ? 'has-danger' : '' }}">
                                <label for="spotify" class="bm_label_layout">
                                    <h3>Spotify</h3>
                                </label>
                                <input type="text" name="spotify" class="bm_general_input form-control
                                            {{ $errors->has('spotify') ? 'is-invalid' : '' }}" placeholder="Spotify" value="{{ old('spotify') }}">
                                @include('alerts.feedback', ['field' => 'spotify'])
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
                        
            <div class=" card-body text-primary col-lg-12">
                        <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                            <label for="description">
                                <h3>Description</h3>
                            </label>
                            <textarea id="description" name="description" class="bm_general_input form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description" style="height: 10px;">{{ old('description') }}</textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>
                        <button type="submit" class="btn btn-info">Add</button>
                        <a href="{{ route('agencies.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>

        </div>
        </form>
    </div>

    @endsection
