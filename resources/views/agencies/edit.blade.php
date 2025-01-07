@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')

<div class="col-container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit agency</h3>
                </div>

                <div class="bm_row_layout row" style="height: 100vh;">
                    <div class="col-lg-4">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('agencies.update', $agency->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="bm_general_input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ $agency->name }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
                                        <label for="address" class="bm_label_layout">
                                            <h3>Address</h3>
                                        </label>
                                        <input type="text" name="address" class="bm_general_input form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Address" value="{{ $agency->address }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                        <label for="zip" class="bm_label_layout">
                                            <h3>Zip</h3>
                                        </label>
                                        <input type="text" name="zip" class="bm_general_input form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" placeholder="Zip" value="{{ $agency->zip }}">
                                        @include('alerts.feedback', ['field' => 'zip'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('city') ? 'has-danger' : '' }}">
                                        <label for="city" class="bm_label_layout">
                                            <h3>City</h3>
                                        </label>
                                        <input type="text" name="city" class="bm_general_input form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City" value="{{ $agency->city }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>
            
                                    <div class="bm_form_group form-group {{ $errors->has('state') ? 'has-danger' : '' }}">
                                        <label for="state" class="bm_label_layout">
                                            <h3>State</h3>
                                        </label>
                                        <input type="text" name="state" class="bm_general_input form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="State" value="{{ $agency->state }}">
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
                            <input type="text" name="country" class="bm_general_input form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" placeholder="Country" value="{{ $agency->country }}">
                            @include('alerts.feedback', ['field' => 'country'])
                        </div>   
     
                        <div class="bm_form_group form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone" class="bm_label_layout">
                                <h3>Phone</h3>
                            </label>
                            <input type="text" name="phone" class="bm_general_input form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ $agency->phone }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>   
                    
                        <div class="bm_form_group form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email" class="bm_label_layout">
                                <h3>Email</h3>
                            </label>
                            <input type="text" name="email" class="bm_general_input form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ $agency->email }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>  

                        <div class="bm_form_group form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                            <label for="website" class="bm_label_layout">
                                <h3>Website</h3>
                            </label>
                            <input type="text" name="website" class="bm_general_input form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ $agency->website }}">
                            @include('alerts.feedback', ['field' => 'website'])
                        </div>  

                        <div class="bm_form_group form-group {{ $errors->has('facebook') ? 'has-danger' : '' }}">
                            <label for="facebook" class="bm_label_layout">
                                <h3>Facebook</h3>
                            </label>
                            <input type="text" name="facebook" class="bm_general_input form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" placeholder="Facebook" value="{{ $agency->facebook }}">
                            @include('alerts.feedback', ['field' => 'facebook'])
                        </div>

                    </div>

                    
                    <div class="card-body text-primary col-lg-4">

                        <div class="bm_form_group form-group {{ $errors->has('twitter') ? 'has-danger' : '' }}">
                            <label for="twitter" class="bm_label_layout">
                                <h3>Twitter</h3>
                            </label>
                            <input type="text" min="1" name="twitter" class="bm_general_input form-control
                    {{ $errors->has('twitter') ? 'is-invalid' : '' }}" placeholder="Twitter" value="{{ $agency->twitter }}">
                            @include('alerts.feedback', ['field' => 'twitter'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('instagram') ? 'has-danger' : '' }}">
                            <label for="instagram"class="bm_label_layout">
                                <h3>Instagram</h3>
                            </label>
                            <input type="text" min="1" name="instagram" class="bm_general_input form-control
                        {{ $errors->has('instagram') ? 'is-invalid' : '' }}" placeholder="Instagram" value="{{ $agency->instagram }}">
                            @include('alerts.feedback', ['field' => 'instagram'])
                        </div>

                        <div class="bm_form_group form-group  {{ $errors->has('soundcloud') ? 'has-danger' : '' }}">
                            <label for="soundcloud" class="bm_label_layout">
                                <h3>Soundcloud</h3>
                            </label>
                            <input type="text" min="1" name="soundcloud" class="bm_general_input form-control
                        {{ $errors->has('soundcloud') ? 'is-invalid' : '' }}" placeholder="Soundcloud" value="{{ $agency->soundcloud }}">
                            @include('alerts.feedback', ['field' => 'soundcloud'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('spotify') ? 'has-danger' : '' }}">
                            <label for="spotify" class="bm_label_layout">
                                <h3>Spotify</h3>
                            </label>
                            <input type="text" min="1" name="spotify" class="bm_general_input form-control
                        {{ $errors->has('spotify') ? 'is-invalid' : '' }}" placeholder="Spotify" value="{{ $agency->spotify }}">
                            @include('alerts.feedback', ['field' => 'spotify'])
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
                                                    <textarea id="description" name="description" class="bm_textarea_layout form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description">{{ $agency->description }}</textarea>
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
    @endsection
