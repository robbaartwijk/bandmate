@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Show user</b></h3>
            </div>

            <div class="row">
                <div class="col-lg-8">

                    <div class="card-body text-primary">

                        @if (!empty($user->image))
                        <div style="float: left; margin-right: 20px;">
                            <img src="{{ asset('/storage/' . $user->image->id . '/' . $user->image->file_name) }}" class="img-fluid bm_image">
                        </div>
                        @else
                        <div style="float: left; margin-right: 20px;">
                            <img src="{{ asset('storage/defaults/defaultuser.jpg') }}" style="width:480px; height:480px;" class="img-fluid bm_image">
                        </div>
                        @endif

                        <h3><b>Name : </b>{{ $user->name }}</h3>
                        <h4><b>Stage name : </b>{{ $user->stage_name }}</h4>
                        <h4><b>Street : </b>{{ $user->street}} {{ $user->street_number}}</h4>
                        <h4><b>Zip : </b>{{ $user->zip}}</h4>
                        <h4><b>City : </b>{{ $user->city}}</h4>
                        <h4><b>State : </b>{{ $user->state}}</h4>
                        <h4><b>Country : </b>{{ $user->country}}</h4>
                        <h4><b>Phone : </b>{{ $user->phone}}</h4>
                        <h4><b>Email : </b> <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></h4>
                        <h4><b>Website : </b><a href="{{ $user->website }}">{{ $user->website }}</a></h4>
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body text-primary">
                            <h3><b>Notifications</b></h3>
                            <h4><b>All notifications : </b>{{ $user->email_notification_all ? 'Yes' : 'No' }}</h4>
                            <h4><b>Acts notifications : </b>{{ $user->email_notification_acts ? 'Yes' : 'No' }}</h4>
                            <h4><b>Vacancies notifications : </b>{{ $user->email_notification_vacancies ? 'Yes' : 'No' }}</h4>
                            <h4><b>Available musicians notifications : </b>{{ $user->email_notification_availablemusicians ? 'Yes' : 'No' }}</h4>
                            <h4><b>Rehearsal rooms notifications : </b>{{ $user->email_notification_rehearsalrooms ? 'Yes' : 'No' }}</h4>
                            <h4><b>Available venues notifications : </b>{{ $user->email_notification_venues ? 'Yes' : 'No' }}</h4>
                            <h4><b>Available agencies notifications : </b>{{ $user->email_notification_agencies ? 'Yes' : 'No' }}</h4>
                            <h4><b>Receive newsletter : </b>{{ $user->email_notification_newsletter ? 'Yes' : 'No' }}</h4>
                            <h4><b>Date added : </b>{{ $user->created_at }}</h4>
                            <h4><b>Date last update : </b>{{ $user->updated_at }}</h4>
                        </div>
                    </div>
                </div>

            </div>

            <header>
                <h4 style="margin-top: 40px; margin-left: 20px;"><b>Acts</b></h4>
            </header>

            <div style="margin-left: 20px;" class="table-responsive">
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
                <h4 style="margin-top: 40px; margin-left: 20px;"><b>Rehearsal rooms</b></h4>
            </header>

            <div  style="margin-left: 20px;" class="table-responsive">
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
                <h4 style="margin-top: 40px; margin-left: 20px;"><b>Vacancies</b></h4>
            </header>

            <div style="margin-left: 20px;" class="table-responsive">
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

            <header>
                <h4 style="margin-top: 40px; margin-left: 20px;"><b>Available notifications</b></h4>
            </header>

            <div style="margin-left: 20px;" class="table-responsive">
                <table class="table tablesorter" id="">
                    <thead class=" text-primary">
                        <tr>
                            <th>Name</th>
                            <th>Instrument</th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th>Available from</th>
                            <th>Available until</th>
                            <th>Date added</th>
                            <th>Date last update</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($user->availablemusicians->isEmpty())
                        <tr>
                            <td colspan="4">No available musician notifications found</td>
                        </tr>
                        @else

                        @foreach ($user->availablemusicians as $musician)
                        <tr>
                            <td><a href="{{ route('availablemusicians.show', $musician->id) }}">{{ $musician->user->name }}</a>
                            </td>

                            <td>{{ $musician->instrument->name }}</td>
                            <td>{{ $musician->genre->name }}</td>

                            <td><a href="{{ route('availablemusicians.show', $musician->id) }}">{{ Str::limit($musician->description, 30) }}</a></td>
                            </td>

                            <td>{{ $musician->available_from }}</td>
                            <td>{{ $musician->available_until }}</td>

                            <td>{{ $musician->created_at }}</td>
                            <td>{{ $musician->updated_at }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>


        </div>
        @endsection
