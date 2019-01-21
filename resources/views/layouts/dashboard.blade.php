@extends('layouts.app')

@section('styles')
    {{--<link href="{{asset('css/app.css')}}" rel="stylesheet">--}}
    <!-- Favicon icon -->
    <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    {{--<link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/css/bootstrap.min.css">--}}
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/sweetalert/css/sweetalert.css">

    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/feather/css/feather.css">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/css/component.css">
    <!-- Calender css -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/fullcalendar/css/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/fullcalendar/css/fullcalendar.print.css" media='print'>
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/pages/notification/notification.css">

    <!-- Style.css -->
    {{--<link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/css/style.css">--}}
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/datedropper/css/datedropper.min.css">
@endsection
{{--@section('dashboard')--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--@endsection--}}
@section('content')


    {{--<div class="wrapper ">--}}
        {{--<div class="sidebar" data-color="white" data-active-color="danger">--}}
            {{--<!----}}
              {{--Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"--}}
          {{---->--}}
            {{--<div class="logo">--}}
                {{--<a href="http://www.creative-tim.com" class="simple-text logo-mini">--}}
                    {{--<div class="logo-image-small">--}}
                        {{--<img src="../assets/img/logo-small.png">--}}
                    {{--</div>--}}
                {{--</a>--}}
                {{--<a href="/" class="simple-text logo-normal">--}}
                    {{--KOKROKOO--}}
                    {{--<!-- <div class="logo-image-big">--}}
                      {{--<img src="../assets/img/logo-big.png">--}}
                    {{--</div> -->--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div class="sidebar-wrapper">--}}
                {{--<ul class="nav">--}}
                    {{--<li class="active ">--}}
                        {{--<a href="{{route('dashboard')}}">--}}
                            {{--<i class="nc-icon nc-bank"></i>--}}
                            {{--<p>Dashboard</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('publication')}}">--}}
                            {{--<i class="nc-icon nc-diamond"></i>--}}
                            {{--<p>My Subscriptions</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('active.sub')}}">--}}
                            {{--<i class="nc-icon nc-pin-3"></i>--}}
                            {{--<p>User Profile</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('inactive.sub')}}">--}}
                            {{--<i class="nc-icon nc-bell-55"></i>--}}
                            {{--<p>Inactive Subscriptions</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="./user.html">--}}
                            {{--<i class="nc-icon nc-single-02"></i>--}}
                            {{--<p>User Profile</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('pend.sub')}}">--}}
                            {{--<i class="nc-icon nc-tile-56"></i>--}}
                            {{--<p>Pending Subscriptions</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('transact')}}">--}}
                            {{--<i class="nc-icon nc-caps-small"></i>--}}
                            {{--<p>Transactions</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}

                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="main-panel">--}}
            {{--<!-- Navbar -->--}}
            {{--<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">--}}
                {{--<div class="container-fluid">--}}
                    {{--<div class="navbar-wrapper">--}}
                        {{--<div class="navbar-toggle">--}}
                            {{--<button type="button" class="navbar-toggler">--}}
                                {{--<span class="navbar-toggler-bar bar1"></span>--}}
                                {{--<span class="navbar-toggler-bar bar2"></span>--}}
                                {{--<span class="navbar-toggler-bar bar3"></span>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                        {{--<a class="navbar-brand" href="#pablo"> Dashboard</a>--}}
                    {{--</div>--}}
                    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">--}}
                        {{--<span class="navbar-toggler-bar navbar-kebab"></span>--}}
                        {{--<span class="navbar-toggler-bar navbar-kebab"></span>--}}
                        {{--<span class="navbar-toggler-bar navbar-kebab"></span>--}}
                    {{--</button>--}}
                    {{--<div class="collapse navbar-collapse justify-content-end" id="navigation">--}}
                        {{--<form>--}}
                            {{--<div class="input-group no-border">--}}
                                {{--<input type="text" value="" class="form-control" placeholder="Search...">--}}
                                {{--<div class="input-group-append">--}}
                                    {{--<div class="input-group-text">--}}
                                        {{--<i class="nc-icon nc-zoom-split"></i>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                        {{--<ul class="navbar-nav">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link btn-magnify" href="#pablo">--}}
                                    {{--<i class="nc-icon nc-layout-11"></i>--}}
                                    {{--<p>--}}
                                        {{--<span class="d-lg-none d-md-block">Stats</span>--}}
                                    {{--</p>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item btn-rotate dropdown">--}}
                                {{--<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                    {{--<i class="nc-icon nc-bell-55"></i>--}}
                                    {{--<p>--}}
                                        {{--<span class="d-lg-none d-md-block">Some Actions</span>--}}
                                    {{--</p>--}}
                                {{--</a>--}}
                                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
                                    {{--<a class="dropdown-item" href="#">Action</a>--}}
                                    {{--<a class="dropdown-item" href="#">Another action</a>--}}
                                    {{--<a class="dropdown-item" href="#">Something else here</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link btn-rotate" href="#pablo">--}}
                                    {{--<i class="nc-icon nc-settings-gear-65"></i>--}}
                                    {{--<p>--}}
                                        {{--<span class="d-lg-none d-md-block">Account</span>--}}
                                    {{--</p>--}}
                                {{--</a>--}}

                            {{--<li class="nav-item btn-rotate dropdown">--}}
                                {{--<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}

                                    {{--@auth()--}}
                                        {{--<i class="nc-icon fa fa-user"></i>--}}
                                        {{--{{Auth::user()->name}}--}}
                                        {{--@endauth--}}

                                {{--</a>--}}
                                {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
                                    {{--<a class="dropdown-item" href="#">User Profile</a>--}}
                                    {{--<a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>--}}
                                 {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                            {{--{{ csrf_field() }}--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</nav>--}}
 {{--@if(session()->has('validationFailed'))--}}
{{--<div class="alert alert-danger">Hello world</div>--}}
            {{--@endif--}}

    {{--just commented --}}

    {{--<div class="wrapper">--}}
        {{--<div class="sidebar" data-background-color="white" data-active-color="danger">--}}

            {{--<!----}}
                {{--Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"--}}
                {{--Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"--}}
            {{---->--}}

            {{--<div class="sidebar-wrapper">--}}
                {{--<div class="logo">--}}
                    {{--<a href="/" class="simple-text">--}}
                        {{--Kokrokoo--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<ul class="nav">--}}
                    {{--<li class="active">--}}
                        {{--<a href="{{route('dashboard')}}">--}}
                            {{--<i class="ti-panel"></i>--}}
                            {{--<p> Media</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('create.sub')}}">--}}
                            {{--<i class="ti-layout"></i>--}}
                            {{--<p>Create Subscription</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('publication')}}">--}}
                            {{--<i class="ti-layout-media-center"></i>--}}
                            {{--<p>My Subscriptions</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('transact')}}">--}}
                            {{--<i class="ti-view-list-alt"></i>--}}
                            {{--<p>Transactions</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('active.sub')}}">--}}
                            {{--<i class="ti-user"></i>--}}
                            {{--<p>User Profile</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="icons.html">--}}
                            {{--<i class="ti-pencil-alt2"></i>--}}
                            {{--<p>Icons</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="maps.html">--}}
                            {{--<i class="ti-map"></i>--}}
                            {{--<p>Maps</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="notifications.html">--}}
                            {{--<i class="ti-bell"></i>--}}
                            {{--<p>Notifications</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="active-pro">--}}
                        {{--<a href="upgrade.html">--}}
                            {{--<i class="ti-export"></i>--}}
                            {{--<p>Upgrade to PRO</p>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="main-panel">--}}
            {{--<nav class="navbar navbar-default">--}}
                {{--<div class="container-fluid">--}}
                    {{--<div class="navbar-header">--}}
                        {{--<button type="button" class="navbar-toggle">--}}
                            {{--<span class="sr-only">Toggle navigation</span>--}}
                            {{--<span class="icon-bar bar1"></span>--}}
                            {{--<span class="icon-bar bar2"></span>--}}
                            {{--<span class="icon-bar bar3"></span>--}}
                        {{--</button>--}}
                        {{--<a class="navbar-brand" href="#">Dashboard</a>--}}
                    {{--</div>--}}
                    {{--<div class="collapse navbar-collapse">--}}
                        {{--<ul class="nav navbar-nav navbar-right">--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                                    {{--<i class="ti-bell"></i>--}}
                                    {{--<p class="notification">5</p>--}}
                                    {{--<p>Notifications</p>--}}
                                    {{--<b class="caret"></b>--}}
                                {{--</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a href="#">Notification 1</a></li>--}}
                                    {{--<li><a href="#">Notification 2</a></li>--}}
                                    {{--<li><a href="#">Notification 3</a></li>--}}
                                    {{--<li><a href="#">Notification 4</a></li>--}}
                                    {{--<li><a href="#">Another notification</a></li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                                    {{--<p>--}}
                                        {{--@auth()--}}
                                        {{--<i class="nc-icon fa fa-user"></i>--}}
                                        {{--<span style="padding-right: 10px;">welcome </span>  <i class="ti-user"> </i> {{Auth::user()->name}}--}}
                                        {{--@endauth--}}
                                    {{--</p>--}}
                                    {{--<b class="caret"></b>--}}
                                {{--</a>--}}
                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li><a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>--}}

                                {{--</ul>--}}
                            {{--</li>--}}

                        {{--</ul>--}}
                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</nav>--}}

            {{--@yield('dashboard')--}}

        {{--</div>--}}

    {{--</div>--}}


    {{--<!-- Pre-loader start -->--}}
    {{--<div class="theme-loader">--}}
        {{--<div class="ball-scale">--}}
            {{--<div class='contain'>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
                {{--<div class="ring">--}}
                    {{--<div class="frame"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!-- Pre-loader end -->--}}
    {{--<div id="pcoded" class="pcoded">--}}
        {{--<div class="pcoded-overlay-box"></div>--}}
        {{--<div class="pcoded-container navbar-wrapper">--}}

            {{--<nav class="navbar header-navbar pcoded-header">--}}
                {{--<div class="navbar-wrapper">--}}

                    {{--<div class="navbar-logo">--}}
                        {{--<a class="mobile-menu" id="mobile-collapse" href="#!">--}}
                            {{--<i class="feather icon-menu"></i>--}}
                        {{--</a>--}}
                        {{--<a href="index.html">--}}
                            {{--<img class="img-fluid" src="https://colorlib.com//polygon/adminty/files/assets/images/logo.png" alt="Theme-Logo" />--}}
                        {{--</a>--}}
                        {{--<a class="mobile-options">--}}
                            {{--<i class="feather icon-more-horizontal"></i>--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="navbar-container container-fluid">--}}
                        {{--<ul class="nav-left">--}}
                            {{--<li class="header-search">--}}
                                {{--<div class="main-search morphsearch-search">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<span class="input-group-addon search-close"><i class="feather icon-x"></i></span>--}}
                                        {{--<input type="text" class="form-control">--}}
                                        {{--<span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<a href="#!" onclick="javascript:toggleFullScreen()">--}}
                                    {{--<i class="feather icon-maximize full-screen"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                        {{--<ul class="nav-right">--}}
                            {{--<li class="header-notification">--}}
                                {{--<div class="dropdown-primary dropdown">--}}
                                    {{--<div class="dropdown-toggle" data-toggle="dropdown">--}}
                                        {{--<i class="feather icon-bell"></i>--}}
                                        {{--<span class="badge bg-c-pink">5</span>--}}
                                    {{--</div>--}}
                                    {{--<ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">--}}
                                        {{--<li>--}}
                                            {{--<h6>Notifications</h6>--}}
                                            {{--<label class="label label-danger">New</label>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<div class="media">--}}
                                                {{--<img class="d-flex align-self-center img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">--}}
                                                {{--<div class="media-body">--}}
                                                    {{--<h5 class="notification-user">John Doe</h5>--}}
                                                    {{--<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>--}}
                                                    {{--<span class="notification-time">30 minutes ago</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<div class="media">--}}
                                                {{--<img class="d-flex align-self-center img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">--}}
                                                {{--<div class="media-body">--}}
                                                    {{--<h5 class="notification-user">Joseph William</h5>--}}
                                                    {{--<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>--}}
                                                    {{--<span class="notification-time">30 minutes ago</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<div class="media">--}}
                                                {{--<img class="d-flex align-self-center img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">--}}
                                                {{--<div class="media-body">--}}
                                                    {{--<h5 class="notification-user">Sara Soudein</h5>--}}
                                                    {{--<p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>--}}
                                                    {{--<span class="notification-time">30 minutes ago</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="header-notification">--}}
                                {{--<div class="dropdown-primary dropdown">--}}
                                    {{--<div class="displayChatbox dropdown-toggle" data-toggle="dropdown">--}}
                                        {{--<i class="feather icon-message-square"></i>--}}
                                        {{--<span class="badge bg-c-green">3</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="user-profile header-notification">--}}
                                {{--<div class="dropdown-primary dropdown">--}}
                                    {{--<div class="dropdown-toggle" data-toggle="dropdown">--}}
                                        {{--<img src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">--}}
                                        {{--<span>John Doe</span>--}}
                                        {{--<i class="feather icon-chevron-down"></i>--}}
                                    {{--</div>--}}
                                    {{--<ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">--}}
                                        {{--<li>--}}
                                            {{--<a href="#!">--}}
                                                {{--<i class="feather icon-settings"></i> Settings--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="user-profile.html">--}}
                                                {{--<i class="feather icon-user"></i> Profile--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="email-inbox.html">--}}
                                                {{--<i class="feather icon-mail"></i> My Messages--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="auth-lock-screen.html">--}}
                                                {{--<i class="feather icon-lock"></i> Lock Screen--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<a href="auth-normal-sign-in.html">--}}
                                                {{--<i class="feather icon-log-out"></i> Logout--}}
                                            {{--</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}

                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</nav>--}}

            {{--<!-- Sidebar chat start -->--}}
            {{--<div id="sidebar" class="users p-chat-user showChat">--}}
                {{--<div class="had-container">--}}
                    {{--<div class="card card_main p-fixed users-main">--}}
                        {{--<div class="user-box">--}}
                            {{--<div class="chat-inner-header">--}}
                                {{--<div class="back_chatBox">--}}
                                    {{--<div class="right-icon-control">--}}
                                        {{--<input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">--}}
                                        {{--<div class="form-icon">--}}
                                            {{--<i class="icofont icofont-search"></i>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="main-friend-list">--}}
                                {{--<div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">--}}
                                    {{--<a class="media-left" href="#!">--}}
                                        {{--<img class="media-object img-radius img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image ">--}}
                                        {{--<div class="live-status bg-success"></div>--}}
                                    {{--</a>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<div class="f-13 chat-header">Josephin Doe</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">--}}
                                    {{--<a class="media-left" href="#!">--}}
                                        {{--<img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">--}}
                                        {{--<div class="live-status bg-success"></div>--}}
                                    {{--</a>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<div class="f-13 chat-header">Lary Doe</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">--}}
                                    {{--<a class="media-left" href="#!">--}}
                                        {{--<img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">--}}
                                        {{--<div class="live-status bg-success"></div>--}}
                                    {{--</a>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<div class="f-13 chat-header">Alice</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">--}}
                                    {{--<a class="media-left" href="#!">--}}
                                        {{--<img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">--}}
                                        {{--<div class="live-status bg-success"></div>--}}
                                    {{--</a>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<div class="f-13 chat-header">Alia</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">--}}
                                    {{--<a class="media-left" href="#!">--}}
                                        {{--<img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">--}}
                                        {{--<div class="live-status bg-success"></div>--}}
                                    {{--</a>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<div class="f-13 chat-header">Suzen</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}

    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->

    {{--ajax preloader--}}
    {{--<pre-loader></pre-loader>--}}


    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="{{route('welcome')}}">
                            <img class="img-fluid" src="/images/kokro-yellow.png" alt="Kokrokoo" />
                            {{--<a class="navbar-brand" href="#"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>--}}

                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-addon search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-addon search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="feather icon-maximize full-screen"></i>
                                </a>
                            </li>
                        </ul>
                        {{--<show-processing></show-processing>--}}

                        <ul class="nav-right">


                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                        <span>
                                            @auth()
                                            {{--<i class="nc-icon fa fa-user"></i>--}}
                                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                                            @endauth
                                        </span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="https://colorlib.com//polygon/adminty/files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
               {{--side bar and main content goes here--}}
            <side-bar></side-bar>
        </div>
    </div>



@endsection
                    @section('scripts')

                    {{--<script src="{{asset('js/app.js')}}"></script>--}}
                    <![endif]-->
                    <!-- Warning Section Ends -->
                    <!-- Required Jquery -->
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery/js/jquery.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/popper.js/js/popper.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/bootstrap-growl.min.js"></script>
                    {{--<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/notification/notification.js"></script>--}}



                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/moment-with-locales.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/bootstrap-datetimepicker.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap-daterangepicker/js/daterangepicker.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/datedropper/js/datedropper.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/spectrum/js/spectrum.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jscolor/js/jscolor.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-minicolors/js/jquery.minicolors.min.js"></script>

                    <!-- calender js -->
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/moment/js/moment.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/fullcalendar/js/fullcalendar.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/modernizr.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/css-scrollbars.js"></script>

                    <!-- sweet alert js -->
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/sweetalert/js/sweetalert.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/modal.js"></script>
                    <!-- sweet alert modal.js intialize js -->
                    <!-- modalEffects js nifty modal window effects -->
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/modalEffects.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/classie.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next/js/i18next.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>

                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/advance-elements/custom-picker.js"></script>
                    {{--<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/pages/full-calender/calendar.js"></script>--}}

                    <script src="https://colorlib.com//polygon/adminty/files/assets/js/pcoded.min.js"></script>
                    <script src="https://colorlib.com//polygon/adminty/files/assets/js/vartical-layout.min.js"></script>
                    <script src="https://colorlib.com//polygon/adminty/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
                    <script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/script.js"></script>

                    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
                    <!-- Global site tag (gtag.js) - Google Analytics -->
                    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
                    <script>
                        window.dataLayer = window.dataLayer || [];
                        function gtag(){dataLayer.push(arguments);}
                        gtag('js', new Date());

                        gtag('config', 'UA-23581568-13');
                    </script>

{{--@section('scripts')--}}
    {{--<script src="{{ asset('dash') }}" ></script>--}}
    {{--<script  src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>--}}
    {{--<script  src="{{asset('js/locales/bootstrap-datetimepicker.fr.js')}}"></script>--}}
    {{--<script type="text/javascript">--}}


        {{--$('.form_date').datetimepicker({--}}
            {{--language:  'en',--}}
            {{--weekStart: 1,--}}
            {{--todayBtn:  1,--}}
            {{--autoclose: 1,--}}
            {{--todayHighlight: 1,--}}
            {{--startView: 2,--}}
            {{--minView: 2,--}}
            {{--forceParse: 0--}}
        {{--});--}}

    {{--</script>--}}



    {{--@if(Route::currentRouteName() == 'dashboard')--}}
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function(){--}}


            {{--$.notify({--}}
                {{--icon: 'ti-gift',--}}
                {{--message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."--}}

            {{--},{--}}
                {{--type: 'success',--}}
                {{--timer: 4000--}}
            {{--});--}}
            {{----}}
        {{--});--}}
    {{--</script>--}}
{{--@endif--}}


@endsection