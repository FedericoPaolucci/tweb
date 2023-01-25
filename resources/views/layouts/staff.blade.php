<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>Homepage pubblica</title>
        </head>
    <body class="bodydef">
        
            <!-- HEADER -->
            <header>
                <div class="border"></div>
                <p class="logo" onclick="location.href='{{route('staff')}}'"> LOGOCOMMUNITY </p>
                <ul class="menu">
                    @auth
                        <li><button id="logout" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOG-OUT</button></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    @endauth 
                </ul>
            </header>
            <!-- FINE HEADER -->
            <!-- INIZIO CONTENT -->
            
                @yield('content')
                
            <!-- FINE CONTENT -->
        
            <!-- FOOTER -->
            <footer>
                <nav>
                    @include('layouts/_footer')
                </nav>
            </footer>
            <!-- FINE FOOTER-->
        
    </body>
</html>

