<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- not working with chrome developer's viewpoint -->
    <!--meta name="viewport" content="width=device-width, initial-scale=1"-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('general.title')</title>

    <?php 
        global $path;

        if (strpos($_SERVER['REQUEST_URI'], "password/reset") !== false)
            $path = "../../"; 
        else
            $path = "";
    ?>
    
    <!-- css and js from pp -->
    @desktop 
        <link rel="stylesheet" type="text/css" href="{{$path}}css/pp-desktop.css">
    @elsedesktop
        <link rel="stylesheet" type="text/css" href="{{$path}}css/pp-mobile.css">
    @enddesktop
    <link rel="stylesheet" type="text/css" href="{{$path}}css/pp.css">
    <script src="{{$path}}js/pp.js"></script>

    <!-- bootstrap CDN-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>
    
    @include("subviews.top")

    <main class="height-mid">
        @yield('content')
    </main>
    
    @include("subviews.bottom")

</body>
</html>
