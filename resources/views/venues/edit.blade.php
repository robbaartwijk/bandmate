@extends('layouts.app', ['page' => __('Venues'), 'pageSlug' => 'venues'])

@section('content')

<div class="col-container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit venue</h3>
                </div>

                <div class="bm_row_layout row" style="height: 100vh;">
                    <div class="col-lg-5">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('venues.update', $venue->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="bm_general_input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ $venue->name }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
                                        <label for="address" class="bm_label_layout">
                                            <h3>Address</h3>
                                        </label>
                                        <input type="text" name="address" class="bm_general_input form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Address" value="{{ $venue->address }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                        <label for="zip" class="bm_label_layout">
                                            <h3>Zip</h3>
                                        </label>
                                        <input type="text" name="zip" class="bm_general_input form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" placeholder="Zip" value="{{ $venue->zip }}">
                                        @include('alerts.feedback', ['field' => 'zip'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('city') ? 'has-danger' : '' }}">
                                        <label for="city" class="bm_label_layout">
                                            <h3>City</h3>
                                        </label>
                                        <input type="text" name="city" class="bm_general_input form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City" value="{{ $venue->city }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('state') ? 'has-danger' : '' }}">
                                        <label for="state" class="bm_label_layout">
                                            <h3>State</h3>
                                        </label>
                                        <input type="text" name="state" class="bm_general_input form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="State" value="{{ $venue->state }}">
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
                            <input type="text" name="country" class="bm_general_input form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" placeholder="Country" value="{{ $venue->country }}">
                            @include('alerts.feedback', ['field' => 'country'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone" class="bm_label_layout">
                                <h3>Phone</h3>
                            </label>
                            <input type="text" name="phone" class="bm_general_input form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ $venue->phone }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email" class="bm_label_layout">
                                <h3>Email</h3>
                            </label>
                            <input type="text" name="email" class="bm_general_input form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ $venue->email }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                            <label for="website" class="bm_label_layout">
                                <h3>Website</h3>
                            </label>
                            <input type="text" name="website" class="bm_general_input form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ $venue->website }}">
                            @include('alerts.feedback', ['field' => 'website'])
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
                                                    <textarea id="description" name="description" class="bm_textarea_layout form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description">{{ $venue->description }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'description'])

                                                    <button type="submit" class="btn btn-info">Update</button>
                                                    <a href="{{ route('venues.index') }}" <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

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
    @endsection
