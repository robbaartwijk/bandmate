@php
$user = auth()->user();
@endphp

<div class="sidebar">

    <div class="sidebar-wrapper" style="background-color:rgb(50, 50, 128)">

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

                <div class="collapse @if ($pageSlug == 'dashboard' || $pageSlug == 'acts' || $pageSlug == 'vacancies' || $pageSlug == 'availablemusicians' || $pageSlug == 'rehearsalrooms' || $pageSlug == 'venues' || $pageSlug == 'agencies' ) show @endif" id="userdata" data-parent=".sidebar-wrapper">
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

                <div class="collapse @if ($pageSlug == 'chart1' || $pageSlug == 'chart2' || $pageSlug == 'chart3' || $pageSlug == 'chart4') show @endif" id="statistics" data-parent=".sidebar-wrapper">
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
                                    <h5>{{ __('Available musicians') }}</h5>
                                </p>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>

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
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="{{ $pageSlug == 'profile' || $pageSlug == 'users' ? 'true' : 'false' }}" class="{{ $pageSlug == 'profile' || $pageSlug == 'users' ? '' : 'collapsed' }}">
                    <i class="fa fa-user-circle"></i>
                    <span class="nav-link-text">
                        <h4>{{ __('Management') }}</h4>
                        <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'profile' || $pageSlug == 'users') show @endif" id="laravel-examples" data-parent=".sidebar-wrapper">
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
                    </ul>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>
