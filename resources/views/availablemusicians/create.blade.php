@extends('layouts.app', ['page' => __('Availablemusicians'), 'pageSlug' => 'availablemusicians'])

@section('content')

<div class="col-container">

    <div class="row">

        <div class="col-md-12">
            <div class="bm_card bm_card_height_large card">
                <div class="card-header">
                    <h3 class="card-title"><b>Add available musician</b></h3>
                </div>

                <div class="bm_row_layout row">
                    <div class="col-lg-5">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('availablemusicians.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="bm_form_group form-group {{ $errors->has('musiciansname') ? 'has-danger' : '' }}">
                                        <label for="musiciansname" class="bm_label_layout">
                                            <h3>Musician name</h3>
                                        </label>
                                        <input type="text" name="musiciansname" id="musiciansname" style="color: lightgreen;" class="bm_general_input bm_display_green form-control {{ $errors->has('musiciansname') ? 'is-invalid' : '' }}" placeholder="Musician name" value="{{ $availablemusician->user->name }}" readonly>
                                        @include('alerts.feedback', ['field' => 'musiciansname'])
                                    </div>
                                    <div class="bm_form_group form-group {{ $errors->has('instrument_id') ? 'has-danger' : '' }}">
                                        <label for="instrument_id" class="bm_label_layout">
                                            <h3>Instrument</h3>
                                        </label>
                                        <select name="instrument_id" class="bm_general_input form-control {{ $errors->has('instrument_id') ? 'is-invalid' : '' }}">
                                            <option value="">Select</option>
                                            @foreach ($availablemusician->instruments as $instrument)
                                            <option value="{{ $instrument->id }}" {{ old('instrument_id') == $instrument->id ? 'selected' : '' }}> {{ $instrument->type }} - {{ $instrument->name }}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'instrument_id'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('genre_id') ? 'has-danger' : '' }}">
                                        <label for="genre_id" class="bm_label_layout">
                                            <h3>Genre</h3>
                                        </label>
                                        <select name="genre_id" class="bm_general_input form-control {{ $errors->has('genre_id') ? 'is-invalid' : '' }}">
                                            <option value="">Select</option>
                                            @foreach ($availablemusician->genres as $genre)
                                            <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}> {{ $genre->group }} - {{ $genre->name }}</option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'instrument_id'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('available_from') ? 'has-danger' : '' }}">
                                        <label for="available_from" class="bm_label_layout">
                                            <h3>Available from</h3>
                                        </label>
                                        <input type="date" name="available_from" id="available_from" class="bm_general_input form-control {{ $errors->has('available_from') ? 'is-invalid' : '' }}" value="{{ old('available_from') }}">
                                        @include('alerts.feedback', ['field' => 'available_from'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('available_until') ? 'has-danger' : '' }}">
                                        <label for="available_until" class="bm_label_layout">
                                            <h3>Available until</h3>
                                        </label>
                                        <input type="date" name="available_until" id="available_until" class="bm_general_input form-control {{ $errors->has('available_until') ? 'is-invalid' : '' }}" value="{{ old('available_until') }}">
                                        @include('alerts.feedback', ['field' => 'available_until'])
                                    </div>

                                    <div class="bm_upload_box">
                                        <label class="bm_upload_label" for="availablemusicianpic">
                                            <h3>Picture</h3>
                                        </label>
                                        <input type="file" class="bm_upload btn btn-info" id="availablemusicianpic" name="availablemusicianpic" accept="image/*">
                                        @include('alerts.feedback', ['field' => 'availablemusicianpic'])
                                    </div>
                            </div>
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
        </div>
    </div>
    </form>
</div>

<script>
    document.getElementById('availablemusicianpic').addEventListener('change', function() {
        const file = this.files[0];
        if (file.size > 1048576) { // 1MB in bytes
            alert('File size must be less than 1MB');
            this.value = '';
        }
    });

</script>

@endsection
