<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/user/navbar.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        #provider-submenu {
            position: absolute;
            top: 3rem;
            left: 66%;
            background-color: #fff;
            box-shadow: -4px 6px 5px 0px rgba(209, 201, 209, 1);
            border-radius: 3px 3px 3px 3px;
            border: 0px solid #000000;
            z-index: 999999;
        }

        #provider-submenu ul {
            padding: 0px;
            margin: 0px;
        }

        #provider-submenu ul li {
            list-style-type: none;
            padding: .5rem;
            cursor: pointer;
        }

        #provider-submenu ul li a {
            text-decoration: none !important;
            color: #000000;
        }
        img{
            width:100%;
        }
    </style>
    @yield('styles')
</head>
<body>
    <div id="app" class=" bg-white">
        @include('layouts.for-providers')
        @include('layouts.for-providers')
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                <img src="{{asset('assets/images/logo/practo.png')}}" alt="" style="width: 70%; margin:1rem">
                </div>
            </div>
        </div>

        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @include('layouts.modal-script')
    @yield('scripts')
</body>
</html>
