<nav class="navbar navbar-static-top">
<div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('welcome')}}"><img src="/images/kokro-yellow.png"  alt="kokrokoo"></a>
        </div>
        <div class="container">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('welcome')}}" style='color:#000'>Home</a></li>
                    <li class="pull-right"><a href="{{route('login')}}" style='color:#000'>Login</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style='color:#000'>Register <span class="caret"></span></a>
                        <ul class="dropdown-menu">


                            @if(Route::currentRouteName() == 'register.personal')
                            <li><a href="{{route('register.org')}}" style="color: #0c0c0c">Organisation</a></li>
                            <li><a href="{{route('media.policy')}}" style="color: #0c0c0c">Media house</a></li>
                                @endif
                            @if(Route::currentRouteName() == 'register.org')
                                    <li><a href="{{route('register.personal')}}" style="color: #0c0c0c">Personal</a></li>
                                <li><a href="{{route('media.policy')}}" style="color: #0c0c0c">Media house</a></li>
                            @endif

                                @if(Route::currentRouteName() == 'register.media')
                                    <li><a href="{{route('register.personal')}}" style="color: #0c0c0c">Personal</a></li>
                                    <li><a href="{{route('register.org')}}" style="color: #0c0c0c">Organisation</a></li>
                                @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

@yield('content')