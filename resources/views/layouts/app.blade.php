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
    <link rel="stylesheet" href="{{ asset('assets/css/theme-f.css') }}">
</head>
<body>
    <div id="app_wrapper">
        @include('layouts/navbar')
        @include('layouts/sidebar')
        <section id="content_outer_wrapper">
            <div id="content_wrapper" >
                @include('layouts.breadcrumb')
                <div id="content" class="container-fluid">
                    @yield('content')
                </div>
            </div>
        @include('layouts.footer')
        </section>
    </div>
    @include('layouts/aside')

    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/app.bundle.js') }}"></script>
</body>
</html>