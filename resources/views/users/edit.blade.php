@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Edit user</b></h3>
            </div>
            <div class="card-body">

                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="col-12 col-lg-4">

                        <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }}">
                            <label for="name">Name</label>
                            <input type="text" name="name"
                                class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                placeholder="Name" value="{{ $user->name }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }}">
                            <label for="email">Email</label>
                            <input type="text" name="email"
                                class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                placeholder="Email" value="{{ $user->email }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection