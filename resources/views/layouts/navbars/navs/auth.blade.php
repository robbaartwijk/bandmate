<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="/"> {{ Auth::user()->name }} </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="search-bar input-group">
                    <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                        <span class="d-lg-none d-md-block">{{ __('Search') }}</span>
                    </button>
                </li> --}}
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        
                        @if (!empty($userAvatar))
                            <img src="{{ asset('/storage/' . $userAvatar->id . '/' . $userAvatar->file_name) }}" class="bm_thumbnail">
                        @else
                        <div class="photo">
                            <img src="{{ asset('black') }}/img/anime3.png" alt="{{ __('Profile Photo') }}">
                        </div>
                        @endif

                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">{{ __('Log out') }}</p>
                    </a>

                    <ul class="dropdown-menu dropdown-navbar" style="background: rgba(35, 37, 51, 0.95); border: 1px solid rgba(255,255,255,0.25); border-radius: 8px; padding: 8px 0; box-shadow: 0 4px 20px rgba(0,0,0,0.4); min-width: 180px;">
                        <li class="nav-link">
                            <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item" style="color: rgba(255,255,255,0.8); padding: 8px 20px; display: block; font-size: 14px; transition: background 0.2s;">{{ __('Profile') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('profile.editPassword') }}" class="nav-item dropdown-item" style="color: rgba(255,255,255,0.8); padding: 8px 20px; display: block; font-size: 14px; transition: background 0.2s;">{{ __('Change password') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ route('profile.userdata') }}" class="nav-item dropdown-item" style="color: rgba(255,255,255,0.8); padding: 8px 20px; display: block; font-size: 14px; transition: background 0.2s;">{{ __('User data') }}</a>
                        </li>
                        <li class="dropdown-divider" style="border-color: rgba(255,255,255,0.1); margin: 4px 0;"></li>
                        <li class="nav-link">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-item dropdown-item" style="background:none; border:none; color: rgba(255,255,255,0.8); padding: 8px 20px; display: block; font-size: 14px; width: 100%; text-align: left; cursor: pointer; transition: background 0.2s;">
                                    {{ __('Log out') }}
                                </button>
                            </form>
                        </li>
                    </ul>

                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
        </div>
    </div>
</div>
