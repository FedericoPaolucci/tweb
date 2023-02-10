<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>
        @yield('title')
        </title>
    </head>
    <body class="bodyauth">
        
        <div class="window" id="windowleft">
            @include('info/general')
            <footer id="footerfloat">
                <nav>
                    @include('layouts/_footer')
                </nav>
            </footer>
        </div>
        
        <div class="window" id="windowright">
            @yield('loginform')
        </div>
            
        @yield('script')
    </body>
</html>

