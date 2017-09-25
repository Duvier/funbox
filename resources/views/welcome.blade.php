Skip to content
This repository
Search
Pull requests
Issues
Marketplace
Explore
 @Duvier
 Sign out
 Unwatch 1
  Star 0
 Fork 0 SistemasAplexTM/apiAmerica
 Code  Issues 0  Pull requests 0  Projects 0  Wiki  Settings Insights 
Branch: master Find file Copy pathapiAmerica/resources/views/welcome.blade.php
79cbd77  on 4 Aug
@Duvier Duvier ConfiguraciÃn inicial del proyecto
1 contributor
RawBlameHistory     
89 lines (76 sloc)  15.6 KB
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                <img src="data:image/jpeg;base64,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">
                </div>
                <example></example>
            </div>
        </div>
    </body>
</html>
© 2017 GitHub, Inc.
Terms
Privacy
Security
Status
Help
Contact GitHub
API
Training
Shop
Blog
About