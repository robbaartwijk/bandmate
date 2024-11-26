@extends('layouts.app', ['page' => __('Venues'), 'pageSlug' => 'venues'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Add venue</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('venues.store') }}" method="post">
                            @csrf

                            <div
                                class="form-group
                                        {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name"><h4>Name</h4></label>
                                <input type="text" name="name"
                                    class="form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])

                                <div
                                    class="form-group
                                    {{ $errors->has('address') ? 'has-danger' : '' }}">
                                    <label for="address"><h4>Address</h4></label>
                                    <input type="text" name="address"
                                        class="form-control
                                        {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                        placeholder="Address" value="{{ old('address') }}">
                                    @include('alerts.feedback', ['field' => 'address'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                    <label for="zip"><h4>Zip</h4></label>
                                    <input type="text" name="zip"
                                        class="form-control
                                    {{ $errors->has('zip') ? 'is-invalid' : '' }}"
                                        placeholder="Zip" value="{{ old('zip') }}">
                                    @include('alerts.feedback', ['field' => 'zip'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('city') ? 'has-danger' : '' }}">
                                    <label for="city"><h4>City</h4></label>
                                    <input type="text" name="city"
                                        class="form-control
                                        {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                        placeholder="City" value="{{ old('city') }}">
                                    @include('alerts.feedback', ['field' => 'city'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('state') ? 'has-danger' : '' }}">
                                    <label for="state"><h4>State</h4></label>
                                    <input type="text" name="state"
                                        class="form-control
                                        {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                        placeholder="State" value="{{ old('state') }}">
                                    @include('alerts.feedback', ['field' => 'state'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('country') ? 'has-danger' : '' }}">
                                    <label for="country"><h4>Country</h4></label>
                                    <input type="text" name="country"
                                        class="form-control
                                    {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                        placeholder="Country" value="{{ old('country') }}">
                                    @include('alerts.feedback', ['field' => 'country'])
                                </div>

                                <div
                                    class="form-group
                                        {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                    <label for="phone"><h4>Phone</h4></label>
                                    <input type="text" name="phone"
                                        class="form-control
                                            {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        placeholder="Phone" value="{{ old('phone') }}">
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>

                                <div
                                    class="form-group
                                        {{ $errors->has('email') ? 'has-danger' : '' }}">
                                    <label for="email"><h4>Email</h4></label>
                                    <input type="text" name="email"
                                        class="form-control
                                            {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        placeholder="Email" value="{{ old('email') }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('website') ? 'has-danger' : '' }}">
                                    <label for="website"><h4>Website</h4></label>
                                    <input type="text" name="website"
                                        class="form-control
                                        {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                        placeholder="Website" value="{{ old('website') }}">
                                    @include('alerts.feedback', ['field' => 'website'])
                                </div>

                                <div>
                                    <label for="description"><h4>Description</h4></label>
                                    <br>
                                    <textarea id="description" name="description" class="{{ $errors->has('description') ? 'is-invalid' : '' }}"
                                        placeholder="Description">{{ old('description') }}</textarea>
                                    @include('alerts.feedback', ['field' => 'description'])
                                </div>

                                <button type="submit" class="btn btn-info">Add</button>
                                <a href="{{ route('venues.index') }}" class="btn btn-danger">Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
