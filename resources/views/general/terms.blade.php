<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>
        Terms of use
        </title>
    </head>
    <body class="bodyauth">
        
        <div class="window" id="central">
            @include('info/_terms')
            <p class="logo aligncenter" id="secondary" onclick="location.href='{{route('user')}}'"> -> G_64COMMUNITY <- </p>
        </div>
    </body>
</html>


