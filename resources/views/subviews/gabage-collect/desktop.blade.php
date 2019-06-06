
<div class="col-sm-3">
    <img src="img/logo.png" class="top-left-logo">
    <span class="md-desk-text top-left-msg1 font-red">@lang('home/top.location1')</span>
    <span class="md-desk-text top-left-msg2 font-bold font-black bgcolor-white">
        <a href="lang/en">Eng</a> |
        <a href="lang/ka">Kaz</a> |
        <a href="lang/ru">Rus</a> |
        <a href="lang/uz">Uzb</a>
    </span>
</div>

<!--div class="col-sm-6 flex-center" style="border: thin solid red"-->
<div class="col-sm-6 pp-center">
    <!--span class="lg-desk-text font-darkgreen font-bold top-msg1 dis-block">
        <img src="img/search.png" width="30px" height="30px">@lang('home/top.invest1')
    </span>
    <span class="lg-desk-text font-red font-bold top-msg2 dis-block">
        &nbsp;&nbsp;&nbsp;<img src="img/fund.png" width="15px" height="12px">&nbsp;@lang('home/top.invest2')
    </span-->
    <div class="md-text font-red font-bold">
        Do you @lang('home/top.invest2')?
    </div>
    <div class="md-text font-darkgreen font-bold">
        Where are @lang('home/top.invest3')?
    </div>
    <div class="md-text font-black font-bold">
        Are you looking for @lang('home/top.invest1')?
    </div>
</div>

<div class="col-sm-3">
    @if (Route::has('login'))
        <div class="top-right-login sm-desk-text">
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