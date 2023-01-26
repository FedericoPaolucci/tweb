<div class="auth-container active" id="homesection">
    <p class="logo" onclick="location.href='{{route('user')}}'"> LOGOCOMMUNITY </p>
    <div class="container-text">Benvenuto a: inserire nome comunità </div>
    @include('info/_default')
    @yield('bottone')
</div>

<div class="auth-container hidden" id="aboutus">
    @include('info/_aboutus')
    <p class="logo" id="secondary" onclick="location.href='{{route('user')}}'"> -> LOGOCOMMUNITY <- </p>
</div>

<div class="auth-container hidden" id="info">
    @include('info/_info')
    <p class="logo" id="secondary" onclick="location.href='{{route('user')}}'">  -> LOGOCOMMUNITY <- </p>
</div>

<div class="auth-container hidden" id="terms">
    @include('info/_terms')
    <p class="logo" id="secondary" onclick="location.href='{{route('user')}}'"> -> LOGOCOMMUNITY <- </p>
</div>