@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')

<div class="col-container">

    <div class="row">
        <div class="col-md-12";>
            <div class="bm_card_height_large bm_card card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit act</h3>
                </div>


                <div class="bm_row_layout row">
                    <div class="col-lg-4">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('acts.update', $act->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="bm_general_input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ $act->name }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('number_of_members') ? 'has-danger' : '' }}">
                                        <label for="number_of_members" class="bm_label_layout">
                                            <h3>Members</h3>
                                        </label>
                                        <input type="number" min="1" name="number_of_members" class="bm_general_input form-control {{ $errors->has('number_of_members') ? 'is-invalid' : '' }}" placeholder="Number of Members" value="{{ $act->number_of_members }}">
                                        @include('alerts.feedback', ['field' => 'number_of_members'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('genre_id') ? 'has-danger' : '' }}">
                                        <label for="genre_id" class="bm_label_layout">
                                            <h3>Genre</h3>
                                        </label>
                                        <select name="genre_id" class="bm_general_input form-control {{ $errors->has('genre_id') ? 'is-invalid' : '' }}">
                                            <option value="">Select</option>
                                            @foreach ($genres as $genre)
                                            <option value="{{ $genre->id }}" {{ $act->genre_id == $genre->id ? 'selected' : '' }}>
                                                {{ $genre->group }} - {{ $genre->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'genre_id'])
                                    </div>

                                    <div class="form-group {{ $errors->has('rehearsal_room') ? 'has-danger' : '' }}">
                                        <label for="rehearsal_room">
                                            <h3>Rehearsal room?</h3>
                                        </label>
                                        <input type="checkbox" class="bm_checkbox_layout form-check-input" id="rehearsal_room" name="rehearsal_room" {{ $act->rehearsal_room ? 'checked' : '' }}>
                                        @include('alerts.feedback', ['field' => 'rehearsal_room'])
                                    </div>

                                    <div class="form-group {{ $errors->has('active') ? 'has-danger' : '' }}">
                                        <label for="active">
                                            <h3>Act currently active?</h3>
                                        </label>
                                        <input type="checkbox" class="bm_checkbox_layout form-check-input" id="active" name="active" {{ $act->active ? 'checked' : '' }}>
                                        @include('alerts.feedback', ['field' => 'active'])
                                    </div>

                                    <div class="bm_upload_box">
                                        <label class="bm_upload_label" for="actpic">
                                            <h3>Act picture</h3>
                                        </label>
                                        <input type="file" class="bm_upload btn btn-info" id="actpic" name="actpic" accept="image/*" onchange="validateFileSize(this)">
                                        @include('alerts.feedback', ['field' => 'actpic'])
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="bm_form_group form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                            <label for="website" class="bm_label_layout">
                                <h3>Website</h3>
                            </label>
                            <input type="text" min="1" name="website" class="bm_general_input form-control
                        {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ $act->website }}">
                            @include('alerts.feedback', ['field' => 'website'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email" class="bm_label_layout">
                                <h3>Email</h3>
                            </label>
                            <input type="text" min="1" name="email" class="bm_general_input form-control
                        {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ $act->email }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                            <label for="phone" class="bm_label_layout">
                                <h3>Phone</h3>
                            </label>
                            <input type="text" min="1" name="phone" class="bm_general_input form-control
                        {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ $act->phone }}">
                            @include('alerts.feedback', ['field' => 'phone'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('facebook') ? 'has-danger' : '' }}">
                            <label for="facebook" class="bm_label_layout">
                                <h3>Facebook</h3>
                            </label>
                            <input type="text" min="1" name="facebook" class="bm_general_input form-control
                        {{ $errors->has('facebook') ? 'is-invalid' : '' }}" placeholder="Facebook" value="{{ $act->facebook }}">
                            @include('alerts.feedback', ['field' => 'facebook'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('youtube') ? 'has-danger' : '' }}">
                            <label for="youtube" class="bm_label_layout">
                                <h3>Youtube</h3>
                            </label>
                            <input type="text" min="1" name="youtube" class="bm_general_input form-control
                        {{ $errors->has('youtube') ? 'is-invalid' : '' }}" placeholder="Youtube" value="{{ $act->youtube }}">
                            @include('alerts.feedback', ['field' => 'youtube'])
                        </div>

                    </div>

                    <div class="card-body text-primary col-lg-4">

                        <div class="bm_form_group form-group {{ $errors->has('twitter') ? 'has-danger' : '' }}">
                            <label for="twitter" class="bm_label_layout">
                                <h3>Twitter</h3>
                            </label>
                            <input type="text" min="1" name="twitter" class="bm_general_input form-control
                    {{ $errors->has('twitter') ? 'is-invalid' : '' }}" placeholder="Twitter" value="{{ $act->twitter }}">
                            @include('alerts.feedback', ['field' => 'twitter'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('instagram') ? 'has-danger' : '' }}">
                            <label for="instagram" class="bm_label_layout">
                                <h3>Instagram</h3>
                            </label>
                            <input type="text" min="1" name="instagram" class="bm_general_input form-control
                        {{ $errors->has('instagram') ? 'is-invalid' : '' }}" placeholder="Instagram" value="{{ $act->instagram }}">
                            @include('alerts.feedback', ['field' => 'instagram'])
                        </div>

                        <div class="bm_form_group form-group  {{ $errors->has('soundcloud') ? 'has-danger' : '' }}">
                            <label for="soundcloud" class="bm_label_layout">
                                <h3>Soundcloud</h3>
                            </label>
                            <input type="text" min="1" name="soundcloud" class="bm_general_input form-control
                        {{ $errors->has('soundcloud') ? 'is-invalid' : '' }}" placeholder="Soundcloud" value="{{ $act->soundcloud }}">
                            @include('alerts.feedback', ['field' => 'soundcloud'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has('spotify') ? 'has-danger' : '' }}">
                            <label for="spotify" class="bm_label_layout">
                                <h3>Spotify</h3>
                            </label>
                            <input type="text" min="1" name="spotify" class="bm_general_input form-control
                        {{ $errors->has('spotify') ? 'is-invalid' : '' }}" placeholder="Spotify" value="{{ $act->spotify }}">
                            @include('alerts.feedback', ['field' => 'spotify'])
                        </div>

                        <div class="bm_form_group form-group {{ $errors->has(' bluesky') ? 'has-danger' : '' }}"">
                            <label for=" bluesky" class="bm_label_layout">
                            <h3>Bluesky</h3>
                            </label>
                            <input type="text" name="bluesky" class="bm_general_input form-control {{ $errors->has('bluesky') ? 'is-invalid' : '' }}" placeholder="Bluesky" value="{{ $act->bluesky }}">
                            @include('alerts.feedback', ['field' => 'bluesky'])
                        </div>
                        
                        <div class="bm_form_group form-group {{ $errors->has('youtubedemo') ? 'has-danger' : '' }}"">
                            <label for=" youtubedemo" class="bm_label_layout">
                            <h3>Video</h3>
                            </label>
                            <input type="text" name="youtubedemo" class="bm_general_input form-control {{ $errors->has('youtubedemo') ? 'is-invalid' : '' }}" placeholder="Youtube Demo" value="{{ $act->youtubedemo }}">
                            @include('alerts.feedback', ['field' => 'youtubedemo'])
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
                                                    <textarea id="description" name="description" class="bm_textarea_layout form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description">{{ $act->description }}</textarea>
                                                    @include('alerts.feedback', ['field' => 'description'])

                                                    <button type="submit" class="btn btn-info">Update</button>
                                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

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

    <script>
        function validateFileSize(input) {
            const file = input.files[0];
            if (file && file.size > 1048576) {
                alert('File size must be less than 1MB');
                input.value = '';
            }
        }

    </script>

    @endsection
