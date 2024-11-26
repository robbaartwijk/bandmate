@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"> Show user</h3>
            </div>

            <div class="card-body text-primary">
                <h5><b>Name : </b>{{ $user->name }}</h5>
                <h5><b>Email : </b> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></h5>
                <h5><b>Date added : </b>{{ $user->created_at }}</h5>
                <h5><b>Date last update : </b>{{ $user->updated_at }}</h5>
                <a href="{{ route('users.index') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>

    <header>
        <h4><b>Acts</b></h4>
    </header>

    <div class="table-responsive">
        <table class="table tablesorter" id="">
            <thead class=" text-primary">
                <tr>
                    <th>Name</th>
                    <th>Genre</th>
                    <th>Website</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date added</th>
                    <th>Date last update</th>
                </tr>
            </thead>
            <tbody>
                @if ($user->acts->isEmpty())
                <tr>
                    <td colspan="7">No acts found</td>
                </tr>
                @else
                @foreach ($user->acts as $act)
                <tr>
                    <td><a href="{{ route('acts.show', $act->id) }}">{{ $act->name }}</a></td>
                    <td>{{ $act->genre_name}}</td>
                    <td><a href="{{ $act->website }}">{{ $act->website }}</a></td>
                    <td><a href="mailto:{{ $act->email }}">{{ $act->email }}</a></td>
                    <td>{{ $act->phone }}</td>
                    <td>{{ $act->created_at }}</td>
                    <td>{{ $act->updated_at }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <header>
        <h4><b>Rehearsal rooms</b></h4>
    </header>

    <div class="table-responsive">
        <table class="table tablesorter" id="">
            <thead class=" text-primary">
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Website</th>
                    <th>Email</th>
                    <th>Date added</th>
                    <th>Date last update</th>
                </tr>
            </thead>
            <tbody>
                @if ($user->rehearsalrooms->isEmpty())
                <tr>
                    <td colspan="7">No rehearsal rooms found</td>
                </tr>
                @else
                @foreach ($user->rehearsalrooms as $rehearsalroom)
                <tr>
                    <td><a href="{{ route('rehearsalrooms.show', $rehearsalroom->id) }}">{{ $rehearsalroom->name }}</a></td>
                    <td>{{ Str::limit($rehearsalroom->address, 20) }}</td>
                    <td>{{ Str::limit($rehearsalroom->city, 20) }}</td>
                    <td><a href="{{ $rehearsalroom->website }}">{{ Str::limit($rehearsalroom->website, 20) }}</a></td>
                    <td><a href="mailto:{{ $rehearsalroom->email }}">{{ $rehearsalroom->email }}</a></td>
                    <td>{{ $rehearsalroom->created_at }}</td>
                    <td>{{ $rehearsalroom->updated_at }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <header>
        <h4><b>Vacancies</b></h4>
    </header>

    <div class="table-responsive">
        <table class="table tablesorter" id="">
            <thead class=" text-primary">
                <tr>
                    <th>Act</th>
                    <th>Vacancy</th>
                    <th>Instrument</th>
                    <th>Date added</th>
                    <th>Date last update</th>
                </tr>
            </thead>

            <tbody>


                @if ($user->vacancies->isEmpty())
                <tr>
                    <td colspan="4">No vacancies found</td>
                </tr>
                @else
                @foreach ($user->vacancies as $vacancy)
                <tr>
                    <td><a href="{{ route('acts.show', $vacancy->act->id) }}">{{ $vacancy->act->name }}</a>
                    </td>
                    <td><a href="{{ route('vacancies.show', $vacancy->id) }}">{{ Str::limit($vacancy->description, 30) }}</a></td>
                    </td>
                    <td>{{ $vacancy->instrument_name }}</td>
                    <td>{{ $vacancy->created_at }}</td>
                    <td>{{ $vacancy->updated_at }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

</div>
@endsection
