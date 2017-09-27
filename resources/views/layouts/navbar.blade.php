<header id="app_topnavbar-wrapper">
    <nav role="navigation" class="navbar topnavbar">
        <div class="nav-wrapper">
            <div id="logo_wrapper" class="nav navbar-nav">
                <ul>
                    <li class="logo-icon">
                        <a href="index.html">
                            <div class="logo">
                                <img src="{{ asset('assets/img/logo/funboxlogo.png') }}" alt="Logo">
                            </div>
                            <h1 class="brand-text">Funbox</h1>
                            {{-- <img  class="brand-text" src="{{ asset('assets/img/logo/funboxlogo.png') }}"> --}}
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav left-menu ">
                <li class="menu-icon">
                    <a href="javascript:void(0)" role="button" data-toggle-state="app_sidebar-menu-collapsed" data-key="leftSideBar">
                        <i class="mdi mdi-backburger"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav left-menu">
                <li>
                    <a href="javascript:void(0)" class="nav-link" data-toggle-profile="profile-open">
                        <i class="zmdi zmdi-account"></i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-right">
                @if (Auth::guest())
                    {{-- <li><a href="{{ route('login') }}">Entrar</a></li>
                    <li><a href="{{ route('register') }}">Registrarme</a></li> --}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="last">
                    <a href="javascript:void(0)" data-toggle-state="sidebar-overlay-open" data-key="rightSideBar">
                        <i class="mdi mdi-playlist-plus"></i>
                    </a>
                </li>
            </ul>
        </div>
        <form role="search" action="" class="navbar-form" id="navbar_form">
            <div class="form-group">
                <input type="text" placeholder="Search and press enter..." class="form-control" id="navbar_search" autocomplete="off">
                <i data-navsearch-close class="zmdi zmdi-close close-search"></i>
            </div>
            <button type="submit" class="hidden btn btn-default">Submit</button>
        </form>
    </nav>
</header>