@extends('layouts.app')

@section('content')

@section('styles')

    @include('includes.links')
@endsection

    <nav class="navbar navbar-fixed-top yellow " style="background: #a8a8a8">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{route('welcome')}}"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>
            </div>
            <div class="container">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse  ">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('register.personal')}}" style="color: #0c0c0c">Personal</a></li>
                                <li><a href="{{route('register.org')}}" style="color: #0c0c0c">Organisation</a></li>
                                <li><a href="{{route('register.media')}}" style="color: #0c0c0c">Media house</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <!-- about-us-1 start -->
    <div id="about-us-1" class="big-padding">
        <div class="row">
            <div class="col-sm-12 wow slideInLeft">
                <div class="outer-bound">
                    <div class=" vertical-heading">
                        <h2 style="color: #E6AA00; font-size: 25px;font-weight: 400">Login</h2><hr>
                    </div><br><br>
                </div>
        <div class="container">
            <div class="well-sm" style="background: transparent !important;">
                <form method="post" action="{{route('login')}}">
                    @csrf
                    <div class="row" style="margin-top: 80px;">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" required id="email" class="form-control {{$errors->has('email' ? 'is-invalid' : '')}} " value="{{old('email')}}">
                                <span>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                                    @endif
                                       </span>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" required id="password" class="form-control {{$errors->has('password' ? 'is-invalid' : '')}} " value="{{old('password')}}">
                                <span>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('password') }}</strong></span>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="submit" class="btn button" id="submit_btn" style="color: #1b1e21;background: #F1CF00">Submit</button>

                            </div>

                        </div>
                        <div class="col-sm-4"></div>

                    </div>
                </form>
            </div>
            </div>

    </div>

            @section('scripts')
                @include('includes.scripts')
            @endsection






























    {{--<div class="limiter">--}}
        {{--<span class="login100-form-title p-b-49">--}}
                        						{{--Login--}}
					{{--</span>--}}
        {{--<div class="container-login100" style="background-image:url('images/bgs.jpeg'); background-repeat: no-repeat;background-size: cover">--}}
             {{--<div class="container-fluid">--}}
            {{--<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54 animated fade-in">--}}
                {{--<div style="text-align: center;">--}}
                    {{--<a class="navbar-brand" href="{{route('welcome')}}"><img src="images/kokro-yellow.png"  alt="kokrokoo"></a>--}}

                    {{--<h6 style="font-weight: bold;font-size: 26px;padding-bottom: 40px;font-family: Poppins-Bold">Login</h6></div>--}}
                {{--<form class="login100-form validate-form" action="{{route('login')}}" method="post">--}}

                   {{--@csrf--}}


                    {{--<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">--}}
                        {{--<span class="label-input100">Username</span>--}}
                        {{--<input class="input100" type="email" name="email" placeholder="Type your email" required="">--}}
                        {{--<span class="focus-input100" data-symbol="&#xf206;"></span>--}}
                        {{--@if ($errors->has('email'))--}}
                        {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="wrap-input100 validate-input" data-validate="Password is required">--}}
                        {{--<span class="label-input100">Password</span>--}}
                        {{--<input class="input100" type="password" name="password" placeholder="Type your password" required="">--}}
                        {{--<span class="focus-input100" data-symbol="&#xf190;"></span>--}}
                        {{--@if ($errors->has('password'))--}}
                        {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                        {{--</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}

                    {{--<div class="text-right p-t-8 p-b-31">--}}
                        {{--<a href="#">--}}
                            {{--Forgot password?--}}
                        {{--</a>--}}
                    {{--</div>--}}

                    {{--<div class="container-login100-form-btn">--}}
                        {{--<div class="wrap-login100-form-btn">--}}
                            {{--<div class="login100-form-bgbtn"></div>--}}
                            {{--<button type="submit" class="login100-form-btn" style="font-weight: bolder !important;background: none !important;">--}}
                                {{--Login--}}
                            {{--</button>--}}
        </div>
    </div>

@endsection

{{--@section('scripts')--}}
    {{--@include('includes.scripts')--}}
{{--@stop--}}

{{--@push('loader')--}}
    {{--@include('includes.loader')--}}
{{--@endpush--}}
{{--@push('styles')--}}
    {{--@include('includes.links')--}}
{{--@endpush--}}
