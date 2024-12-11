@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')

<div class="col-container">

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Add act</b></h3>
                </div>

                <div class="bm_row_layout row">
                    <div class="col-lg-4">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('acts.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="bm_general_input form-control
                                            {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ old('name') }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('number_of_members') ? 'has-danger' : '' }}">
                                        <label for="number_of_members" class="bm_label_layout">
                                            <h3>Members</h3>
                                        </label>
                                        <input type="number" min="1" name="number_of_members" class="bm_general_input form-control 
                                            {{ $errors->has('number_of_members') ? 'is-invalid' : '' }}" placeholder="Number of Members" value="{{ old('number_of_members') }}">
                                        @include('alerts.feedback', ['field' => 'number_of_members'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('genre_id') ? 'has-danger' : '' }}">
                                        <label for="genre_id" class="bm_label_layout">
                                            <h3>Genre</h3>
                                        </label>
                                        <select name="genre_id" class="bm_general_input form-control {{ $errors->has('genre_id') ? 'is-invalid' : '' }}">
                                            <option value="">Select</option>
                                            @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->group }} - {{ $genre->name }}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'genre_id'])
                                    </div>

                                    <div class="form-group {{ $errors->has('rehearsal_room') ? 'has-danger' : '' }}">
                                        <label for="rehearsal_room">
                                            <h3>Rehearsal room available?</h3>
                                        </label>
                                        <input type="checkbox" class="bm_checkbox_layout form-check-input" id="rehearsal_room" name="rehearsal_room" {{ old('rehearsal_room') ? 'checked' : '' }}>
                                        @include('alerts.feedback', ['field' => 'rehearsal_room'])
                                    </div>

                                    <div class="form-group {{ $errors->has('active') ? 'has-danger' : '' }}">
                                        <label for="active">
                                            <h3>Act currently active?</h3>
                                        </label>
                                        <input type="checkbox" class="bm_checkbox_layout form-check-input" id="active" name="active" {{ old('active') ? 'checked' : '' }}>
                                        @include('alerts.feedback', ['field' => 'active'])
                                    </div>

                                    <div class="bm_upload">
                                        <label for="ActPic">
                                            <h3>Add picture</h3>
                                        </label>
                                        <input type="file" class="btn btn-info" id="ActPic" name="ActPic" accept="image/*" style="border: 1px solid #ccc; padding: 5px;">
                                        @include('alerts.feedback', ['field' => 'active'])
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="bm_form_group form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email" class="bm_label_layout">
                                <h3>Email</h3>
                            </label>
                            <input type="text" name="email" class="bm_general_input form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone" class="bm_label_layout">
                                <h3>Phone</h3>
                            </label>
                            <input type="text" name="phone" class="bm_general_input form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ old('phone') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                            <label for="website" class="bm_label_layout">
                                <h3>Website</h3>
                            </label>
                            <input type="text" min="1" name="website" class="bm_general_input form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="website" value="{{ old('website') }}">
                            @include('alerts.feedback', ['field' => 'website'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('facebook') ? 'has-danger' : '' }}">
                            <label for="facebook" class="bm_label_layout">
                                <h3>Facebook</h3>
                            </label>
                            <input type="text" min="1" name="facebook" class="bm_general_input form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" placeholder="Facebook" value="{{ old('facebook') }}">
                            @include('alerts.feedback', ['field' => 'facebook'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('youtube') ? 'has-danger' : '' }}">
                            <label for="youtube" class="bm_label_layout">
                                <h3>Youtube</h3>
                            </label>
                            <input type="text" min="1" name="youtube" class="bm_general_input form-control {{ $errors->has('youtube') ? 'is-invalid' : '' }}" placeholder="Youtube" value="{{ old('youtube') }}">
                            @include('alerts.feedback', ['field' => 'youtube'])
                        </div>

                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="bm_form_group form-group {{ $errors->has('twitter') ? 'has-danger' : '' }}">
                            <label for="twitter" class="bm_label_layout">
                                <h3>Twitter</h3>
                            </label>
                            <input type="text" name="twitter" class="bm_general_input form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" placeholder="Twitter" value="{{ old('twitter') }}">
                            @include('alerts.feedback', ['field' => 'twitter'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('instagram') ? 'has-danger' : '' }}">
                            <label for="instagram" class="bm_label_layout">
                                <h3>Instagram</h3>
                            </label>
                            <input type="text" name="instagram" class="bm_general_input form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" placeholder="Instagram" value="{{ old('instagram') }}">
                            @include('alerts.feedback', ['field' => 'instagram'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('soundcloud') ? 'has-danger' : '' }}">
                            <label for="soundcloud" class="bm_label_layout">
                                <h3>Soundcloud</h3>
                            </label>
                            <input type="text" name="soundcloud" class="bm_general_input form-control {{ $errors->has('soundcloud') ? 'is-invalid' : '' }}" placeholder="Soundcloud" value="{{ old('soundcloud') }}">
                            @include('alerts.feedback', ['field' => 'soundcloud'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('spotify') ? 'has-danger' : '' }}"">
                            <label for=" spotify" class="bm_label_layout">
                            <h3>Spotify</h3>
                            </label>
                            <input type="text" name="spotify" class="bm_general_input form-control {{ $errors->has('spotify') ? 'is-invalid' : '' }}" placeholder="Spotify" value="{{ old('spotify') }}">
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
                                                    <label for="description" class="bm_label_layout">
                                                        <h3>Description</h3>
                                                    </label>
                                                    <textarea id="description" name="description" class="bm_textarea_layout form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description">{{ old('description') }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'description'])

                                                    <button type="submit" class="btn btn-info">Add</button>
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
