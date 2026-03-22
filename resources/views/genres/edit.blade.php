@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')

<div class="col-container">
    <div class="row">
        <div class="col-md-12">
            <div class="bm_card card">
                <div class="card-header">
                    <h3 class="card-title"><b>Edit genre</b></h3>
                </div>

                <div class="bm_row_layout row">

                    <form action="{{ route('genres.update', $genre->id) }}" method="post" style="width:100%;">
                        @csrf
                        @method('put')

                        <div class="row">

                            <div class="col-12 col-lg-4">
                                <div class="card-body text-primary">

                                    <div class="bm_form_group form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                        <label for="name" class="bm_label_layout"><h3>Name</h3></label>
                                        <input type="text" name="name"
                                            class="bm_general_input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            placeholder="Name" value="{{ $genre->name }}" style="width:100%;">
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>

                                    <div class="bm_form_group form-group {{ $errors->has('group') ? 'has-danger' : '' }}">
                                        <label for="group" class="bm_label_layout"><h3>Group</h3></label>
                                        <input type="text" name="group"
                                            class="bm_general_input form-control {{ $errors->has('group') ? 'is-invalid' : '' }}"
                                            placeholder="Group" value="{{ $genre->group }}" style="width:100%;">
                                        @include('alerts.feedback', ['field' => 'group'])
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <div class="card-body text-primary">
                                    <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                                        <label for="description" class="bm_label_layout"><h3>Description</h3></label>
                                        <textarea id="description" name="description"
                                            class="bm_textarea_layout form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
                                            placeholder="Description">{{ $genre->description }}</textarea>
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