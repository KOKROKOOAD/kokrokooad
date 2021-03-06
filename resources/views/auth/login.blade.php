
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{config('name', 'kokrokooad.com')}} </title>
    
    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->

{{--    <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">--}}
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="https://colorlib.com//polygon/adminty/files/assets/css/style.css">
</head>

<body class="fix-menu">
<!-- Pre-loader start -->
<div class="theme-loader">
    <div class="ball-scale">
        <div class='contain'>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
            <div class="ring"><div class="frame"></div></div>
        </div>
    </div>
</div>


<nav class="navbar navbar-fixed-top yellow " style="background: transparent;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('login')}}"><img src="/images/kokro-yellow.png"  alt="kokrokoo"></a>
        </div>
        <div class="container">
            <div class="collapse navbar-collapse navbar-default">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="">MEDIA HOUSE ADMIM</a></li>

                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Pre-loader end -->
<section class="login-block" style="background: transparent !important;margin-top: -140px !important; ">
    <!-- Container-fluid starts -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <form class="md-float-material form-material" method="post"  action="{{route('login')}}">
                    @csrf
                    <div class="text-center">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Sign In</h3>
                                    @if ($errors->has('email'))
                                     <div class="row" style="padding-top:10px;">
                                     <div class="alert alert-danger background-danger" style="width:100%;padding-top:10px;text-align:center !important">
                                     
                                    <span   role="alert">{{ $errors->first('email') }}</span>
                                </div>
                                </div>
                                @endif

                                </div>
                               
                            </div>
                            <div class="row m-b-20">
                               
                                <div class="col-md-6">
{{--                                    <button class="btn btn-facebook m-b-20 btn-block"><i class="icofont icofont-social-facebook"></i>facebook</button>--}}
                                </div>
                                <div class="col-md-6">
{{--                                    <button class="btn btn-google-plus m-b-20 btn-block"><i class="icofont icofont-social-google-plus"></i>google</button>--}}
                                </div>
                            </div>
                            <p class="text-muted text-center p-b-5">Sign in with your regular account</p>

                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }} form-primary">
                                <span class="input-group-addon" id="basic-addon1"><i class="icofont icofont-envelope"></i> </span>

                                <input type="email" name="email" required id="email" class="form-control" value="{{old('email')}}" placeholder="email">

                               

                                <span class="form-bar"></span>
                            </div>
                            <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }} form-primary">
                                <span class="input-group-addon" id="basic-addon2"><i class="icofont icofont-key"></i> </span>

                                <input type="password" name="password" required id="password" class="form-control" placeholder="password">

                                @if ($errors->has('password'))
                                    <span class="text-danger" role="alert">{{ $errors->first('password') }}</span>
                                @endif

                                <span class="form-bar"></span>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input type="checkbox"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="forgot-phone text-right f-right">
                                        <a href="{{route('password.request')}}" class="text-right f-w-600"> Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger btn-md btn-block waves-ripple text-center m-b-20">LOGIN <i class="icofont icofont-sign-in"> </i> </button>

                                </div>
                            </div>
                                <p class="text-inverse text-left"> Dont have an account? <a href="{{ route('register.personal')}}"> <b class="f-w-600">Register here </b></a></p>
                        </div>
                    </div>
                </form>
                <!-- end of form -->
            </div>
            <!-- Authentication card end -->
        </div>
        <!-- end of col-sm-12 -->
    </div>
    <!-- end of row -->
    <!-- end of container-fluid -->
</section>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/modernizr/js/css-scrollbars.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="https://colorlib.com//polygon/adminty/files/assets/js/common-pages.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>


</html>

@section('scripts')
    @include('includes.scripts')
@stop

@push('loader')
    @include('includes.loader')
@endpush
@push('styles')
    @include('includes.links')
@endpush