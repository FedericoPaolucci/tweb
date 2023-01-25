<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>Homepage pubblica</title>
        </head>
    <body class="bodyauth">
        
        <div class="window" id="windowleft">
            <div class="border" id="circularborder"></div>
            @yield('content')
            <footer id="footerfloat">
                <nav>
                    @include('layouts/_footer')
                </nav>
            </footer>
        </div>
        
        <div class="window" id="windowright">
            <div class="border" id="circularborder"></div>
            @yield('loginform')
        </div>
            
        
    </body>
</html>

