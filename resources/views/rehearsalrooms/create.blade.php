@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')

<div class="col-container">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Add rehearsalroom</h3>
                </div>

                <div class="row" style="height: 50vh;">
                    <div class="col-lg-6">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('rehearsalrooms.store') }}" method="post">
                                    @csrf

                                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="name" style="margin-right: 10px; margin-top:10px;">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ old('name') }}" style="font-size: 17px; border: 1px solid #d7c4c4;">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>


                                    <div class="form-group {{ $errors->has('address') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="address" style="margin-right: 10px; margin-top:10px;">
                                            <h3>Address</h3>
                                        </label>
                                        <input type="text" name="address" class="form-control
                                            {{ $errors->has('address') ? 'is-invalid' : '' }}" placeholder="Address" value="{{ old('address') }}" style="font-size: 17px; border: 1px solid #d7c4c4;">
                                        @include('alerts.feedback', ['field' => 'address'])
                                    </div>


                                    <div class="form-group {{ $errors->has('zip') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="zip" style="margin-right: 10px; margin-top:10px;">
                                            <h3>Zip</h3>
                                        </label>
                                        <input type="text" name="zip" class="form-control
                                            {{ $errors->has('zip') ? 'is-invalid' : '' }}" placeholder="Zip" value="{{ old('zip') }}" style="font-size: 17px; border: 1px solid #d7c4c4;">
                                        @include('alerts.feedback', ['field' => 'zip'])
                                    </div>

                                    <div class="form-group {{ $errors->has('city') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="city" style="margin-right: 10px; margin-top:10px;">
                                            <h3>City</h3>
                                        </label>
                                        <input type="text" name="city" class="form-control
                                            {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City" value="{{ old('city') }}" style="font-size: 17px; border: 1px solid #d7c4c4;">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>


                                    <div class="form-group {{ $errors->has('state') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="state" style="margin-right: 10px; margin-top:10px;">
                                            <h3>State</h3>
                                        </label>
                                        <input type="text" name="state" class="form-control
                                            {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="State" value="{{ old('state') }}" style="font-size: 17px; border: 1px solid #d7c4c4;">
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

                                    <div class="form-group {{ $errors->has('country') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="name" style="margin-right: 10px; margin-top:10px;">
                                            <h3>Country</h3>
                                        </label>
                                        <input type="text" name="country" class="form-control
                                            {{ $errors->has('country') ? 'is-invalid' : '' }}" placeholder="Country" value="{{ old('country') }}" style="margin-bottom:20px; font-size: 17px; border: 1px solid #d7c4c4;">
                                        @include('alerts.feedback', ['field' => 'country'])
                                    </div>

                                    <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="phone" style="margin-right: 10px; margin-top:10px;">
                                            <h3>Phone</h3>
                                        </label>
                                        <input type="text" name="phone" class="form-control
                                            {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ old('phone') }}" style="margin-bottom:20px; font-size: 17px; border: 1px solid #d7c4c4;">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>

                                    <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="email" style="margin-right: 10px; margin-top:10px;">
                                            <h3>Email</h3>
                                        </label>
                                        <input type="text" name="email" class="form-control
                                            {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" style="margin-bottom:20px; font-size: 17px; border: 1px solid #d7c4c4;">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <div class="form-group {{ $errors->has('website') ? 'has-danger' : '' }}" style="display: flex; align-items: center;">
                                        <label for="website" style="margin-right: 10px; margin-top:10px;">
                                            <h3>Website</h3>
                                        </label>
                                        <input type="text" name="website" class="form-control
                                            {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ old('website') }}" style="margin-bottom:20px; font-size: 17px; border: 1px solid #d7c4c4;">
                                        @include('alerts.feedback', ['field' => 'website'])
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
                    <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description" style="height: 10px;">{{ old('description') }}</textarea>
                    @include('alerts.feedback', ['field' => 'description'])
                </div>
                <button type="submit" class="btn btn-info">Add</button>
                <a href="{{ route('rehearsalrooms.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>

    </div>
    </form>
</div>

@endsection
