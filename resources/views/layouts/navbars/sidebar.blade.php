<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
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
                <a data-toggle="collapse" href="#beheer" aria-expanded="true">
                    <i class="fa fa-list"></i>
                    <span class="nav-link-text">{{ __('Beheer') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="beheer">
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
                                <p>{{ __('Reheearsal rooms') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fa fa-list"></i>
                    <span class="nav-link-text">{{ __('Users') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
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

            <li @if ($pageSlug == 'notifications') class="active " @endif>
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
            </li>
        </ul>
    </div>
</div>
