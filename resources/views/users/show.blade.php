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
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">danger</a>
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
                    @if ($acts->isEmpty())
                        <tr>
                            <td colspan="7">No acts found</td>
                        </tr>
                    @else
                        @foreach ($acts as $act)
                            <tr>
                                <td><a href="{{ route('acts.show', $act->id) }}">{{ $act->name }}</a></td>
                                <td>{{ $act->genre }}</td>
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
                    @if ($rehearsalrooms->isEmpty())
                        <tr>
                            <td colspan="7">No rehearsal rooms found</td>
                        </tr>
                    @else
                        @foreach ($rehearsalrooms as $rehearsalroom)
                            <tr>
                                <td><a
                                        href="{{ route('rehearsalrooms.show', $rehearsalroom->id) }}">{{ $rehearsalroom->name }}</a>
                                </td>
                                <td>{{ $rehearsalroom->address }}</td>
                                <td>{{ $rehearsalroom->city }}</td>
                                <td><a href="{{ $rehearsalroom->website }}">{{ $rehearsalroom->website }}</a></td>
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
                    @php
                        $hasVacancies = false;
                        foreach ($acts as $act) {
                            if (!$act->vacancies->isEmpty()) {
                                $hasVacancies = true;
                                break;
                            }
                        }
                    @endphp

                    @if (!$hasVacancies)
                        <tr>
                            <td colspan="4">No vacancies found</td>
                        </tr>
                    @else
                        @foreach ($act->vacancies as $vacancy)
                            <tr>
                                <td><a href="{{ route('acts.show', $act->id) }}">{{ $act->name }}</a></td>
                                <td><a href="{{ route('vacancies.show', $vacancy->id) }}">{{ $vacancy->description }}</a>
                                </td>
                                <td>{{ $vacancy->instrument }}</td>
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
