@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')

<div class="col-container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Edit act</h3>
                </div>

                <div class="row" style="height: 100vh;">
                    <div class="col-lg-4">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('acts.update', $act->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">

                                        <label for="name">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ $act->name }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="form-group {{ $errors->has('number_of_members') ? 'has-danger' : '' }}">
                                        <label for="number_of_members">
                                            <h3>Number of Members</h3>
                                        </label>
                                        <input type="number" min="1" name="number_of_members" class="form-control
                                            {{ $errors->has('number_of_members') ? 'is-invalid' : '' }}" placeholder="Number of Members" value="{{ $act->number_of_members }}">
                                        @include('alerts.feedback', ['field' => 'number_of_members'])
                                    </div>


                                    <div class="form-group {{ $errors->has('genre_id') ? 'has-danger' : '' }}">
                                        <label for="genre_id">
                                            <h3>Genre</h3>
                                        </label>
                                        <select name="genre_id" class="form-control {{ $errors->has('genre_id') ? 'is-invalid' : '' }}">
                                            <option value="">Select</option>
                                            @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}" {{ $act->genre_id == $genre->id ? 'selected' : '' }}>
                                                {{ $genre->group }} - {{ $genre->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'genre_id'])
                                    </div>

                                    
                                    <div class="form-group
                                    {{ $errors->has('rehearsal_room') ? 'has-danger' : '' }}">
                                        <label for="rehearsal_room">
                                            <h3>Rehearsal Room</h3>
                                        </label>
                                        <select name="rehearsal_room" class="form-control {{ $errors->has('rehearsal_room') ? 'is-invalid' : '' }}">
                                            <option value="1" {{ $act->rehearsal_room == 1 ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="0" {{ $act->rehearsal_room == 0 ? 'selected' : '' }}>No</option>
                                        </select>
                                        @include('alerts.feedback', ['field' => 'rehearsal_room'])
                                    </div>

                                    <div class="form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                                        <label for="website">
                                            <h3>Website</h3>
                                        </label>
                                        <input type="text" min="1" name="website" class="form-control
                                    {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ $act->website }}">
                                        @include('alerts.feedback', ['field' => 'website'])
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="form-group {{ $errors->has('active') ? 'has-danger' : '' }}">
                            <label for="active">
                                <h3>Active</h3>
                            </label>
                            <select name="active" class="form-control {{ $errors->has('active') ? 'is-invalid' : '' }}">
                                <option value="1" {{ $act->active == 1 ? 'selected' : '' }}>Yes
                                </option>
                                <option value="0" {{ $act->active == 0 ? 'selected' : '' }}>No</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'active'])
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email">
                                <h3>Email</h3>
                            </label>
                            <input type="text" min="1" name="email" class="form-control
                    {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ $act->email }}">


                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone">
                                <h3>Phone</h3>
                            </label>
                            <input type="text" min="1" name="phone" class="form-control
                    {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ $act->phone }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>

                        <div class="form-group {{ $errors->has('facebook') ? 'has-danger' : '' }}">
                            <label for="facebook">
                                <h3>Facebook</h3>
                            </label>
                            <input type="text" min="1" name="facebook" class="form-control
                    {{ $errors->has('facebook') ? 'is-invalid' : '' }}" placeholder="Facebook" value="{{ $act->facebook }}">

                            @include('alerts.feedback', ['field' => 'facebook'])
                        </div>

                        <div class="form-group
                            {{ $errors->has('youtube') ? 'has-danger' : '' }}">
                            <label for="youtube">
                                <h3>Youtube</h3>
                            </label>
                            <input type="text" min="1" name="youtube" class="form-control
                    {{ $errors->has('youtube') ? 'is-invalid' : '' }}" placeholder="Youtube" value="{{ $act->youtube }}">

                            @include('alerts.feedback', ['field' => 'youtube'])
                        </div>


                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="form-group
                            {{ $errors->has('twitter') ? 'has-danger' : '' }}">
                            <label for="twitter">
                                <h3>Twitter</h3>
                            </label>
                            <input type="text" min="1" name="twitter" class="form-control
                    {{ $errors->has('twitter') ? 'is-invalid' : '' }}" placeholder="Twitter" value="{{ $act->twitter }}">

                            @include('alerts.feedback', ['field' => 'twitter'])
                        </div>

                        <div class="form-group
                                {{ $errors->has('instagram') ? 'has-danger' : '' }}">
                            <label for="instagram">
                                <h3>Instagram</h3>
                            </label>
                            <input type="text" min="1" name="instagram" class="form-control
                        {{ $errors->has('instagram') ? 'is-invalid' : '' }}" placeholder="Instagram" value="{{ $act->instagram }}">
                            @include('alerts.feedback', ['field' => 'instagram'])
                        </div>

                        <div class="form-group  {{ $errors->has('soundcloud') ? 'has-danger' : '' }}">
                            <label for="soundcloud">
                                <h3>Soundcloud</h3>
                            </label>
                            <input type="text" min="1" name="soundcloud" class="form-control
                        {{ $errors->has('soundcloud') ? 'is-invalid' : '' }}" placeholder="Soundcloud" value="{{ $act->soundcloud }}">
                            @include('alerts.feedback', ['field' => 'soundcloud'])
                        </div>

                        <div class="form-group
                                {{ $errors->has('spotify') ? 'has-danger' : '' }}">
                            <label for="spotify">
                                <h3>Spotify</h3>
                            </label>
                            <input type="text" min="1" name="spotify" class="form-control
                        {{ $errors->has('spotify') ? 'is-invalid' : '' }}" placeholder="Spotify" value="{{ $act->spotify }}">
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
                                                    <textarea id="description" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description" style="height: 10px;">{{ $act->description }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'description'])

                                                    <button type="submit" class="btn btn-info">Update</button>
                                                    <a href="{{ route('acts.index') }}" class="btn btn-danger">Back</a>

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
