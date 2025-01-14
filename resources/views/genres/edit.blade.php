@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')

<div class="col-container">

    <div class="row">
        <div class="col-md-12">
            <div class="bm_card bm_card_height_medium card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit genre</h3>
                </div>

                <div class="bm_row_layout row" style="height: 100vh;">
                    <div class="col-lg-5">

                        <div class="card-body text-primary">

                            <div class="table-responsive">

                                <form action="{{ route('genres.update', $genre->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Name</h3>
                                        </label>
                                        <input type="text" name="name" class="bm_general_input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Name" value="{{ $genre->name }}">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('group') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout">
                                            <h3>Group</h3>
                                        </label>
                                        <input type="text" name="group" class="bm_general_input form-control {{ $errors->has('group') ? 'is-invalid' : '' }}" placeholder="Group" value="{{ $genre->group }}">
                                        @include('alerts.feedback', ['field' => 'group'])
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
                                                    <textarea id="description" name="description" class="bm_textarea_layout form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" placeholder="Description">{{ $genre->description }}</textarea>
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
    @endsection
