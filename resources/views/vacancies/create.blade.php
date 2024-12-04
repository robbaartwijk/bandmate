@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"> Add vacancy</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('vacancies.store') }}" method="post">
                        @csrf

                        <div class="form-group {{ $errors->has('act_id') ? 'has-danger' : '' }}">
                            <div style="display: flex; align-items: center;">
                                <label for="act_id" style="margin-right: 10px; margin-top:10px;">
                                    <h3>Act</h3>
                                </label>
                                <select name="act_id" class="form-control {{ $errors->has('act_id') ? 'is-invalid' : '' }}" style="font-size: 13px; border: 1px solid #d7c4c4; width:400px;">
                                    <option value="">Select</option>
                                    @foreach ($acts as $act)
                                    <option value="{{ $act->id }}" {{ old('act_id') == $act->id ? 'selected' : '' }}> {{ $act->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            @include('alerts.feedback', ['field' => 'act_id'])
                        </div>

                        <div class="form-group {{ $errors->has('instrument_id') ? 'has-danger' : '' }}">
                            <div style="display: flex; align-items: center;">
                                <label for="instrument_id" style="margin-right: 10px; margin-top:10px;">
                                    <h3>Instrument</h3>
                                </label>
                                <select name="instrument_id" class="form-control {{ $errors->has('instrument_id') ? 'is-invalid' : '' }}" style="font-size: 13px; border: 1px solid #d7c4c4; width:310px;">
                                    <option value="">Select</option>
                                    @foreach ($instruments as $instrument)
                                    <option value="{{ $instrument->id }}" {{ old('instrument_id') == $instrument->id ? 'selected' : '' }}>{{ $instrument->type }} - {{ $instrument->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div>
                            <label for="description">
                                <h4>Description</h4>
                            </label>
                            <br>
                            <textarea id="description" name="description" class="{{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description">{{ old('description') }}</textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>

                        <button type="submit" class="btn btn-info">Add</button>
                        <a href="{{ route('vacancies.index') }}" class="btn btn-danger">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
