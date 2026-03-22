@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')

<div class="col-container">
    <div class="row">
        <div class="col-md-12">
            <div class="bm_card card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit vacancy</b></h3>
                </div>

                <div class="bm_row_layout row">

                    <form action="{{ route('vacancies.update', $vacancy->id) }}" method="post" style="width:100%;">
                        @csrf
                        @method('put')

                        <div class="row">

                            {{-- Act + Instrument selects --}}
                            <div class="col-12 col-lg-4">
                                <div class="card-body text-primary">

                                    <div class="bm_form_group form-group {{ $errors->has('act_id') ? 'has-danger' : '' }}">
                                        <label for="act_id" class="bm_label_layout"><h3>Act</h3></label>
                                        <select name="act_id" class="bm_general_input form-control {{ $errors->has('act_id') ? 'is-invalid' : '' }}" style="width:100%;">
                                            <option value="{{ $vacancy->act_id }}">{{ $vacancy->act_name }}</option>
                                            @foreach ($acts as $act)
                                            <option value="{{ $act->id }}" {{ $vacancy->act_id == $act->id ? 'selected' : '' }}>
                                                {{ $act->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'act_id'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('instrument_id') ? 'has-danger' : '' }}">
                                        <label for="instrument_id" class="bm_label_layout"><h3>Instrument</h3></label>
                                        <select name="instrument_id" class="bm_general_input form-control {{ $errors->has('instrument_id') ? 'is-invalid' : '' }}" style="width:100%;">
                                            <option value="">Select</option>
                                            @foreach ($instruments as $instrument)
                                            <option value="{{ $instrument->id }}" {{ $vacancy->instrument_id == $instrument->id ? 'selected' : '' }}>
                                                {{ $instrument->type }} - {{ $instrument->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'instrument_id'])
                                    </div>

                                </div>
                            </div>

                            {{-- Description full width --}}
                            <div class="col-12">
                                <div class="card-body text-primary">
                                    <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                                        <label for="description" class="bm_label_layout"><h3>Description</h3></label>
                                        <textarea id="description" name="description"
                                            class="bm_textarea_layout form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                            placeholder="Description">{{ $vacancy->description }}</textarea>
                                        @include('alerts.feedback', ['field' => 'description'])

                                        <button type="submit" class="btn btn-info">Update</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection