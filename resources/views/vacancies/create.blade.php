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

                        <div class="form-group
                        {{ $errors->has('act_id') ? 'has-danger' : '' }}">
                            <label for="act_id">
                                <h4>Act</h4>
                            </label>
                            <select name="act_id" class="form-control {{ $errors->has('act_id') ? 'is-invalid' : '' }}">
                                <option value="">Select</option>
                                @foreach ($acts as $act)
                                <option value="{{ $act->id }}" {{ old('act_id') == $act->id ? 'selected' : '' }}>{{ $act->type }} -
                                    {{ $act->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'act_id'])
                        </div>

                        <div class="form-group
                        {{ $errors->has('instrument_id') ? 'has-danger' : '' }}">
                            <label for="instrument_id">
                                <h4>Instrument</h4>
                            </label>
                            <select name="instrument_id" class="form-control {{ $errors->has('instrument_id') ? 'is-invalid' : '' }}">
                                <option value="">Select</option>
                                @foreach ($instruments as $instrument)
                                <option value="{{ $instrument->id }}" {{ old('instrument_id') == $instrument->id ? 'selected' : '' }}>{{ $instrument->type }} -
                                    {{ $instrument->name }}</option>
                                @endforeach
                            </select>
                            @include('alerts.feedback', ['field' => 'instrument_id'])
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
                        <a href="{{ route('acts.index') }}" class="btn btn-danger">Back</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
