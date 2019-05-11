<!--
@desktop 
    <h1>Desktop view</h1>
@elsedesktop
    <h1>Mobile view</h1>
@enddesktop
-->

<!--
    websites of Investment
    ttps://www.middleeastinvestmentnetwork.com/entrepreneurs-home?gclid=EAIaIQobChMIrPDtveX54QIVk-iaCh2W6wDhEAAYASAAEgKPhvD_BwE
-->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>What do you invest for?</title>

        <!-- Fonts console has a warning for Nunito -->
        <!--link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"-->
        <link href="https://fonts.googleapis.com/css?family=Roboto: 400,400italic,500,700,700italic,300,300italic">

        <!-- bootstrap css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        <!-- sizbu css -->
        <link rel="stylesheet" type="text/css" href="css/sizbu.css">

        <!-- Styles -->
        <style>
           
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .welcome-links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        
        <!--div class="flex-center position-ref height-10 top-bg" style="border: thin solid black"-->
        <div class="container-fruid" height-10>
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3">
                    <img src="img/logo.png" class="top-left-logo">
                    <span class="top-left-1st">Business<br></span><span class="top-left-2nd">Network</span>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 flex-center">
                    <span class="top-msg">
                        <span>@lang('home/top.invest')</span><br>
                        <span class="space-top">
                                <a href="lang/en">@lang('home/top.en')</a> |
                                <a href="lang/ru">@lang('home/top.ru')</a> |
                                <a href="lang/uz">@lang('home/top.uz')</a> |
                        </span>
                    </span>
                </div>

                <div class="col-sm-3 col-md-3 col-lg-3">
                    @if (Route::has('login'))
                        <div class="login-links top-right-login">
                            @auth
                                <a href="{{ url('/home') }}">Home</a>         
                            @else
                                <a href="{{ route('login') }}">Loginn</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Registerr</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div><!-- row -->
        </div><!-- top panel -->

        <div class="flex-center position-ref">
            @include("subviews.m_main")   
        </div>

        @include("subviews.bottom")

    </body>
</html>
