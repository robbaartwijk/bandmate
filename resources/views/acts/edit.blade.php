@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Edit act</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="{{ route('acts.update', $act->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name">
                                    <h4>Name</h4>
                                </label>
                                <input type="text" name="name"
                                    class="form-control
                                    {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ $act->name }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <div class="form-group {{ $errors->has('number_of_members') ? 'has-danger' : '' }}">
                                <label for="number_of_members">
                                    <h4>Number of Members</h4>
                                </label>
                                <input type="text" name="number_of_members"
                                    class="form-control
                                    {{ $errors->has('number_of_members') ? 'is-invalid' : '' }}"
                                    placeholder="Number of members" value="{{ $act->number_of_members }}">
                                @include('alerts.feedback', ['field' => 'number_of_members'])
                            </div>

                            <div class="form-group {{ $errors->has('genre_id') ? 'has-danger' : '' }}">
                                <label for="genre_id">
                                    <h4>Genre</h4>
                                </label>
                                <select name="genre_id"
                                    class="form-control {{ $errors->has('genre_id') ? 'is-invalid' : '' }}">
                                    <option value="">Select</option>
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}"
                                            {{ $act->genre_id == $genre->id ? 'selected' : '' }}>
                                            {{ $genre->group }} - {{ $genre->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'genre_id'])
                            </div>

                            <div
                                class="form-group
                                {{ $errors->has('rehearsal_room') ? 'has-danger' : '' }}">
                                <label for="rehearsal_room">
                                    <h4>Rehearsal Room</h4>
                                </label>
                                <select name="rehearsal_room"
                                    class="form-control {{ $errors->has('rehearsal_room') ? 'is-invalid' : '' }}">
                                    <option value="1" {{ $act->rehearsal_room == 1 ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="0" {{ $act->rehearsal_room == 0 ? 'selected' : '' }}>No</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'rehearsal_room'])
                            </div>

                            <div class="form-group {{ $errors->has('website') ? 'has-danger' : '' }}">
                                <label for="website">
                                    <h4>Website</h4>
                                </label>
                                <input type="text" min="1" name="website"
                                    class="form-control
                                {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                    placeholder="Website" value="{{ $act->website }}">
                                @include('alerts.feedback', ['field' => 'website'])
                            </div>

                            <div class="form-group {{ $errors->has('active') ? 'has-danger' : '' }}">
                                <label for="active">
                                    <h4>Active</h4>
                                </label>
                                <select name="active"
                                    class="form-control {{ $errors->has('active') ? 'is-invalid' : '' }}">
                                    <option value="1" {{ $act->active == 1 ? 'selected' : '' }}>Yes
                                    </option>
                                    <option value="0" {{ $act->active == 0 ? 'selected' : '' }}>No</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'active'])
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                                <label for="email">
                                    <h4>Email</h4>
                                </label>
                                <input type="text" name="email"
                                    class="form-control
                                    {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    placeholder="Email" value="{{ $act->email }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>

                            <div class="form-group {{ $errors->has('phone') ? 'has-danger' : '' }}">
                                <label for="phone">
                                    <h4>Phone</h4>
                                </label>
                                <input type="text" name="phone"
                                    class="form-control
                                    {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                    placeholder="Phone" value="{{ $act->phone }}">
                                @include('alerts.feedback', ['field' => 'phone'])
                            </div>

                            <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }}">
                                <label for="description">
                                    <h4>Description</h4>
                                </label>
                                <br>
                                <textarea id="description" name="description" class="{{ $errors->has('description') ? 'is-invalid' : '' }}"
                                    placeholder="Description">{{ $act->description }}</textarea>
                                @include('alerts.feedback', ['field' => 'description'])
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('acts.index') }}" class="btn btn-danger">Back</a>
                        </form>

                        @include('alerts.feedback', ['field' => 'name'])

                    </div>
                </div>
            </div>
        @endsection
