<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('name', 'Kokrokooad.com') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Fonts and Icons -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>

    <!-- Styles -->

    @yield('styles')
    @auth()
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @endauth
</head>
@guest()
    <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <!-- loader start -->
    @stack('loader')
    <!-- loader end -->
    @endguest

    @auth()
        <body>

        @endauth

        <div id="app">
            <payment-success-feedback message="{{'hello'}}" ></payment-success-feedback>


            @yield('content')


        </div>

        <!-- footer start -->
        {{--<footer class="text-center">--}}
        {{--<div class="container">--}}
        {{--<div class="row">--}}
        {{--<div class="col-xs-12">--}}
        {{--<p>Copyright © 2018 Kokrokoo All rights reserved.</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</footer>--}}
        <!-- footer end -->

        <!-- Scripts -->
        <div class="modal-overlay"></div>

        @yield('scripts')

        @auth()
            <script src="{{asset('js/app.js')}}"></script>
        @endauth


        </body>
</html>
