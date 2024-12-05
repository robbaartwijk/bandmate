@extends('layouts.app', ['page' => __('Vanancies'), 'pageSlug' => 'vacancies'])

@section('content')

<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<div class="col-container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit vacancy</h3>
                </div>

                <div class="bm_row_layout row">
                    <div class="col-lg-5">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('vacancies.update', $vacancy->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    
                                    <div class="bm_form_group form-group {{ $errors->has('act_id') ? 'has-danger' : '' }}">
                                        <label for="act_id" class="bm_label_layout">
                                            <h3>Act</h3>
                                        </label>
                                        <select name="act_id" class="bm_general_input form-control {{ $errors->has('act_id') ? 'is-invalid' : '' }}">
                                            <option value="">Select</option>
                                            @foreach ($acts as $act)
                                            <option value="{{ $act->id }}" {{ $vacancy->act_id == $act->id ? 'selected' : '' }}>
                                                {{ $act->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'act_id'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('instrument_id') ? 'has-danger' : '' }}">
                                        <label for="instrument_id" class="bm_label_layout">
                                            <h3>Instrument</h3>
                                        </label>
                                        <select name="instrument_id" class="bm_general_input form-control {{ $errors->has('instrument_id') ? 'is-invalid' : '' }}">
                                            <option value="">Select</option>
                                            @foreach ($instruments as $instrument)
                                            <option value="{{ $instrument->id }}" {{ $vacancy->instrument_id == $instrument->id ? 'selected' : '' }}>
                                                {{ $instrument->name }} -  {{ $instrument->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @include('alerts.feedback', ['field' => 'instrument_id'])
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
                                                    <textarea id="description" name="description" class="bm_textarea_layout form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description">{{ $act->description }}</textarea>
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
