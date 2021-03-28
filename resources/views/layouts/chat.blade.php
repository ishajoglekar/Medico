<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <link rel="stylesheet" href="{{asset('assets/css/global.css')}}"> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/user/navbar.css')}}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .bg-blue {
            background: #28328C;
        }

        .bg-yellow {
            background: #FFC107;
        }

        .text-white {
            color: #fff;
        }

        .sent-message {
            background: #28328C;
            padding: .7rem;
            margin: 1rem 0;
            color: #fff;
            width: 600px;
            margin-left: 53%;
            border-radius: 20px;
        }

        .recieved-message {
            background: #FFC107;
            padding: .7rem;
            margin: 1rem 0;
            width: 600px;
            border-radius: 20px;
        }
        .actions{
            background-color: #fff;
        }
    </style>
    @yield('styles')
</head>
<body>
        @yield('content')

        @yield('scripts')
</body>
</html>
