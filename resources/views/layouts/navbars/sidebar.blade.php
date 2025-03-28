@php
$user = auth()->user();
@endphp

<div class="bm_card bm_sidebar_card_margin_top sidebar">

    <div class="sidebar-wrapper" style="background-color:rgb(50, 50, 128);">

        <div class="logo">
            <img src="{{ asset('images/Logo.jpg') }}" style="border: solid 2px grey;  width:200px; height: 15%;" />
        </div>
        <ul class="nav">

            <li>
                <a data-toggle="collapse" href="#userdata" aria-expanded="true" class="show">
                    <i class="fa fa-music"></i>
                    <span class="nav-link-text">
                        <h4>{{ __('User Access') }}</h4>
                    </span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'dashboard' || $pageSlug == 'acts' || $pageSlug == 'vacancies' || $pageSlug == 'availablemusicians' || $pageSlug == 'rehearsalrooms' || $pageSlug == 'venues' || $pageSlug == 'agencies' || $pageSlug == 'about') show @endif" id="userdata" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='acts' ) class="active " @endif>
                            <a href="{{ route('acts.index') }}">
                                <i class="fa fa-music"></i>
                                <p>
                                    <h5>{{ __('Acts') }}</h5>
                                </p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='vacancies' ) class="active " @endif>
                            <a href="{{ route('vacancies.index') }}">
                                <i class="fa fa-music"></i>
                                <p>
                                    <h5>{{ __('Vacancies') }}</h5>
                                </p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='availablemusicians' ) class="active " @endif>
                            <a href="{{ route('availablemusicians.index') }}">
                                <i class="fa fa-music"></i>
                                <p>
                                    <h5>{{ __('Available musicians') }}</h5>
                                </p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='rehearsalrooms' ) class="active " @endif>
                            <a href="{{ route('rehearsalrooms.index') }}">
                                <i class="fa fa-music"></i>
                                <p>
                                    <h5>{{ __('Rehearsal rooms') }}</h5>
                                </p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='venues' ) class="active " @endif>
                            <a href="{{ route('venues.index') }}">
                                <i class="fa fa-music"></i>
                                <p>
                                    <h5>{{ __('Venues') }}</h5>
                                </p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='agencies' ) class="active " @endif>
                            <a href="{{ route('agencies.index') }}">
                                <i class="fa fa-music"></i>
                                <p>
                                    <h5>{{ __('Agencies') }}</h5>
                                </p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#statistics" aria-expanded="{{ $pageSlug == 'chart1' || $pageSlug == 'chart2' || $pageSlug == 'chart3' ? 'true' : 'false' }}" class="{{ $pageSlug == 'chart1' || $pageSlug == 'chart2' || $pageSlug == 'chart3' ? '' : 'collapsed' }}">
                    <i class="fa fa-chart-bar"></i>
                    <span class="nav-link-text">
                        <h4>{{ __('Statistics') }}</h4>
                    </span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'chart1' || $pageSlug == 'chart2' || $pageSlug == 'chart3' || $pageSlug == 'chart4' || $pageSlug == 'chart5') show @endif" id="statistics" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='chart1' ) class="active " @endif>
                            <a href="{{ route('statistics.chart1') }}">
                                <i class="fa fa-chart-bar"></i>
                                <p>
                                    <h5>{{ __('Users') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='chart2' ) class="active " @endif>
                            <a href="{{ route('statistics.chart2') }}">
                                <i class="fa fa-chart-bar"></i>
                                <p>
                                    <h5>{{ __('Vacancies') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='chart3' ) class="active " @endif>
                            <a href="{{ route('statistics.chart3') }}">
                                <i class="fa fa-chart-bar"></i>
                                <p>
                                    <h5>{{ __('Acts') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='chart4' ) class="active " @endif>
                            <a href="{{ route('statistics.chart4') }}">
                                <i class="fa fa-chart-bar"></i>
                                <p>
                                    <h5>{{ __('Available musicians(AM)') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='chart5' ) class="active " @endif>
                            <a href="{{ route('statistics.chart5') }}">
                                <i class="fa fa-chart-bar"></i>
                                <p>
                                    <h5>{{ __('(AM) Per instrument') }}</h5>
                                </p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#about" aria-expanded="{{ $pageSlug == 'aboutus' || $pageSlug == 'aboutdatausage' || $pageSlug == 'aboutacts' || $pageSlug == 'aboutvacancies' || $pageSlug == 'aboutavailablemusicians' || $pageSlug == 'aboutrehearsalrooms'  || $pageSlug == 'aboutagencies' || $pageSlug == 'aboutvenues' ? 'true' : 'false' }}" class="{{ $pageSlug == 'aboutus' || $pageSlug == 'aboutdatausage' || $pageSlug == 'aboutacts' ? '' : 'collapsed' }}">
                    <i class="fa fa-chevron-circle-right"></i>
                    <span class="nav-link-text">
                        <h4>{{ __('About') }}</h4>
                    </span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'aboutus' || $pageSlug == 'aboutdatausage' || $pageSlug == 'aboutacts' || $pageSlug == 'aboutvacancies' || $pageSlug == 'aboutavailablemusicians' || $pageSlug == 'aboutrehearsalrooms' || $pageSlug == 'aboutvenues' || $pageSlug == 'aboutagencies' ) show @endif" id="about" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">

                        <li @if ($pageSlug=='aboutacts' ) class="active " @endif>
                            <a href="{{ route('about.acts') }}">
                                <i class="fa fa-chevron-circle-right"></i>
                                <p>
                                    <h5>{{ __('Acts') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='aboutvacancies' ) class="active " @endif>
                            <a href="{{ route('about.vacancies') }}">
                                <i class="fa fa-chevron-circle-right"></i>
                                <p>
                                    <h5>{{ __('Vacancies') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='aboutavailablemusicians' ) class="active " @endif>
                            <a href="{{ route('about.availablemusicians') }}">
                                <i class="fa fa-chevron-circle-right"></i>
                                <p>
                                    <h5>{{ __('Available musicians') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='aboutrehearsalrooms' ) class="active " @endif>
                            <a href="{{ route('about.rehearsalrooms') }}">
                                <i class="fa fa-chevron-circle-right"></i>
                                <p>
                                    <h5>{{ __('Rehearsal rooms') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='aboutagencies' ) class="active " @endif>
                            <a href="{{ route('about.agencies') }}">
                                <i class="fa fa-chevron-circle-right"></i>
                                <p>
                                    <h5>{{ __('Agencies') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='aboutvenues' ) class="active " @endif>
                            <a href="{{ route('about.venues') }}">
                                <i class="fa fa-chevron-circle-right"></i>
                                <p>
                                    <h5>{{ __('Venues') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='aboutus' ) class="active " @endif>
                            <a href="{{ route('about.us') }}">
                                <i class="fa fa-chevron-circle-right"></i>
                                <p>
                                    <h5>{{ __('About us') }}</h5>
                                </p>
                            </a>
                        </li>

                        <li @if ($pageSlug=='aboutdatausage' ) class="active " @endif>
                            <a href="{{ route('about.datausage') }}">
                                <i class="fa fa-chevron-circle-right"></i>
                                <p>
                                    <h5>{{ __('Data usage') }}</h5>
                                </p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

            @if($user->is_admin)
            <li>
                <a data-toggle="collapse" href="#beheer" aria-expanded="{{ $pageSlug == 'instruments' || $pageSlug == 'genres' ? 'true' : 'false' }}" class="{{ $pageSlug == 'instruments' || $pageSlug == 'genres' ? '' : 'collapsed' }}">
                    <i class="fa fa-database"></i>
                    <span class="nav-link-text">
                        <h4>{{ __('Support data') }}</h4>
                    </span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'beheer' || $pageSlug == 'instruments' || $pageSlug == 'genres') show @endif" id="beheer" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='instruments' ) class="active " @endif>
                            <a href="{{ route('instruments.index') }}">
                                <i class="fa fa-database"></i>
                                <p>
                                    <h5>{{ __('Instruments') }}</h5>
                                </p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='genres' ) class="active " @endif>
                            <a href="{{ route('genres.index') }}">
                                <i class="fa fa-database"></i>
                                <p>
                                    <h5>{{ __('Genres') }}</h5>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif

            @if($user->is_admin)
            <li>

                <a data-toggle="collapse" href="#admin" aria-expanded="{{ $pageSlug == 'userprofile' || $pageSlug == 'users' || $pageSlug == 'mailings' ? 'true' : 'false' }}" class="{{ $pageSlug == 'userprofile' || $pageSlug == 'users' || $pageSlug == 'mailings' ? '' : 'collapsed' }}">
                    <i class="fa fa-user-circle"></i>
                    <span class="nav-link-text">
                        <h4>{{ __('Management') }}</h4>
                        <b class="caret mt-1"></b>
                    </span>
                </a>

                <div class="collapse @if ($pageSlug == 'userprofile' || $pageSlug == 'users' || $pageSlug == 'mailings') show @endif" id="admin" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='profile' ) class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="fa fa-user-circle"></i>
                                <p>
                                    <h5>{{ __('User Profile') }}</h5>
                                </p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='users' ) class="active " @endif>
                            <a href="{{ route('user.index') }}">
                                <i class="fa fa-user-circle"></i>
                                <p>
                                    <h5>{{ __('User Management') }}</h5>
                                </p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='mailings' ) class="active " @endif>
                            <a href="{{ route('mailing.index') }}">
                                <i class="fa fa-user-circle"></i>
                                <p>
                                    <h5>{{ __('Mailing list Management') }}</h5>
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>
