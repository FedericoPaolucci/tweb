<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <title>Homepage pubblica</title>
        </head>
    <body>
        
            <!-- HEADER -->
            <header>
                <p class="logo" onclick="location.href='{{route('homepublic')}}'"> LOGOCOMMUNITY </p>
                <ul class="menu">
                    <li><button id="login" onclick="location.href='{{route('login')}}'">LOGIN</button></li>
                    <li><button id="registrati" onclick="location.href='{{route('register')}}'">REGISTRATI</button></li>
                    @auth
        <li><a href="" class="highlight" title="Esci dal sito" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @endauth 
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
        
    </body>
</html>

