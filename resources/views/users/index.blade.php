@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Users index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <div class="float-right">

                            <form action="{{ route('users.index') }}" method="get">
                                <div class="input-group no-border">
                                    <input type="text" name="search" value="{{ request()->search }}"
                                        class="form-control" placeholder="Search...">
                                    <a href="{{ route('users.index', ['sort' => 'name']) }}" class="btn btn-secondary">Sort
                                        by name</a>
                                    <a href="{{ route('users.index', ['sort' => 'email']) }}" class="btn btn-secondary">Sort
                                        by email</a>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert" id="status-alert">
                        {{ session('status') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('status-alert').style.display = 'none';
                        }, 2000);
                    </script>
                @endif

                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Acts</th>
                            <th>Rehearsal rooms</th>
                            <th>Vacancies</th>
                            <th>Date added</th>
                            <th>Date last update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a< /td>

                                <td>{{ $user->acts_count }}</td>
                                <td>{{ $user->rehearsalrooms_count }}</td>
                                <td>{{ $user->vacancies_count }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>

                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post"
                                        style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-link btn-icon btn-sm">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="float-left" style="color:white">
        {{ $users->count() }} {{ $users->count() > 1 ? 'users found' : 'user found' }}
    </div>

    </div>
    </div>
@endsection
