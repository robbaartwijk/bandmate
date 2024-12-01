@extends('layouts.app', ['page' => __('Rehearsalrooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Edit rehearsalroom</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form action="{{ route('rehearsalrooms.update', $rehearsalroom->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name">
                                    <h4>Name</h4>
                                </label>
                                <input type="text" name="name"
                                    class="form-control
                                    {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ $rehearsalroom->name }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group {{ $errors->has('address') ? 'has-danger' : '' }}">
                                <label for="address">
                                    <h4>Address</h4>
                                </label>
                                <input type="text" name="address"
                                    class="form-control
                                    {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                    placeholder="Address" value="{{ $rehearsalroom->address }}">
                                @include('alerts.feedback', ['field' => 'address'])
                            </div>

                            <div class="form-group {{ $errors->has('city') ? 'has-danger' : '' }}">
                                <label for="city">
                                    <h4>City</h4>
                                </label>
                                <input type="text" name="city"
                                    class="form-control
                                    {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                    placeholder="City" value="{{ $rehearsalroom->city }}">
                                @include('alerts.feedback', ['field' => 'city'])
                            </div>


                            <div class="form-group {{ $errors->has('state') ? 'has-danger' : '' }}">
                                <label for="state">
                                    <h4>State</h4>
                                </label>
                                <input type="text" name="state"
                                    class="form-control
                                    {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                    placeholder="State" value="{{ $rehearsalroom->state }}">
                                @include('alerts.feedback', ['field' => 'state'])
                            </div>

                            <div class="form-group {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                <label for="zip">
                                    <h4>Postal code</h4>
                                </label>
                                <input type="text" name="zip"
                                    class="form-control
                                    {{ $errors->has('cizipty') ? 'is-invalid' : '' }}"
                                    placeholder="Postal code" value="{{ $rehearsalroom->zip }}">
                                @include('alerts.feedback', ['field' => 'zip'])
                            </div>

                            <div class="form-group {{ $errors->has('country') ? 'has-danger' : '' }}">
                                <label for="country">
                                    <h4>Country</h4>
                                </label>
                                <input type="text" name="country"
                                    class="form-control
                                    {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                    placeholder="Country" value="{{ $rehearsalroom->country }}">
                                @include('alerts.feedback', ['field' => 'country'])
                            </div>

                            <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                <label for="phone">
                                    <h4>Phone</h4>
                                </label>
                                <input type="text" name="phone"
                                    class="form-control
                                    {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                    placeholder="Phone" value="{{ $rehearsalroom->phone }}">
                                @include('alerts.feedback', ['field' => 'phone'])
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="text" name="email"
                                    class="form-control
                                    {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    placeholder="Email" value="{{ $rehearsalroom->email }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>

                            <div class="form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                                <label for="website">
                                    <h4>Website</h4>
                                </label>
                                <input type="text" name="website"
                                    class="form-control
                                    {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                    placeholder="Website" value="{{ $rehearsalroom->website }}">
                                @include('alerts.feedback', ['field' => 'website'])
                            </div>
 
                            <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                                <label for="description">
                                    <h4>Description</h4>
                                </label>
                                <br><br>
                                <textarea id="description" name="description" class="{{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    placeholder="Description">{{ $rehearsalroom->description }}</textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('rehearsalrooms.index') }}" class="btn btn-danger">Back</a>

                            @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
