
    <nav class="ppnav-top">
    
        <div class="pp-div-inline" id="top-left">
            <a href="/" ><img class="logo-img" src="{{$path}}img/logo.png"></a>

            @desktop 
                <button type="button" class="btn btn-info btn-sm" 
                    data-toggle="modal" data-target="#infoModal">info</button>
            @elsedesktop
                <button type="button" class="btn btn-info btn-lg" 
                    data-toggle="modal" data-target="#infoModal">Info</button>
            @enddesktop

            <div>
                <span class="font-bold md-vtext">
                    <a class="nav-lang" href="lang/en">Eng</a>|
                    <a class="nav-lang" href="lang/ka">Kaz</a>|
                    <a class="nav-lang" href="lang/ru">Rus</a>|
                    <a class="nav-lang" href="lang/uz">Uzb</a>   
                </span>
            </div>
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

        <div class="rcorner pp-div-inline">
            <div class="pp-center">
    	        <span class="font-red md-vtext">@lang('general.continent')</span><br>
    	        <span class="font-bold lg-vtext">@lang('general.top-msg')</span>
            </div>
	    </div>
        
        <div class="pp-div-inline" id="top-right" >
            <ul class="login-nav">
                @guest
                    <li>
                        <a  class="nav-links sm-vtext" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    </li>
                    <li>
                        <a class="nav-links sm-vtext" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </li>
                @else
                    <li>
                        <span style="color: white">Hello {{ Auth::user()->name }}!</span><br>
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
            </ul>
        </div>

        
    </nav>