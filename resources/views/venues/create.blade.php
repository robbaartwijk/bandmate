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
                                <label for="name">Name</label>
                                <input type="text" name="name"
                                    class="form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ old('name') }}">
                                @include('alerts.feedback', ['field' => 'name'])

                                <div
                                    class="form-group
                                    {{ $errors->has('address') ? 'has-danger' : '' }}">
                                    <label for="address">Address</label>
                                    <input type="text" name="address"
                                        class="form-control
                                        {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                        placeholder="Address" value="{{ old('address') }}">
                                    @include('alerts.feedback', ['field' => 'address'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                    <label for="zip">Zip</label>
                                    <input type="text" name="zip"
                                        class="form-control
                                    {{ $errors->has('zip') ? 'is-invalid' : '' }}"
                                        placeholder="Zip" value="{{ old('zip') }}">
                                    @include('alerts.feedback', ['field' => 'zip'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('city') ? 'has-danger' : '' }}">
                                    <label for="city">City</label>
                                    <input type="text" name="city"
                                        class="form-control
                                        {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                        placeholder="City" value="{{ old('city') }}">
                                    @include('alerts.feedback', ['field' => 'city'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('state') ? 'has-danger' : '' }}">
                                    <label for="state">State</label>
                                    <input type="text" name="state"
                                        class="form-control
                                        {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                        placeholder="State" value="{{ old('state') }}">
                                    @include('alerts.feedback', ['field' => 'state'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('country') ? 'has-danger' : '' }}">
                                    <label for="country">Country</label>
                                    <input type="text" name="country"
                                        class="form-control
                                    {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                        placeholder="Country" value="{{ old('country') }}">
                                    @include('alerts.feedback', ['field' => 'country'])
                                </div>

                                <div
                                    class="form-group
                                        {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone"
                                        class="form-control
                                            {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        placeholder="Phone" value="{{ old('phone') }}">
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>

                                <div
                                    class="form-group
                                        {{ $errors->has('email') ? 'has-danger' : '' }}">
                                    <label for="email">Email</label>
                                    <input type="text" name="email"
                                        class="form-control
                                            {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        placeholder="Email" value="{{ old('email') }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>

                                <div
                                    class="form-group
                                    {{ $errors->has('website') ? 'has-danger' : '' }}">
                                    <label for="website">Website</label>
                                    <input type="text" name="website"
                                        class="form-control
                                        {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                        placeholder="Website" value="{{ old('website') }}">
                                    @include('alerts.feedback', ['field' => 'website'])
                                </div>

                                <div
                                    class="form-group
                                        {{ $errors->has('description') ? 'has-danger' : '' }}">
                                    <label for="description">Description</label>
                                    <input type="text" name="description"
                                        class="form-control
                                            {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                        placeholder="Description" value="{{ old('description') }}">
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
