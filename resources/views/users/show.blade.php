@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Show user</h4>
                </div>

                <div class="card-body text-primary">
                    <h5><b>Name : </b>{{ $user->name }}</h5>
                    <h5><b>Email : </b> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></h5>
                    <h5><b>Date added : </b>{{ $user->created_at }}</h5>
                    <h5><b>Date last update : </b>{{ $user->updated_at }}</h5>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>


       <header><h4><b>Rehearsal rooms</b></h4></header>
       
        <div class="table-responsive">
        <table class="table tablesorter" id="">
            <thead class=" text-primary">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Date added</th>
                    <th>Date last update</th>
                </tr>
            </thead>
            <tbody>
                @if ($rehearsalrooms->isempty())
                    <tr>
                        <td colspan="6">No rehearsal rooms found</td>
                    </tr>
                @else
                    @foreach ($rehearsalrooms as $rehearsalroom)
                        <tr>
                            <td>{{ $rehearsalroom->name }}</td>
                            <td>{{ $rehearsalroom->address }}</td>
                            <td>{{ $rehearsalroom->city }}</td>
                            <td>{{ $rehearsalroom->created_at }}</td>
                            <td>{{ $rehearsalroom->updated_at }}</td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>


        <header><h4><b>Acts</b></h4></header>

        <div class="table-responsive">
        <table class="table tablesorter" id="">
            <thead class=" text-primary">
                <tr>
                    <th>Name</th>
                    <th>Genre</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date added</th>
                    <th>Date last update</th>
                </tr>
            </thead>
            <tbody>
                @if ($acts->isempty())
                    <tr>
                        <td colspan="6">No acts found</td>
                    </tr>
                @else
                    @foreach ($acts as $act)
                        <tr>
                            <td>{{ $act->name }}</td>
                            <td>{{ $act->genre }}</td>
                            <td>{{ $act->email }}</td>
                            <td>{{ $act->phone }}</td>
                            <td>{{ $act->created_at }}</td>
                            <td>{{ $act->updated_at }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        </div>

    @endsection
