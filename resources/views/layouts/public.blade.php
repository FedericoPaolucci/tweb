<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>Homepage pubblica</title>
        </head>
    <body>
        <div class="wrapper">
            <!-- HEADER -->
            <header>
                <p class="logo" onclick="location.href='{{route('prova')}}'"> LOGOCOMMUNITY </p>
                <ul class="menu">
                    <li><button id="login" onclick="location.href='{{route('login')}}'">LOGIN</button></li>
                    <li><button id="registrati" onclick="location.href='{{route('register')}}'">REGISTRATI</button></li>
                </ul>
            </header>
            <!-- FINE HEADER -->
            <!-- INIZIO CONTENT -->
            <section class="content">
                @yield('content')
            </section>
            <!-- FINE CONTENT -->
        
            <!-- FOOTER -->
            <footer>
                <nav>
                    @include('layouts/_footer')
                </nav>
            </footer>
            <!-- FINE FOOTER-->
        </div>
    </body>
</html>

