@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')

<div class="col-container">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Add rehearsalroom</h3>
                </div>

                <div class="row" style="height: 68vh;">
                    <div class="col-lg-6">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('rehearsalrooms.store') }}" method="post">
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
                                        <input type="text" name="address" class="form-control
                                            {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Address" value="{{ old('address') }}">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>

                                    <div class="form-group {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                        <label for="zip">
                                            <h3>Zip</h3>
                                        </label>
                                        <input type="text" name="zip" class="form-control
                                            {{ $errors->has('zip') ? 'is-invalid' : '' }}" placeholder="Zip" value="{{ old('zip') }}">
                                        @include('alerts.feedback', ['field' => 'zip'])
                                    </div>

                                    <div class="form-group {{ $errors->has('city') ? 'has-danger' : '' }}">
                                        <label for="city">
                                            <h3>City</h3>
                                        </label>
                                        <input type="text" name="city" class="form-control
                                            {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City" value="{{ old('city') }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>

                            </div>

                        </div>
                    </div>

                    <div>
                        <div class="row" style="height: 55;">

                            <div class="card-body text-primary col-lg-126">

                                <div class="form-group {{ $errors->has('state') ? 'has-danger' : '' }}">
                                    <label for="state">
                                        <h3>State</h3>
                                    </label>
                                    <input type="text" name="state" class="form-control
                                    {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="State" value="{{ old('state') }}" style="width: 100%;">
                                    @include('alerts.feedback', ['field' => 'state'])
                                </div>

                                <div class="form-group {{ $errors->has('country') ? 'has-danger' : '' }}">
                                    <label for="country">
                                        <h3>Country</h3>
                                    </label>
                                    <input type="text" name="country" class="form-control
                                    {{ $errors->has('country') ? 'is-invalid' : '' }}" placeholder="Country" value="{{ old('country') }}" style="width: 100%;">
                                    @include('alerts.feedback', ['field' => 'country'])
                                </div>

                                <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                    <label for="phone">
                                        <h3>Phone</h3>
                                    </label>
                                    <input type="text" min="1" name="phone" class="form-control
                                    {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ old('phone') }}" style="width: 100%;">
                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>

                                <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                                    <label for="email">
                                        <h3>Email</h3>
                                    </label>
                                    <input type="text" min="1" name="email" class="form-control
                    {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}">
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>

                                <div class="form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                                    <label for="website">
                                        <h3>Website</h3>
                                    </label>
                                    <input type="text" min="1" name="website" class="form-control
                        {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ old('website') }}">
                                    @include('alerts.feedback', ['field' => 'website'])
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="height: 10vh; margin-top:10px">
                    <div class="col-md-12">
                        <div class="card-body text-primary col-lg-23">
                            <div class="form-group
                                        {{ $errors->has('description') ? 'has-danger' : '' }}">
                                <label for="description">
                                    <h3>Description</h3>
                                </label>
                                <textarea id="description" name="description" class="form-control
                                            {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description" style="height: 10px;">{{ old('description') }}</textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>
                            <button type="submit" class="btn btn-info">Add</button>
                            <a href="{{ route('rehearsalrooms.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>

                </div>
                </form>
            </div>

        </div>
    </div>

</div>



@endsection
