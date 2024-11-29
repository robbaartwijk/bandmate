@php
$user = auth()->user();
@endphp

<div class="sidebar">

    <div class="sidebar-wrapper" style="background-color:rgb(50, 50, 128)">

        <div class="logo">
            <img src="{{ asset('images/Logo.png') }}" style="border: solid 2px grey;  width:200px; height: 18%;" />
        </div>
        <ul class="nav">
            <li @if ($pageSlug=='dashboard' ) class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                    <p><h4>{{ __('Home') }}</h4></p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#userdata" aria-expanded="{{ $pageSlug == 'vacancies' || $pageSlug == 'acts' || $pageSlug == 'rehearsalrooms' ? 'true' : 'false' }}" class="{{ $pageSlug == 'vacancies' || $pageSlug == 'acts' ? '' : 'collapsed' }}">
                    <i class="fa fa-music"></i>
                    <span class="nav-link-text"><h4>{{ __('User data') }}</h4></span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'acts' || $pageSlug == 'vacancies' || $pageSlug == 'rehearsalrooms') show @endif" id="userdata" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='acts' ) class="active " @endif>
                            <a href="{{ route('acts.index') }}">
                                <i class="fa fa-music"></i>
                                <p><h5>{{ __('Acts') }}</h5></p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='vacancies' ) class="active " @endif>
                            <a href="{{ route('vacancies.index') }}">
                                <i class="fa fa-music"></i>
                                <p><h5>{{ __('Vacancies') }}</h5></p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='rehearsalrooms' ) class="active " @endif>
                            <a href="{{ route('rehearsalrooms.index') }}">
                                <i class="fa fa-music"></i>
                                <p><h5>{{ __('Rehearsal rooms') }}</h5></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            @if($user->is_admin)
            <li>
                <a data-toggle="collapse" href="#beheer" aria-expanded="{{ $pageSlug == 'instruments' || $pageSlug == 'genres' || $pageSlug == 'rehearsalrooms' || $pageSlug == 'agencies' ? 'true' : 'false' }}" class="{{ $pageSlug == 'instruments' || $pageSlug == 'genres' || $pageSlug == 'rehearsalrooms' ? '' : 'collapsed' }}">
                    <i class="fa fa-database"></i>
                    <span class="nav-link-text"><h4>{{ __('Management') }}<h4></span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'beheer' || $pageSlug == 'instruments' || $pageSlug == 'genres' || $pageSlug == 'venues' || $pageSlug == 'agencies') show @endif" id="beheer" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='instruments' ) class="active " @endif>
                            <a href="{{ route('instruments.index') }}">
                                <i class="fa fa-database"></i>
                                <p><h5>{{ __('Instruments') }}</h5></p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='genres' ) class="active " @endif>
                            <a href="{{ route('genres.index') }}">
                                <i class="fa fa-database"></i>
                                <p><h5>{{ __('Genres') }}</h5></p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='venues' ) class="active " @endif>
                            <a href="{{ route('venues.index') }}">
                                <i class="fa fa-database"></i>
                                <p><h5>{{ __('Venues') }}</h5></p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='agencies' ) class="active " @endif>
                            <a href="{{ route('agencies.index') }}">
                                <i class="fa fa-database"></i>
                                <p><h5>{{ __('Agencies') }}</h5></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="{{ $pageSlug == 'profile' || $pageSlug == 'users' ? 'true' : 'false' }}" class="{{ $pageSlug == 'profile' || $pageSlug == 'users' ? '' : 'collapsed' }}">
                    <i class="fa fa-user-circle"></i>
                    <span class="nav-link-text"><h4>{{ __('User management') }}<h4></span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'profile' || $pageSlug == 'users') show @endif" id="laravel-examples" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='profile' ) class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="fa fa-user-circle"></i>
                                <p><h5>{{ __('User Profile') }}</h5></p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='users' ) class="active " @endif>
                            <a href="{{ route('user.index') }}">
                                <i class="fa fa-user-circle"></i>
                                <p><h5>{{ __('User Management') }}</h5></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endif
        </ul>
    </div>
</div>
