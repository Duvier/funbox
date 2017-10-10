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
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
    <div id="app_wrapper">
        @include('layouts/navbar')
        @include('layouts/sidebar')
        <section id="content_outer_wrapper">
            <div id="content_wrapper" >
                @include('layouts.breadcrumb')
                <div id="content" class="container-fluid">
                    <nav class="btn-fab-group">
                      <button class="btn btn-primary btn-fab fab-menu animate-fab " data-fab="left" id="add-btn">
                        <i class="zmdi zmdi-plus"></i>
                      </button>
                      <ul class="nav-sub" id="add-options">
                        <li> <a href="#" data-toggle="modal" data-target="#modal-user" data-toggle="tooltip" data-placement="top" title="Usuario" class="btn btn-green btn-fab btn-fab-sm"><i class="zmdi zmdi-account-add"></i></a></li>
                        <li> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Clase" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-assignment"></i></a></li>
                        {{-- <li> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Check All" class="btn btn-green btn-fab btn-fab-sm"><i class="zmdi zmdi-check-all"></i></a></li>
                        <li> <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Edit" class="btn btn-info btn-fab btn-fab-sm"><i class="zmdi zmdi-edit"></i></a></li> --}}
                      </ul>
                    </nav>
                    @yield('content')
                </div>
            </div>
        @include('layouts.footer')
        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app.bundle.js') }}"></script>
    <script src="{{ asset('js/vue-axios.js') }}"></script>
    @yield('scripts')
</body>
</html>