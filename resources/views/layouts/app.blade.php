<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="mobile-web-app-capable" content=yes>
    <link rel="icon" sizes="192x192" href="{{ asset('img/logo_cenal.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | CENAL</title>

    <!-- Styles -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar.print.css') }}" rel="stylesheet" media='print'>
</head>
<body  class="top-navigation skin-1">
    <div id="wrapper">            
        <div id="page-wrapper" class="gray-bg">
            @if(!Auth::guest())
                @include('layouts.navbar')
            @endif
            <div class="wrapper wrapper-content">
                @yield('content')
            </div>
        </div>
    </div>
<!-- Scripts -->
    <script src="{{ asset('js/plantilla.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/locale/es.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
      @stack('scripts')
</body>
</html>
