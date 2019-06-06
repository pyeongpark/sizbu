
<div class="col-4">
    <img src="img/logo.png" class="top-left-logo">
    <span class="sm-text top-left-msg1 font-red">@lang('home/top.location1')</span>
    <span class="sm-text top-left-msg2 font-bold font-black bgcolor-white">
        <a href="lang/en">Eng</a> |
        <a href="lang/ka">Kaz</a> |
        <a href="lang/ru">Rus</a> |
        <a href="lang/uz">Uzb</a>
    </span>
</div>

<!-- Do not use flex-center for multi rows in a div -->
<div class="col-4 height-10 pp-center pp-padding-lr0"  style="padding-top:5px">
    <div class="md-text font-black font-bold">
        <img src="img/search.png" width="20px" height="20px">@lang('home/top.invest1')
    </div>
    <div class="md-text font-red font-bold">
        <img src="img/fund.png" width="15px" height="12px">&nbsp;@lang('home/top.invest2')
    </div>
    <div class="md-text font-darkgreen font-bold">
        <img src="img/partner.png" width="15px" height="12px">&nbsp;@lang('home/top.invest3')
    </div>
</div>

<div class="col-4">
    
    @if (Route::has('login'))
        <div class="top-right-login md-text">
            @auth
                <a class="login-links" href="{{ url('/home') }}">Home</a>         
            @else
                <a class="login-links" href="{{ route('login') }}">@lang('home/top.login')</a>
                @if (Route::has('register'))
                    <a class="login-links" href="{{ route('register') }}">@lang('home/top.register')</a>
                @endif
            @endauth
        </div>
    @endif
    
</div>