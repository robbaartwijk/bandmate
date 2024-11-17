@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Add act</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('acts.store') }}" method="post">
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
                            </div>

                            <div
                                class="form-group
                                        {{ $errors->has('number_of_members') ? 'has-danger' : '' }}">
                                <label for="number_of_members">Number of Members</label>
                                <input type="number" min="1" name="number_of_members"
                                    class="form-control
                                            {{ $errors->has('number_of_members') ? 'is-invalid' : '' }}"
                                    placeholder="Number of Members" value="{{ old('number_of_members') }}">
                                @include('alerts.feedback', ['field' => 'number_of_members'])
                            </div>

                            <div
                                class="form-group
                                    {{ $errors->has('genre_id') ? 'has-danger' : '' }}">
                                <label for="genre_id">Genre</label>
                                <input type="number" min="1" name="genre_id"
                                    class="form-control
                                        {{ $errors->has('genre_id') ? 'is-invalid' : '' }}"
                                    placeholder="Genre" value="{{ old('genre_id') }}">
                                @include('alerts.feedback', ['field' => 'genre_id'])
                            </div>

                            <div
                                class="form-group
                            {{ $errors->has('rehearsal_room') ? 'has-danger' : '' }}">
                                <label for="rehearsal_room">Rehearsal Room</label>
                                <input type="radio" name="rehearsal_room" value="yes"
                                    class="{{ $errors->has('rehearsal_room') ? 'is-invalid' : '' }}"> Yes
                                <input type="radio" name="rehearsal_room" value="no"
                                    class="{{ $errors->has('rehearsal_room') ? 'is-invalid' : '' }}"> No
                                @include('alerts.feedback', ['field' => 'rehearsal_room'])
                            </div>



                            <div
                                class="form-group
                            {{ $errors->has('website') ? 'has-danger' : '' }}">
                                <label for="website">Website</label>
                                <input type="text" min="1" name="website"
                                    class="form-control
                                {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                    placeholder="Website" value="{{ old('website') }}">
                                @include('alerts.feedback', ['field' => 'website'])
                            </div>


                            <div
                                class="form-group
                        {{ $errors->has('active') ? 'has-danger' : '' }}">
                                <label for="active">Active</label>
                                <input type="boolean" min="1" name="active"
                                    class="form-control
                            {{ $errors->has('active') ? 'is-invalid' : '' }}"
                                    placeholder="Active" value="{{ old('active') }}">
                                @include('alerts.feedback', ['field' => 'active'])
                            </div>


                            <div
                                class="form-group
                            {{ $errors->has('email') ? 'has-danger' : '' }}">
                                <label for="email">Email</label>
                                <input type="text" min="1" name="email"
                                    class="form-control
                                {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    placeholder="Email" value="{{ old('email') }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>


                            <div
                                class="form-group
                            {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                <label for="phone">Phone</label>
                                <input type="text" min="1" name="phone"
                                    class="form-control
                                {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                    placeholder="Phone" value="{{ old('phone') }}">
                                @include('alerts.feedback', ['field' => 'phone'])
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

                            <button type="submit" class="btn btn-primary">Add</button>
                            <a href="{{ route('acts.index') }}" class="btn btn-secondary">Back</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
