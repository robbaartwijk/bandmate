@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')

<div class="col-container">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Add agency</b></h3>
                </div>

                <div class="row" style="height: 100vh;">
                    <div class="col-lg-4">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('agencies.store') }}" method="post">
                                    @csrf

                                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">

                                        <label for="name">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ old('name') }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>


                                    <div class="form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
                                        <label for="address">
                                            <h3>Address</h3>
                                        </label>
                                        <input type="text" min="1" name="address" class="form-control
                                    {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Address" value="{{ old('address') }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>


                                    <div class="form-group {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                        <label for="zip">
                                            <h3>Zip</h3>
                                        </label>
                                        <input type="text" min="1" name="zip" class="form-control
                                    {{ $errors->has('zip') ? 'is-invalid' : '' }}" placeholder="Zip" value="{{ old('zip') }}">
                                        @include('alerts.feedback', ['field' => 'zip'])
                                    </div>

                                    <div class="form-group {{ $errors->has('city') ? 'has-danger' : '' }}">
                                        <label for="city">
                                            <h3>City</h3>
                                        </label>
                                        <input type="text" min="1" name="city" class="form-control
                                    {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City" value="{{ old('city') }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>

                                    <div class="form-group {{ $errors->has('state') ? 'has-danger' : '' }}">
                                        <label for="state">
                                            <h3>State</h3>
                                        </label>
                                        <input type="text" min="1" name="state" class="form-control
                                    {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="State" value="{{ old('state') }}">
                                        @include('alerts.feedback', ['field' => 'state'])
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="form-group {{ $errors->has('country') ? 'has-danger' : '' }}">
                            <label for="country">
                                <h3>Country</h3>
                            </label>
                            <input type="text" min="1" name="country" class="form-control
                        {{ $errors->has('country') ? 'is-invalid' : '' }}" placeholder="Country" value="{{ old('country') }}">
                            @include('alerts.feedback', ['field' => 'country'])
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email">
                                <h3>Email</h3>
                            </label>
                            <input type="text" min="1" name="email" class="form-control
                    {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone">
                                <h3>Phone</h3>
                            </label>
                            <input type="text" min="1" name="phone" class="form-control
                    {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ old('phone') }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>

                        <div class="form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                            <label for="website">
                                <h3>Website</h3>
                            </label>
                            <input type="text" min="1" name="website" class="form-control
                        {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ old('website') }}">
                            @include('alerts.feedback', ['field' => 'website'])
                        </div>

                        <div class="form-group {{ $errors->has('facebook') ? 'has-danger' : '' }}">
                            <label for="facebook">
                                <h3>Facebook</h3>
                            </label>
                            <input type="text" min="1" name="facebook" class="form-control
                    {{ $errors->has('facebook') ? 'is-invalid' : '' }}" placeholder="Facebook" value="{{ old('facebook') }}">

                            @include('alerts.feedback', ['field' => 'facebook'])
                        </div>

                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="form-group
                            {{ $errors->has('youtube') ? 'has-danger' : '' }}">
                            <label for="youtube">
                                <h3>Youtube</h3>
                            </label>
                            <input type="text" min="1" name="youtube" class="form-control
                    {{ $errors->has('youtube') ? 'is-invalid' : '' }}" placeholder="Youtube" value="{{ old('youtube') }}">

                            @include('alerts.feedback', ['field' => 'youtube'])
                        </div>

                        <div class="form-group
                        {{ $errors->has('twitter') ? 'has-danger' : '' }}">
                            <label for="twitter">
                                <h3>Twitter</h3>
                            </label>
                            <input type="text" min="1" name="twitter" class="form-control
                {{ $errors->has('twitter') ? 'is-invalid' : '' }}" placeholder="Twitter" value="{{ old('twitter') }}">

                            @include('alerts.feedback', ['field' => 'twitter'])
                        </div>

                        <div class="form-group
                                {{ $errors->has('instagram') ? 'has-danger' : '' }}">
                            <label for="instagram">
                                <h3>Instagram</h3>
                            </label>
                            <input type="text" min="1" name="instagram" class="form-control
                        {{ $errors->has('instagram') ? 'is-invalid' : '' }}" placeholder="Instagram" value="{{ old('instagram') }}">
                            @include('alerts.feedback', ['field' => 'instagram'])
                        </div>

                        <div class="form-group  {{ $errors->has('soundcloud') ? 'has-danger' : '' }}">
                            <label for="soundcloud">
                                <h3>Soundcloud</h3>
                            </label>
                            <input type="text" min="1" name="soundcloud" class="form-control
                        {{ $errors->has('soundcloud') ? 'is-invalid' : '' }}" placeholder="Soundcloud" value="{{ old('soundcloud') }}">
                            @include('alerts.feedback', ['field' => 'soundcloud'])
                        </div>

                        <div class="form-group
                                {{ $errors->has('spotify') ? 'has-danger' : '' }}">
                            <label for="spotify">
                                <h3>Spotify</h3>
                            </label>
                            <input type="text" min="1" name="spotify" class="form-control
                        {{ $errors->has('spotify') ? 'is-invalid' : '' }}" placeholder="Spotify" value="{{ old('spotify') }}">
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
                                                    <label for="description">
                                                        <h3>Description</h3>
                                                    </label>
                                                    <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description" style="height: 10px;">{{ old('description') }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'description'])

                                                    <button type="submit" class="btn btn-info">Add</button>
                                                    <a href="{{ route('agencies.index') }}" class="btn btn-danger">Back</a>
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
        </div>
    </div>
    </form>
    @endsection
