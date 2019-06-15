
    <nav class="ppnav-top">
    
        <div class="pp-div-inline" id="top-left">
            <a href="/" ><img class="logo-img" src="{{$path}}img/logo.png"></a>

            @desktop 
                <button type="button" class="btn btn-info btn-sm" 
                    data-toggle="modal" data-target="#infoModal">i</button>
                <div>
                    <span class="font-bold md-vtext">
                        <a class="nav-lang" href="lang/en">Eng</a>|
                        <a class="nav-lang" href="lang/ka">Kaz</a>|
                        <a class="nav-lang" href="lang/ru">Rus</a>|
                        <a class="nav-lang" href="lang/uz">Uzb</a>   
                    </span>
                </div>
            @elsedesktop
                <!--button type="button" class="btn btn-info btn-lg" 
                    data-toggle="modal" data-target="#infoModal">Info</button-->
                <span class="md-vtext font-bold pp-center">@lang('general.company-short')</span>
                <div><span class="font-red md-vtext">&nbsp;@lang('general.continent')</span></div>
            @enddesktop

        </div>

        <div id="infoModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&#88;</button>
                    </div>
                    <div class="modal-body">
                        <p class="font-red font-bold">@lang('general.company')</p>
                        @desktop
                            <span>&bull;&nbsp;@lang('general.for1')</span><br>
                            <span>&bull;&nbsp;@lang('general.for2')</span><br>
                            <span>&bull;&nbsp;@lang('general.for3')</span><br>
                        @elsedesktop
                            <span style="font-size:24px">&bull;&nbsp;@lang('general.for1')</span><br>
                            <span style="font-size:24px">&bull;&nbsp;@lang('general.for2')</span><br>
                            <span style="font-size:24px">&bull;&nbsp;@lang('general.for3')</span><br>
                        @enddesktop
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            <span class="font-bold">CLOSE</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="pp-div-inline">
            @desktop 
                <div class="rcorner pp-center">
        	        <span class="font-red md-vtext">@lang('general.continent')</span><br>
        	        <span class="font-bold lg-vtext">@lang('general.top-msg')</span>
                </div>
            @elsedesktop
                <div class="rcorner pp-center">
                    <span class="lg-vtext">
                        <a class="nav-lang" href="lang/en">Eng</a>&nbsp;|&nbsp;
                        <a class="nav-lang" href="lang/ru">Rus</a>&nbsp;|&nbsp;
                        <a class="nav-lang" href="lang/uz">Uzb</a>   
                    </span>
                </div>
            @enddesktop
	    </div>
        
        <div id="top-right" style="border:1px solid red">
            <ul class="login-nav float-right">
                @guest
                    @desktop
                        <li><a class="nav-links sm-vtext" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @elsedesktop
                        <li><a class="nav-links sm-vtext" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @enddesktop
                    <li><a class="nav-links sm-vtext" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li>
                        <span class="sm-vtext" style="color: white">
                            {{ Auth::user()->name }}!&nbsp;
                        </span>
                        <a class="nav-links sm-vtext" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" 
                            method="POST" style="display: none;">
                                @csrf
                        </form>
                    </li>
                @endguest
            </ul><br>
            <a href="/"><img src="img/home.png" width="35px" height="35px" class="float-right"></a>
        </div>

        
    </nav>