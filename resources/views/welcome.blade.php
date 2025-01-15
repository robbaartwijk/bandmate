@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

<div class="header py-7 py-lg-8">
    <div class="container">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center" style="margin-top: 10px;">
                <div class="col-lg-8 col-md-6">
                    <p class="text-lead text-light" style="border: solid 1px; border-color: rgb(190, 190, 208);">
                        <img src="{{ asset('images/Logo2.jpg') }}" />
                    </p>
                    <br>
                    <h1 class="text-white">{{ __('Welcome to Bandmate') }}</h1>
                </div>
            </div>
        </div>

        <p>
            <h4 class="text-white">
                The best place to find your bandmates, rehearsal rooms, agencies and venues. You can use the options in the menu on the left to browse through all the available information and add your own information. You will then be able to edit the information you have entered yourself, but only browse through other users' information.
            </h4>
        </p>

        <p>
            <h4 class="text-white">
                This website is a labour of love and it is not sponsored by anyone. Your data is necessary for you to log in and for other musicians to find you, but the information will never be shared with any other person or organisation.
                The site is meant for musicians, NOT for the music business.
            </h4>
        </p>

        <p>
            <h4 class="text-white">
                If you wish to support me in paying the hosting cost of this site you can donate via Paypal by clicking on the icon below.
            </h4>
        </p>

        <div style="margin-top:50px; margin-bottom:50px; text-align: center;">
            <form action="https://www.paypal.com/donate" method="post" target="_top">
            <input type="hidden" name="business" value="48VGHAS7GVRPW" />
            <input type="hidden" name="no_recurring" value="0" />
            <input type="hidden" name="item_name" value="These donations help keep the website onine, you help yourself and your colleagues by supporting us. Thank you!" />
            <input type="hidden" name="currency_code" value="EUR" />
            <input type="image" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
            <img alt="" border="0" src="https://www.paypal.com/en_N">
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"><b>Recently added</b></h3>
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
                            <th>Band members</th>
                            <th>Description</th>
                            <th>Date added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($recentActs->isEmpty())
                        <tr>
                            <td colspan="7">No acts found</td>
                        </tr>
                        @else
                        @foreach ($recentActs as $act)
                        <tr>
                            <td><a href="{{ route('acts.show', $act->id) }}">{{ $act->name }}</a></td>
                            <td>{{ $act->genre->name}}</td>
                            <td>{{ $act->number_of_members }}</td>
                            <td>{{ Str::limit($act->description, 41) }}</td>
                            <td>{{ $act->created_at }}</td>
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
                            <th>Genre</th>
                            <th>Instrument</th>
                            <th>Description</th>
                            <th>Date added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($recentVacancies->isEmpty())
                        <tr>
                            <td colspan="7">No vacancies found</td>
                        </tr>
                        @else
                        @foreach ($recentVacancies as $vacancy)
                        <tr>
                            <td><a href="{{ route('acts.show', $act->id) }}">{{ $act->name }}</a></td>
                            <td>{{ $vacancy->genre_name}}</td>
                            <td>{{ $vacancy->instrument->name }}</td>
                            <td><a href="{{ route('vacancies.show', $vacancy->id) }}">{{ Str::limit($vacancy->description, 42) }}</a>
                            <td>{{ $vacancy->created_at }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <header>
                <h4 style="margin-top: 40px; margin-left: 20px;"><b>Available musicians</b></h4>
            </header>

            <div style="margin-left: 20px;" class="table-responsive">
                <table class="table tablesorter" id="">
                    <thead class=" text-primary">
                        <tr>
                            <th>Name</th>
                            <th>Genre</th>
                            <th>Instrument</th>
                            <th>Description</th>
                            <th>Date added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($recentAvailablemusicians->isEmpty())
                        <tr>
                            <td colspan="7">No available musicians found</td>
                        </tr>
                        @else
                        @foreach ($recentAvailablemusicians as $recentAvailablemusician)
                        <tr>
                            <td>{{ $recentAvailablemusician->user->name }}</td>
                            <td>{{ $recentAvailablemusician->genre->name}}</td>
                            <td>{{ $recentAvailablemusician->instrument->name }}</td>
                            <td><a href="{{ route('availablemusicians.show', $recentAvailablemusician->id) }}">{{ Str::limit($recentAvailablemusician->description, 35) }}</a>
                            <td>{{ $recentAvailablemusician->created_at }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>

            <header>
                <h4 style="margin-top: 40px; margin-left: 20px;"><b>Rehearsal rooms</b></h4>
            </header>

            <div style="margin-left: 20px;" class="table-responsive">
                <table class="table tablesorter" id="">
                    <thead class=" text-primary">
                        <tr>
                            <th>Name</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Description</th>
                            <th>Date added</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($recentRehearsalrooms->isEmpty())
                        <tr>
                            <td colspan="7">No rehearsal rooms found</td>
                        </tr>
                        @else
                        @foreach ($recentRehearsalrooms as $recentRehearsalroom)
                        <tr>
                            <td>{{ $recentRehearsalroom->name }}</td>
                            <td>{{ $recentRehearsalroom->city}}</td>
                            <td>{{ $recentRehearsalroom->country }}</td>
                            <td><a href="{{ route('rehearsalrooms.show', $recentRehearsalroom->id) }}">{{ Str::limit($recentRehearsalroom->description, 30) }}</a>
                            <td>{{ $recentRehearsalroom->created_at }}</td>
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
