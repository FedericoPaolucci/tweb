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
            <div class="header-row">
                <p class="logo" id="logonav" onclick="location.href ='{{route('user')}}'"> LOGOCOMMUNITY </p>

                <div id="searchbar">
                    {{ Form::open(array('route' => 'search', 'class' => 'contact-form-search')) }}
                    @method('POST')
                    {{ Form::text('searched','Nome Cognome', ['class' => 'input', 'id' => 'searched']) }}
                    @if ($errors->first('searched'))
                    <ul class="errors">
                        @foreach ($errors->get('searched') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-button">                
                        {{ Form::submit('RICERCA', ['class' => 'buttonsearch']) }}
                    </div>
                    {{Form::close()}}
                </div>
            </div>

            <ul class="menu">
                <li><button onclick= "location.href ='{{ route('messages')}}'">MESSAGGI</button></li>
                <li><button onclick= "location.href ='{{ route('blog.index')}}'">IL MIO BLOG</button></li>
                <li><button onclick= "location.href ='{{ route('user')}}'">PROFILO</button></li>

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
        <footer id="logged">
            <nav>
                @include('layouts/_footer')
            </nav>
        </footer>
        <!-- FINE FOOTER-->
        @yield ('script')
    </body>
</html>

