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
                                <label for="name">Name</label>
                                <input type="text" name="name"
                                    class="form-control
                                    {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ $rehearsalroom->name }}">

                                <label for="address">Address</label>
                                <input type="text" name="address"
                                    class="form-control
                                    {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                    placeholder="Address" value="{{ $rehearsalroom->address }}">

                                <label for="city">City</label>
                                <input type="text" name="city"
                                    class="form-control
                                    {{ $errors->has('city') ? 'is-invalid' : '' }}"
                                    placeholder="City" value="{{ $rehearsalroom->city }}">

                                <label for="state">State</label>
                                <input type="text" name="state"
                                    class="form-control
                                    {{ $errors->has('state') ? 'is-invalid' : '' }}"
                                    placeholder="State" value="{{ $rehearsalroom->state }}">

                                <label for="zip">Postal code</label>
                                <input type="text" name="zip"
                                    class="form-control
                                    {{ $errors->has('cizipty') ? 'is-invalid' : '' }}"
                                    placeholder="Postal code" value="{{ $rehearsalroom->zip }}">

                                <label for="country">Country</label>
                                <input type="text" name="country"
                                    class="form-control
                                    {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                    placeholder="Country" value="{{ $rehearsalroom->country }}">

                                <label for="phone">Phone</label>
                                <input type="text" name="phone"
                                    class="form-control
                                    {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                    placeholder="Phone" value="{{ $rehearsalroom->phone }}">

                                <label for="email">Country</label>
                                <input type="text" name="email"
                                    class="form-control
                                    {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    placeholder="Email" value="{{ $rehearsalroom->email }}">


                                <label for="website">Website</label>
                                <input type="text" name="website"
                                    class="form-control
                                    {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                    placeholder="Website" value="{{ $rehearsalroom->website }}">

                                <label for="description">Description</label>
                                <input type="text" name="description"
                                    class="form-control
                                    {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    placeholder="Description" value="{{ $rehearsalroom->description }}">

                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('rehearsalrooms.index') }}" class="btn btn-secondary">Back</a>

                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
