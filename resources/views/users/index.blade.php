@php
$authUser = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b>Users index</b></h3>
            </div>
            <div class="card-body">

                <div style="display:flex; flex-wrap:wrap; align-items:flex-start; gap:8px; margin-bottom:12px; justify-content:flex-end;">
                    <form action="{{ route('users.index') }}" method="get" style="display:flex; flex-wrap:wrap; gap:8px; align-items:center;">

                        <select name="selectrecords" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:120px;" onchange="this.form.submit()">
                            <option value="25"  {{ !request()->selectrecords || request()->selectrecords == '25'  ? 'selected' : '' }}>25 users</option>
                            <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 users</option>
                            <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 users</option>
                        </select>

                        <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="width:180px; min-width:120px;" placeholder="Search...">

                        <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:160px;" onchange="this.form.submit()">
                            <option value="name"       {{ request()->sort == 'name'       ? 'selected' : '' }}>Sort by name</option>
                            <option value="email"      {{ request()->sort == 'email'      ? 'selected' : '' }}>Sort by email</option>
                            <option value="created_at" {{ request()->sort == 'created_at' ? 'selected' : '' }}>Sort by date added</option>
                            <option value="updated_at" {{ request()->sort == 'updated_at' ? 'selected' : '' }}>Sort by date last update</option>
                        </select>

                        <button type="submit" class="btn btn-secondary">
                            <i class="nc-icon nc-zoom-split"></i>
                        </button>

                    </form>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert" id="status-alert">
                    {{ session('status') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('status-alert').style.display = 'none';
                    }, 1000);
                </script>
                @endif

                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Name</th>
                                <th class="d-none d-md-table-cell">Email</th>
                                <th class="d-none d-sm-table-cell">Acts</th>
                                <th class="d-none d-lg-table-cell">Rooms</th>
                                <th class="d-none d-lg-table-cell">Vacancies</th>
                                <th class="d-none d-lg-table-cell">Available</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                @if ($user->is_admin)
                                <td><a href="{{ route('users.show', $user->id) }}" style="color:white;">{{ $user->name }}</a></td>
                                @else
                                <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
                                @endif
                                <td class="d-none d-md-table-cell"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                <td class="d-none d-sm-table-cell">{{ $user->acts_count }}</td>
                                <td class="d-none d-lg-table-cell">{{ $user->rehearsalrooms_count }}</td>
                                <td class="d-none d-lg-table-cell">{{ $user->vacancies_count }}</td>
                                <td class="d-none d-lg-table-cell">{{ $user->availablemusicians_count }}</td>
                                <td style="white-space:nowrap;">
                                    @can('update', $user)
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    @endcan
                                    @can('delete', $user)
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-link btn-icon btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this user?')">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<?php echo $users->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links(); ?>

@if($users->count() < 25)
<div class="float-left" style="color:white">
    {{ $users->count() }} {{ $users->count() > 1 ? 'users found' : 'user found' }}
</div>
@endif

@endsection