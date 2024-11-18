@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Edit user</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                                <label for="name">Name</label>
                                <input type="text" name="name"
                                    class="form-control
                                    {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    placeholder="Name" value="{{ $user->name }}">

                                <label for="email">Email</label>
                                <input type="text" name="email"
                                    class="form-control
                                    {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    placeholder="Email" value="{{ $user->email }}">

                                @include('alerts.feedback', ['field' => 'name'])
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
