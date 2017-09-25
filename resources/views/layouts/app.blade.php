<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Funbox</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:300,400,500,600" rel="stylesheet">
    <!-- Styles -->
    <link rel="icon" href="{{ asset('assets/img/logo/funboxlogo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/theme-b.css') }}">
</head>
<body>
    <div id="app_wrapper">
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
        @include('layouts/sidebar')
        <section id="content_outer_wrapper">
        @yield('content')
            <footer id="footer_wrapper">
                <div class="footer-content">
                    <div class="row copy-wrapper">
                        <div class="col-xs-8">
                            <p class="copy">&copy; Copyright <time class="year"></time> Funbox</p>
                        </div>
                        <div class="col-xs-4">
                            <ul class="social">
                                <li>
                                    <a href="javascript:void(0)"> </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"> </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"> </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </section>
    </div>
    @include('layouts/aside')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app.bundle.js') }}"></script>
</body>
</html>