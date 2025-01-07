@extends('layouts.app', ['page' => __('Instruments'), 'pageSlug' => 'instruments'])

@section('content')

<div class="col-container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit instrument</h3>
                </div>

                <div class="bm_row_layout row">
                    <div class="col-lg-4">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('instruments.update', $instrument->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="bm_general_input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ $instrument->name }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('type') ? 'has-danger' : '' }}">
                                        <label for="type" class="bm_label_layout">
                                            <h3>Type</h3>
                                        </label>
                                        <input type="text" name="type" class="bm_general_input form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" placeholder="Type" value="{{ $instrument->type }}">
                                        @include('alerts.feedback', ['field' => 'type'])
                                    </div>

                            </div>

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
@endsection
