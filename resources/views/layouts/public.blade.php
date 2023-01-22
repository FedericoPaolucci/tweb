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
            <p class="logo"> LOGOCOMMUNITY </p>
            <nav>
                    @include('layouts/_navpublic')
            </nav>
            <button>LOGIN</button>
            <button id="registrati">REGISTRATI</button>
        </header>
        <!-- FINE HEADER -->
        <!-- INIZIO CONTENT -->
        <section class="content">
            @yield('content')
        </section>
        <!-- FINE CONTENT -->
        <!-- FOOTER -->
        <footer>
            <p>SONO UN FOOTER :)</p>
        </footer>
    </body>
</html>

