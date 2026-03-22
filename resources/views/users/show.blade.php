@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b>Show user</b></h3>
            </div>

            {{-- Profile info + image: stack on mobile --}}
            <div class="row">
                <div class="col-12 col-md-auto mb-3">
                    @if (!empty($user->image))
                    <img src="{{ asset('/storage/' . $user->image->id . '/' . $user->image->file_name) }}"
                        class="img-fluid bm_image" style="max-width:250px; width:100%; height:auto;">
                    @else
                    <img src="{{ asset('storage/defaults/defaultuser.jpg') }}"
                        class="img-fluid bm_image" style="max-width:250px; width:100%; height:auto;">
                    @endif
                </div>

                <div class="col-12 col-md">
                    <div class="card-body text-primary">
                        <h3><b>Name : </b>{{ $user->name }}</h3>
                        <h4><b>Stage name : </b>{{ $user->stage_name }}</h4>
                        <h4><b>Street : </b>{{ $user->street }} {{ $user->street_number }}</h4>
                        <h4><b>Zip : </b>{{ $user->zip }}</h4>
                        <h4><b>City : </b>{{ $user->city }}</h4>
                        <h4><b>State : </b>{{ $user->state }}</h4>
                        <h4><b>Country : </b>{{ $user->country }}</h4>
                        <h4><b>Phone : </b>{{ $user->phone }}</h4>
                        <h4><b>Email : </b><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></h4>
                        <h4><b>Website : </b><a href="{{ $user->website }}" target="_blank" style="word-break:break-all;">{{ $user->website }}</a></h4>
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>

            {{-- Notifications --}}
            <div class="row">
                <div class="col-12">
                    <div class="card-body text-primary">
                        <h3><b>Notifications</b></h3>
                        <h4><b>All notifications : </b>{{ $user->email_notification_all ? 'Yes' : 'No' }}</h4>
                        <h4><b>Acts notifications : </b>{{ $user->email_notification_acts ? 'Yes' : 'No' }}</h4>
                        <h4><b>Vacancies notifications : </b>{{ $user->email_notification_vacancies ? 'Yes' : 'No' }}</h4>
                        <h4><b>Available musicians notifications : </b>{{ $user->email_notification_availablemusicians ? 'Yes' : 'No' }}</h4>
                        <h4><b>Rehearsal rooms notifications : </b>{{ $user->email_notification_rehearsalrooms ? 'Yes' : 'No' }}</h4>
                        <h4><b>Venues notifications : </b>{{ $user->email_notification_venues ? 'Yes' : 'No' }}</h4>
                        <h4><b>Agencies notifications : </b>{{ $user->email_notification_agencies ? 'Yes' : 'No' }}</h4>
                        <h4><b>Receive newsletter : </b>{{ $user->email_notification_newsletter ? 'Yes' : 'No' }}</h4>
                        <br>
                        <h4><b>Date added : </b>{{ $user->created_at }}</h4>
                        <h4><b>Date last update : </b>{{ $user->updated_at }}</h4>
                    </div>
                </div>
            </div>

            {{-- Acts table --}}
            <div class="card-body text-primary">
                <h4><b>Acts</b></h4>
            </div>
            <div class="table-responsive" style="margin:0 20px 20px;">
                <table class="table tablesorter">
                    <thead class="text-primary">
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell">Genre</th>
                            <th class="d-none d-md-table-cell">Email</th>
                            <th class="d-none d-md-table-cell">Phone</th>
                            <th class="d-none d-lg-table-cell">Date added</th>
                            <th class="d-none d-lg-table-cell">Date last update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($user->acts->isEmpty())
                        <tr><td colspan="6">No acts found</td></tr>
                        @else
                        @foreach ($user->acts as $act)
                        <tr>
                            <td><a href="{{ route('acts.show', $act->id) }}">{{ $act->name }}</a></td>
                            <td class="d-none d-sm-table-cell">{{ $act->genre_name }}</td>
                            <td class="d-none d-md-table-cell"><a href="mailto:{{ $act->email }}">{{ $act->email }}</a></td>
                            <td class="d-none d-md-table-cell">{{ $act->phone }}</td>
                            <td class="d-none d-lg-table-cell">{{ $act->created_at }}</td>
                            <td class="d-none d-lg-table-cell">{{ $act->updated_at }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Rehearsal rooms table --}}
            <div class="card-body text-primary">
                <h4><b>Rehearsal rooms</b></h4>
            </div>
            <div class="table-responsive" style="margin:0 20px 20px;">
                <table class="table tablesorter">
                    <thead class="text-primary">
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell">City</th>
                            <th class="d-none d-md-table-cell">Email</th>
                            <th class="d-none d-lg-table-cell">Date added</th>
                            <th class="d-none d-lg-table-cell">Date last update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($user->rehearsalrooms->isEmpty())
                        <tr><td colspan="5">No rehearsal rooms found</td></tr>
                        @else
                        @foreach ($user->rehearsalrooms as $rehearsalroom)
                        <tr>
                            <td><a href="{{ route('rehearsalrooms.show', $rehearsalroom->id) }}">{{ $rehearsalroom->name }}</a></td>
                            <td class="d-none d-sm-table-cell">{{ Str::limit($rehearsalroom->city, 20) }}</td>
                            <td class="d-none d-md-table-cell"><a href="mailto:{{ $rehearsalroom->email }}">{{ $rehearsalroom->email }}</a></td>
                            <td class="d-none d-lg-table-cell">{{ $rehearsalroom->created_at }}</td>
                            <td class="d-none d-lg-table-cell">{{ $rehearsalroom->updated_at }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Vacancies table --}}
            <div class="card-body text-primary">
                <h4><b>Vacancies</b></h4>
            </div>
            <div class="table-responsive" style="margin:0 20px 20px;">
                <table class="table tablesorter">
                    <thead class="text-primary">
                        <tr>
                            <th>Act</th>
                            <th class="d-none d-sm-table-cell">Instrument</th>
                            <th class="d-none d-md-table-cell">Description</th>
                            <th class="d-none d-lg-table-cell">Date added</th>
                            <th class="d-none d-lg-table-cell">Date last update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($user->vacancies->isEmpty())
                        <tr><td colspan="5">No vacancies found</td></tr>
                        @else
                        @foreach ($user->vacancies as $vacancy)
                        <tr>
                            <td><a href="{{ route('acts.show', $vacancy->act->id) }}">{{ $vacancy->act->name }}</a></td>
                            <td class="d-none d-sm-table-cell">{{ $vacancy->instrument_name }}</td>
                            <td class="d-none d-md-table-cell"><a href="{{ route('vacancies.show', $vacancy->id) }}">{{ Str::limit($vacancy->description, 30) }}</a></td>
                            <td class="d-none d-lg-table-cell">{{ $vacancy->created_at }}</td>
                            <td class="d-none d-lg-table-cell">{{ $vacancy->updated_at }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            {{-- Available musicians table --}}
            <div class="card-body text-primary">
                <h4><b>Available musician listings</b></h4>
            </div>
            <div class="table-responsive" style="margin:0 20px 20px;">
                <table class="table tablesorter">
                    <thead class="text-primary">
                        <tr>
                            <th>Instrument</th>
                            <th class="d-none d-sm-table-cell">Genre</th>
                            <th class="d-none d-md-table-cell">Description</th>
                            <th class="d-none d-lg-table-cell">Available from</th>
                            <th class="d-none d-lg-table-cell">Available until</th>
                            <th class="d-none d-xl-table-cell">Date added</th>
                            <th class="d-none d-xl-table-cell">Date last update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($user->availablemusicians->isEmpty())
                        <tr><td colspan="7">No available musician listings found</td></tr>
                        @else
                        @foreach ($user->availablemusicians as $musician)
                        <tr>
                            <td><a href="{{ route('availablemusicians.show', $musician->id) }}">{{ $musician->instrument->name }}</a></td>
                            <td class="d-none d-sm-table-cell">{{ $musician->genre->name }}</td>
                            <td class="d-none d-md-table-cell">{{ Str::limit($musician->description, 30) }}</td>
                            <td class="d-none d-lg-table-cell">{{ $musician->available_from }}</td>
                            <td class="d-none d-lg-table-cell">{{ $musician->available_until }}</td>
                            <td class="d-none d-xl-table-cell">{{ $musician->created_at }}</td>
                            <td class="d-none d-xl-table-cell">{{ $musician->updated_at }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection