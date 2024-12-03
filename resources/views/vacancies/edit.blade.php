@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"> Edit vacancy</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <form action="{{ route('vacancies.update', $vacancy->id) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">

                            <div class="form-group {{ $errors->has('act_id') ? 'has-danger' : '' }}">
                                <label for="act_id">
                                    <h3>Act</h3>
                                </label>
                                <select name="act_id" class="form-control {{ $errors->has('act_id') ? 'is-invalid' : '' }}">
                                    <option value="">Select</option>
                                    @foreach ($acts as $act)
                                    <option value="{{ $act->id }}" {{ $act->id == $vacancy->act_id ? 'selected' : '' }}>
                                        {{ $act->name }}
                                    </option>

                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'act_id'])
                            </div>
                            
                            <div class="form-group {{ $errors->has('instrument_id') ? 'has-danger' : '' }}">
                                <label for="instrument_id">
                                    <h3>Instrument</h3>
                                </label>
                                <select name="instrument_id" class="form-control {{ $errors->has('instrument_id') ? 'is-invalid' : '' }}">
                                    <option value="">Select</option>
                                    @foreach ($instruments as $instrument)
                                    <option value="{{ $instrument->id }}" {{ $vacancy->instrument_id == $instrument->id ? 'selected' : '' }}>
                                        {{ $instrument->type }} - {{ $instrument->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'instrument_id'])
                            </div>
                            ]
                            <div>
                                <label for="description">
                                    <h4>Description</h4>
                                </label>
                                <br>
                                <textarea id="description" name="description" class="{{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description">{{ old('description', $vacancy->description) }}</textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>


                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('vacancies.index') }}" class="btn btn-danger">Back</a>

                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
