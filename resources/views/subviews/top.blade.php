
    <nav class="ppnav-top">
        <div id="top-left">
            <a href="/" ><img class="logo-img pt-1 pl-1" src="{{$path}}img/logo.png"></a>

            @desktop 
                <button type="button" class="btn btn-info btn-sm" 
                    data-toggle="modal" data-target="#infoModal">i</button>
                <div>
                    <span class="font-bold md-vtext">
                        <a class="nav-lang" href="lang/en">Eng</a>|
                        <a class="nav-lang" href="lang/ru">Rus</a>
                    </span>
                </div>
            @elsedesktop
                <span class="md-vtext font-bold pp-center">@lang('general.company-short')</span>
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
                            <span class="font-bold">@lang('general.close')</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="top-middle">
            @desktop 
                <div class="rcorner pp-center">
        	        <span class="font-red md-vtext">@lang('general.continent')</span><br>
        	        <span class="font-bold lg-vtext">@lang('general.ca-lands')</span>
                </div>
            @elsedesktop
                <div class="rcorner pp-center">
                    <span class="font-red md-vtext">@lang('general.continent')</span><br>
                    <span class="lg-vtext">
                        <a class="nav-lang" href="lang/en">Eng</a>&nbsp;|&nbsp;
                        <a class="nav-lang" href="lang/ru">Rus</a> 
                    </span>
                </div>
            @enddesktop
	    </div>
        
        <div id="top-right">
            <ul class="d-flex flex-row-reverse  pp-no-dot pt-1">
                @guest
                    <li><a class="nav-links sm-vtext" href="{{ route('register') }}">@lang('general.register')</a></li>
                    @desktop
                        <li><a class="nav-links sm-vtext" href="{{ route('login') }}">@lang('auth.lg')</a>
                        </li>
                    @elsedesktop
                        <li><a class="nav-links sm-vtext" href="{{ route('login') }}">@lang('auth.lg')</a></li>
                    @enddesktop
                    
                @else
                    <li>
                        <span class="sm-vtext" style="color: white">
                            {{ Auth::user()->name }}!&nbsp;
                        </span>
                        <a class="nav-links sm-vtext" href="{{ route('logout') }}" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">@lang('auth.lo')
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" 
                            method="POST" style="display: none;">
                                @csrf
                        </form>
                    </li>
                @endguest
            </ul>

            @desktop
                <a href="/"><img src="img/home.png" width="50px" height="35px" class="float-right pr-3"></a>
            @elsedesktop
                <a href="/"><img src="img/home.png" width="65px" height="45px" class="float-right pr-3"></a>
            @enddesktop
        </div>

    </nav>