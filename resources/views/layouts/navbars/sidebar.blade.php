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
            </li>

            <li>
                <a data-toggle="collapse" href="#beheer" aria-expanded="{{ $pageSlug == 'acts' || $pageSlug == 'instruments' || $pageSlug == 'genres' || $pageSlug == 'rehearsalrooms' ? 'true' : 'false' }}" class="{{ $pageSlug == 'acts' || $pageSlug == 'instruments' || $pageSlug == 'genres' || $pageSlug == 'rehearsalrooms' ? '' : 'collapsed' }}">
                    <i class="fa fa-music"></i>
                    <span class="nav-link-text">{{ __('Beheer') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'acts' || $pageSlug == 'instruments' || $pageSlug == 'genres' || $pageSlug == 'rehearsalrooms') show @endif" id="beheer" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'acts') class="active " @endif>
                            <a href="{{ route('acts.index') }}">
                                <i class="fa fa-music"></i>
                                <p>{{ __('Acts') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'instruments') class="active " @endif>
                            <a href="{{ route('instruments.index') }}">
                                <i class="fa fa-music"></i>
                                <p>{{ __('Instruments') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'genres') class="active " @endif>
                            <a href="{{ route('genres.index') }}">
                                <i class="fa fa-music"></i>
                                <p>{{ __('Genres') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'rehearsalrooms') class="active " @endif>
                            <a href="{{ route('rehearsalrooms.index') }}">
                                <i class="fa fa-music"></i>
                                <p>{{ __('Rehearsal rooms') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#vacancies" aria-expanded="{{ $pageSlug == 'vacancies' ? 'true' : 'false' }}" class="{{ $pageSlug == 'vacancies' ? '' : 'collapsed' }}">
                    <i class="fa fa-database"></i>
                    <span class="nav-link-text">{{ __('Vacancies') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'vacancies') show @endif" id="vacancies" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'vacancies') class="active " @endif>
                            <a href="{{ route('vacancies.index') }}">
                                <i class="fa fa-database"></i>
                                <p>{{ __('Vacancies') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#venues" aria-expanded="{{ $pageSlug == 'venues' ? 'true' : 'false' }}" class="{{ $pageSlug == 'venues' ? '' : 'collapsed' }}">
                    <i class="fa fa-database"></i>
                    <span class="nav-link-text">{{ __('Venues') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse @if ($pageSlug == 'venues') show @endif" id="venues" data-parent=".sidebar-wrapper">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'venues') class="active " @endif>
                            <a href="{{ route('venues.index') }}">
                                <i class="fa fa-database"></i>
                                <p>{{ __('Venues') }}</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="{{ $pageSlug == 'profile' || $pageSlug == 'users' ? 'true' : 'false' }}" class="{{ $pageSlug == 'profile' || $pageSlug == 'users' ? '' : 'collapsed' }}">
                    <i class="fa fa-user-circle"></i>
                    <span class="nav-link-text">{{ __('Users') }}</span>
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


            {{-- @TODO RobB - Legacy code  Delete when not required for inquiry anymore --}}

            {{-- <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'rtl') class="active " @endif>
                <a href="{{ route('pages.rtl') }}">
                    <i class="tim-icons icon-world"></i>
                    <p>{{ __('RTL Support') }}</p>
                </a>
            </li>
            <li class=" {{ $pageSlug == 'upgrade' ? 'active' : '' }} bg-info">
                <a href="{{ route('pages.upgrade') }}">
                    <i class="tim-icons icon-spaceship"></i>
                    <p>{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}

            
        </ul>
    </div>
</div>
