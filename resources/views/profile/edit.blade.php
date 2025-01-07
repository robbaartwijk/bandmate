@extends('layouts.app', ['page' => __('User profile'), 'pageSlug' => 'userprofile'])

@section('content')

<div class="col-container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                @if (session('status'))
                <div class="alert alert-success" role="alert" id="status-alert">
                    {{ session('status') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('status-alert').style.display = 'none';
                    }, 1000);

                </script>
                @endif

                <div class="card-header">
                    <h3 class="card-title"><b>Edit profile</h3>
                </div>

                <div class="bm_row_layout row">


                    <div class="col-lg-6">

                        <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout_small">
                                            <h4>Full name</h4>
                                        </label>
                                        <input type="text" name="name" class="bm_general_input_small form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ old('name', $user->name) }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('first_name') ? 'has-danger' : '' }}">
                                        <label for="first_name" class="bm_label_layout_small">
                                            <h4>First name</h4>
                                        </label>
                                        <input type="text" name="first_name" class="bm_general_input_small form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" placeholder="First name" value="{{ $user->first_name }}">
                                        @include('alerts.feedback', ['field' => 'first_name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('last_name') ? 'has-danger' : '' }}">
                                        <label for="last_name" class="bm_label_layout_small">
                                            <h4>Last name</h4>
                                        </label>
                                        <input type="text" name="last_name" class="bm_general_input_small form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" placeholder="Last name" value="{{ $user->last_name }}">
                                        @include('alerts.feedback', ['field' => 'last_name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('stage_name') ? 'has-danger' : '' }}">
                                        <label for="stage_name" class="bm_label_layout_small">
                                            <h4>Stage name</h4>
                                        </label>
                                        <input type="text" name="stage_name" class="bm_general_input_small form-control {{ $errors->has('stage_name') ? 'is-invalid' : '' }}" placeholder="Stage name" value="{{ $user->stage_name }}">
                                        @include('alerts.feedback', ['field' => 'stage_name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                                        <label for="email" class="bm_label_layout_small">
                                            <h4>Email</h4>
                                        </label>
                                        <input type="text" min="1" name="email" class="bm_general_input_small form-control
                                    {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Email" value="{{ $user->email }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('street') ? 'has-danger' : '' }}">
                                        <label for="street" class="bm_label_layout_small">
                                            <h4>Street</h4>
                                        </label>
                                        <input type="text" name="street" class="bm_general_input_small form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" placeholder="Street" value="{{ $user->street }}">
                                        @include('alerts.feedback', ['field' => 'street'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('street_number') ? 'has-danger' : '' }}">
                                        <label for="street_number" class="bm_label_layout_small">
                                            <h4>Street number</h4>
                                        </label>
                                        <input type="text" name="street_numberf" class="bm_general_input_small form-control {{ $errors->has('street_number') ? 'is-invalid' : '' }}" placeholder="Street_number" value="{{ $user->street_number }}">
                                        @include('alerts.feedback', ['field' => 'street_number'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('zip') ? 'has-danger' : '' }}">
                                        <label for="zip" class="bm_label_layout_small">
                                            <h4>Zip</h4>
                                        </label>
                                        <input type="text" name="phone" class="bm_general_input_small form-control {{ $errors->has('zip') ? 'is-invalid' : '' }}" placeholder="Zip" value="{{ $user->zip }}">
                                        @include('alerts.feedback', ['field' => 'zip'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('city') ? 'has-danger' : '' }}">
                                        <label for="city" class="bm_label_layout_small">
                                            <h4>City</h4>
                                        </label>
                                        <input type="text" name="city" class="bm_general_input_small form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" placeholder="City" value="{{ $user->city }}">
                                        @include('alerts.feedback', ['field' => 'city'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('state') ? 'has-danger' : '' }}">
                                        <label for="state" class="bm_label_layout_small">
                                            <h4>State</h4>
                                        </label>
                                        <input type="text" name="state" class="bm_general_input_small form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" placeholder="State" value="{{ $user->state }}">
                                        @include('alerts.feedback', ['field' => 'state'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('country') ? 'has-danger' : '' }}">
                                        <label for="country" class="bm_label_layout_small">
                                            <h4>Country</h4>
                                        </label>
                                        <input type="text" name="country" class="bm_general_input_small form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" placeholder="Country" value="{{ $user->country }}">
                                        @include('alerts.feedback', ['field' => 'country'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                        <label for="phone" class="bm_label_layout_small">
                                            <h4>Phone</h4>
                                        </label>
                                        <input type="text" name="phone" class="bm_general_input_small form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Phone" value="{{ $user->phone }}">
                                        @include('alerts.feedback', ['field' => 'phone'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                                        <label for="website" class="bm_label_layout_small">
                                            <h4>Website</h4>
                                        </label>
                                        <input type="text" name="website" class="bm_general_input_small form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" placeholder="Website" value="{{ $user->website }}">
                                        @include('alerts.feedback', ['field' => 'website'])
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-lg-6">
                        <div class="card-body text-primary">
                            <div class="table-responsive">

                                    <h3>Receive email notificiations</h3>
            
                                    <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px;">

                                        <div class="bm_form_group form-group {{ $errors->has('email_notification_all') ? 'has-danger' : '' }}">
                                            <label for="email_notification_all" class="bm_label_layout_small">
                                                <h4>All emails</h4>
                                            </label>
                                            <input type="checkbox" name="email_notification_all" class="bm_general_input_small form-control {{ $errors->has('email_notification_all') ? 'is-invalid' : '' }}" style="position: absolute; right: 0;" {{ $user->email_notification_all ? 'checked' : 'unchecked' }}>
                                            @include('alerts.feedback', ['field' => 'email_notification_all'])
                                        </div>

                                        <div class="bm_form_group form-group {{ $errors->has('email_notification_acts') ? 'has-danger' : '' }}">
                                            <label for="email_notification_acts" class="bm_label_layout_small">
                                                <h4>New registered acts</h4>
                                            </label>
                                            <input type="checkbox" name="email_notification_acts" class="bm_general_input_small form-control {{ $errors->has('email_notification_acts') ? 'is-invalid' : '' }}" {{ $user->email_notification_acts ? 'checked' : 'unchecked' }}>
                                            @include('alerts.feedback', ['field' => 'email_notification_acts'])
                                        </div>

                                        <div class="bm_form_group form-group {{ $errors->has('email_notification_vacancies') ? 'has-danger' : '' }}">
                                            <label for="email_notification_vacancies" class="bm_label_layout_small">
                                                <h4>New registered vacancies</h4>
                                            </label>
                                            <input type="checkbox" name="email_notification_vacancies" class="bm_general_input_small form-control {{ $errors->has('email_notification_vacancies') ? 'is-invalid' : '' }}" {{ $user->email_notification_vacancies ? 'checked' : 'unchecked' }}>
                                            @include('alerts.feedback', ['field' => 'email_notification_vacancies'])
                                        </div>

                                        <div class="bm_form_group form-group {{ $errors->has('email_notification_availablemusicians') ? 'has-danger' : '' }}">
                                            <label for="email_notification_availablemusicians" class="bm_label_layout_small">
                                                <h4>New registered available musicians</h4>
                                            </label>
                                            <input type="checkbox" name="email_notification_availablemusicians" class="bm_general_input_small form-control {{ $errors->has('email_notification_availablemusicians') ? 'is-invalid' : '' }}" {{ $user->email_notification_availablemusicians ? 'checked' : 'unchecked' }}>
                                            @include('alerts.feedback', ['field' => 'email_notification_availablemusicians'])
                                        </div>
                                        
                                        <div class="bm_form_group form-group {{ $errors->has('email_notification_rehearsalrooms') ? 'has-danger' : '' }}">
                                            <label for="email_notification_rehearsalrooms" class="bm_label_layout_small">
                                                <h4>New registered rehearsal rooms</h4>
                                            </label>
                                            <input type="checkbox" name="email_notification_rehearsalrooms" class="bm_general_input_small form-control {{ $errors->has('email_notification_rehearsalrooms') ? 'is-invalid' : '' }}" {{ $user->email_notification_rehearsalrooms ? 'checked' : '' }}>
                                            @include('alerts.feedback', ['field' => 'email_notification_rehearsalrooms'])
                                        </div>


                                        <div class="bm_form_group form-group {{ $errors->has('email_notification_venues') ? 'has-danger' : '' }}">
                                            <label for="email_notification_venues" class="bm_label_layout_small">
                                                <h4>New registered venues</h4>
                                            </label>
                                            <input type="checkbox" name="email_notification_venues" class="bm_general_input_small form-control {{ $errors->has('email_notification_venues') ? 'is-invalid' : '' }}" {{ $user->email_notification_venues ? 'checked' : '' }}>
                                            @include('alerts.feedback', ['field' => 'email_notification_venues'])
                                        </div>

                                        <div class="bm_form_group form-group {{ $errors->has('email_notification_agencies') ? 'has-danger' : '' }}">
                                            <label for="email_notification_agencies" class="bm_label_layout_small">
                                                <h4>New registered agencies</h4>
                                            </label>
                                            <input type="checkbox" name="email_notification_agencies" class="bm_general_input_small form-control {{ $errors->has('email_notification_agencies') ? 'is-invalid' : '' }}" {{ $user->email_notification_agencies ? 'checked' : '' }}>
                                            @include('alerts.feedback', ['field' => 'email_notification_agencies'])
                                        </div>

                                        <div class="bm_form_group form-group {{ $errors->has('email_notification_newsletter') ? 'has-danger' : '' }}">
                                            <label for="email_notifiemail_notification_newslettercation_newsletter" class="bm_label_layout_small">
                                                <h4>Newsletters</h4>
                                            </label>
                                            <input type="checkbox" name="email_notification_newsletter" class="bm_general_input_small form-control {{ $errors->has('email_notification_newsletter') ? 'is-invalid' : '' }}" {{ $user->email_notification_newsletter ? 'checked' : '' }}>
                                            @include('alerts.feedback', ['field' => 'email_notification_newsletter'])
                                        </div>

                                    </div>
                            </div>

                            <h3>Upload your own avatar</h3>

                            <div class="row bm_upload_box">
                                {{-- <label class="bm_upload_label" for="AvatarThumbnailPic"><h4>Avatar</h4></label> --}}
                                @if (!empty($user->avatar))
                                <img src="{{ asset('/storage/' . $user->avatar->id . '/' . $user->avatar->file_name) }}" class="bm_zoom thumbnail" style="width: 100px; height: 100px;">
                            @endif
                                <input type="file" class="bm_upload btn btn-info" id="AvatarThumbnailPic" name="AvatarThumbnailPic" accept="image/*" onchange="validateFileSize(this)">
                                @include('alerts.feedback', ['field' => 'AvatarThumbnailPic'])

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-container">
                <div class="col-lg-12">
                    <div class="card-body text-primary">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="card-body text-primary">

                                        <div class="table-responsive">

                                            <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}" style="position: absolute; left: 0px;">
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
