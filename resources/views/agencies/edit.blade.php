@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')

<div class="col-container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Edit agency</h3>
                </div>

                <div class="row" style="height: 100vh;">
                    <div class="col-lg-4">

                        <div class="card-body text-primary">

                            {{-- <div class="table-responsive"> --}}

                                <form action="{{ route('agencies.update', $agency->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ $agency->name }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                

                                    <div class="form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
                                        <label for="address">
                                            <h3>Adress</h3>
                                        </label>
                                        <input type="text" name="address" class="form-control
                                            {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Addresa" value="{{ $agency->address }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>

                                    <div class="form-group {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                        <label for="zip">
                                            <h3>Zip</h3>
                                        </label>
                                        <input type="text" name="zip" class="form-control
                                            {{ $errors->has('zip') ? 'is-invalid' : '' }}" placeholder="Zip" value="{{ $agency->zip }}">
                                        @include('alerts.feedback', ['field' => 'zip'])
                                    </div>

                                    <div class="form-group {{ $errors->has('city') ? 'has-danger' : '' }}">
                                        <label for="city">
                                            <h3>City</h3>
                                        </label>
                                        <input type="text" name="city" class="form-control
                                            {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City" value="{{ $agency->city }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>

                                    <div class="form-group {{ $errors->has('state') ? 'has-danger' : '' }}">
                                        <label for="state">
                                            <h3>State</h3>
                                        </label>
                                        <input type="text" name="state" class="form-control
                                            {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="State" value="{{ $agency->state }}">
                                        @include('alerts.feedback', ['field' => 'state'])
                                    </div>

                            {{-- </div> --}}
                        </div>
                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="form-group {{ $errors->has('country') ? 'has-danger' : '' }}">
                            <label for="country">
                                <h3>Country</h3>
                            </label>
                            <input type="text" min="1" name="country" class="form-control
                        {{ $errors->has('country') ? 'is-invalid' : '' }}" placeholder="Country" value="{{ $agency->country }}">
                            @include('alerts.feedback', ['field' => 'country'])
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email">
                                <h3>Email</h3>
                            </label>
                            <input type="text" min="1" name="email" class="form-control
                        {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ $agency->email }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone">
                                <h3>Phone</h3>
                            </label>
                            <input type="text" min="1" name="phone" class="form-control
                    {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ $agency->phone }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>

                        <div class="form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                            <label for="website">
                                <h3>Website</h3>
                            </label>
                            <input type="text" min="1" name="website" class="form-control
                    {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ $agency->website }}">

                            @include('alerts.feedback', ['field' => 'website'])
                        </div>
 
                        <div class="form-group {{ $errors->has('facebook') ? 'has-danger' : '' }}">
                            <label for="facebook">
                                <h3>Facebook</h3>
                            </label>
                            <input type="text" min="1" name="facebook" class="form-control
                    {{ $errors->has('facebook') ? 'is-invalid' : '' }}" placeholder="Facebook" value="{{ $agency->facebook }}">
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
                    {{ $errors->has('youtube') ? 'is-invalid' : '' }}" placeholder="Youtube" value="{{ $agency->youtube }}">

                            @include('alerts.feedback', ['field' => 'youtube'])
                        </div>

                        <div class="form-group
                            {{ $errors->has('twitter') ? 'has-danger' : '' }}">
                            <label for="twitter">
                                <h3>Twitter</h3>
                            </label>
                            <input type="text" min="1" name="twitter" class="form-control
                    {{ $errors->has('twitter') ? 'is-invalid' : '' }}" placeholder="Twitter" value="{{ $agency->twitter }}">

                            @include('alerts.feedback', ['field' => 'twitter'])
                        </div>

                        <div class="form-group
                                {{ $errors->has('instagram') ? 'has-danger' : '' }}">
                            <label for="instagram">
                                <h3>Instagram</h3>
                            </label>
                            <input type="text" min="1" name="instagram" class="form-control
                        {{ $errors->has('instagram') ? 'is-invalid' : '' }}" placeholder="Instagram" value="{{ $agency->instagram }}">
                            @include('alerts.feedback', ['field' => 'instagram'])
                        </div>

                        <div class="form-group  {{ $errors->has('soundcloud') ? 'has-danger' : '' }}">
                            <label for="soundcloud">
                                <h3>Soundcloud</h3>
                            </label>
                            <input type="text" min="1" name="soundcloud" class="form-control
                        {{ $errors->has('soundcloud') ? 'is-invalid' : '' }}" placeholder="Soundcloud" value="{{ $agency->soundcloud }}">
                            @include('alerts.feedback', ['field' => 'soundcloud'])
                        </div>

                        <div class="form-group
                                {{ $errors->has('spotify') ? 'has-danger' : '' }}">
                            <label for="spotify">
                                <h3>Spotify</h3>
                            </label>
                            <input type="text" min="1" name="spotify" class="form-control
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
                                                    <label for="description">
                                                        <h3>Description</h3>
                                                    </label>
                                                    <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description" style="height: 10px;">{{ $agency->description }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'description'])

                                                    <button type="submit" class="btn btn-info">Update</button>
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
            </form>
        </div>
    </div>
    @endsection
