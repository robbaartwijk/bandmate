<div class="sidebar">

    {{-- RobB Changed background colour of sidebar --}}
    <div class="sidebar-wrapper" style="background-color:rgb(50, 50, 128)">
        
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BM') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Bandmate') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                    <p>{{ __('Home') }}</p>
                </a>

            <li>
                <a data-toggle="collapse" href="#userdata" aria-expanded="{{ $pageSlug == 'vacancies' || $pageSlug == 'acts' ? 'true' : 'false' }}" class="{{ $pageSlug == 'vacancies' || $pageSlug == 'acts' ? '' : 'collapsed' }}">
                    <i class="fa fa-music"></i>
                    <span class="nav-link-text">{{ __('User data') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'acts' || $pageSlug == 'vacancies') show @endif" id="userdata" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'acts') class="active " @endif>
                            <a href="{{ route('acts.index') }}">
                                <i class="fa fa-music"></i>
                                <p>{{ __('Acts') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'vacancies') class="active " @endif>
                            <a href="{{ route('vacancies.index') }}">
                                <i class="fa fa-music"></i>
                                <p>{{ __('Vacancies') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#beheer" aria-expanded="{{ $pageSlug == 'instruments' || $pageSlug == 'genres' || $pageSlug == 'rehearsalrooms' ? 'true' : 'false' }}" class="{{ $pageSlug == 'instruments' || $pageSlug == 'genres' || $pageSlug == 'rehearsalrooms' ? '' : 'collapsed' }}">
                    <i class="fa fa-database"></i>
                    <span class="nav-link-text">{{ __('Management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'beheer' || $pageSlug == 'instruments' || $pageSlug == 'genres' || $pageSlug == 'rehearsalrooms'|| $pageSlug == 'venues') show @endif" id="beheer" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'instruments') class="active " @endif>
                            <a href="{{ route('instruments.index') }}">
                                <i class="fa fa-database"></i>
                                <p>{{ __('Instruments') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'genres') class="active " @endif>
                            <a href="{{ route('genres.index') }}">
                                <i class="fa fa-database"></i>
                                <p>{{ __('Genres') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'rehearsalrooms') class="active " @endif>
                            <a href="{{ route('rehearsalrooms.index') }}">
                                <i class="fa fa-database"></i>
                                <p>{{ __('Rehearsal rooms') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'venues') class="active " @endif>
                            <a href="{{ route('venues.index') }}">
                                <i class="fa fa-database"></i>
                                <p>{{ __('Venues') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="{{ $pageSlug == 'profile' || $pageSlug == 'users' ? 'true' : 'false' }}" class="{{ $pageSlug == 'profile' || $pageSlug == 'users' ? '' : 'collapsed' }}">
                    <i class="fa fa-user-circle"></i>
                    <span class="nav-link-text">{{ __('User management') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'profile' || $pageSlug == 'users') show @endif" id="laravel-examples" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit') }}">
                                <i class="fa fa-user-circle"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active " @endif>
                            <a href="{{ route('user.index') }}">
                                <i class="fa fa-user-circle"></i>
                                <p>{{ __('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
        </ul>
    </div>
</div>
