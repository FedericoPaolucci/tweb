@extends('layouts.public')


@section('title')
G_64Community
@endsection


@section('script')
        <script src="{{ asset('js/jquery.js')}}"></script>
        <script src="{{ asset('js/animation.js')}}"></script>
@endsection

@section('loginform')
<div class="auth-container" id="auth-idcont">
    <h3 class="logintext">Login</h3>
    <p>Autenticati al sito</p>

        
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
                        
            <div  class="form-input-item">
                {{ Form::label('username', 'Nome Utente', ['class' => 'input-label']) }}
                {{ Form::text('username', '', ['class' => 'input','id' => 'username']) }}
                
                @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                
            </div>
            
            <div  class="form-input-item">
                {{ Form::label('password', 'Password', ['class' => 'input-label']) }}
                {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}
                
                @if ($errors->first('password'))
                <ul class="errors">
                    @foreach ($errors->get('password') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                
            </div>
            
            <div class="form-button">                
                {{ Form::submit('LOGIN', ['class' => 'button']) }}
            </div>
            
            {{ Form::close() }}
        
    

</div>
@endsection

@section('bottone')
<div id="redirect">
<div class="container-text">Non hai un account? Registrati!</div>
<button id="redirect" onclick="location.href='{{ route('register') }}'">REGISTRATI</button>
</div>
@endsection