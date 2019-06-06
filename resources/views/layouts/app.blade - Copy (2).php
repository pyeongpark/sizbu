<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('general.title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- inport https://fonts.googleapis.com/css?family=Nunito -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- sizbu css -->
    <link rel="stylesheet" type="text/css" href="css/general_sizbu.css">
    @desktop 
        <link rel="stylesheet" type="text/css" href="css/desktop_sizbu.css">
    @elsedesktop
        <link rel="stylesheet" type="text/css" href="css/mobile_sizbu.css">
    @enddesktop
</head>


<!--
    How to Build a Responsive Navigation Bar using CSS Flexbox and Javascript
    https://itnext.io/how-to-build-a-responsive-navbar-using-flexbox-and-javascript-eb0af24f19bf
-->

<!--
    bootstrap various navbar and its some elements
    https://getbootstrap.com/docs/4.1/components/navbar/
-->

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container height-10">
                <div>
                    <a href="{{ url('/') }}">
                        <img src="img/logo.png" class="top-left-logo">
                    </a>
                    <span class="font-red vsm-text">
                        @lang('general.company')
                    </span>
                    <span class="sm-text font-bold font-black" style="display:block">
                        <a href="lang/en">Eng</a> |
                        <a href="lang/ka">Kaz</a> |
                        <a href="lang/ru">Rus</a> |
                        <a href="lang/uz">Uzb</a>   
                    </span>
                </div>
                
                <div>
                <!--div class="pp-center"-->
                <!--div class="mx-auto"-->
                    <span class="font-red sm-text">@lang('general.continent')</span><br>
                    <span class="font-darkgreen font-bold md-text">@lang('general.top-msg')</span>
                </div>

                <!--
                    drown-down content
                    https://www.w3schools.com/css/tryit.asp?filename=trycss_dropdown_navbar
                -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                      
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <!--a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a-->
                                {{ Auth::user()->name }}

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>


                            </li>
                        @endguest
                    </ul>

                </div>
            </div>
        </nav>

        <main class="py-4 height-78">
            @yield('content')
        </main>

        <div class="container bgcolor-gray height-11">
            <div class="pt-1 text-white pp-center">
                <span class="md-text">@lang('home/bottom.post')</span>
                <span class="sm-text" style="display:block">
                    <a class="text-white" href="/terms">@lang('home/bottom.tos') | </a>
                    <a class="text-white" href="/contact">@lang('home/bottom.cu')</a>
                </span>
                <span class="vsm-text" style="display:block">
                    @lang('home/bottom.copyright') © {{ date('Y') }} YM Group. @lang('home/bottom.reserved')
                </span>
            </div>
        </div>
        
    </div>
</body>
</html>
