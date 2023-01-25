@extends('layouts.public')

<!-- @section('title', 'Registrazione') DA IMPLEMENTARE-->

@section('content')
<div class="auth-container">
    <p class="logo" onclick="location.href='{{route('admin')}}'"> LOGOCOMMUNITY </p>
    <div>Questa parte dovrebbe essere usata per dare una spiegazione, una info, magari una giustificazione... probabilmente rimarrà vuota e me ne dimenticherò. E' bello tornare sui propri passi, prendersela comoda, guardarsi intorno e pensare: forse dovrei scegliere questa strada. Questo spazio è pensato per pensare, per riflettere e conoscere quella parte nascosta in ognuno di noi che cerca nei giorni piovosi di venir fuori. Ultimo progetto prima della fine ma anche di un nuovo inizio, Benvenuto.</div>
</div>
@endsection

@section('loginform')
<div class="auth-container">
    <h3>Login</h3>
    <p>Utilizza questa form per autenticarti al sito</p>

        
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
            
            <div  class="form-item">
                <p> Se non hai già un account <a href="{{ route('register')}}">registrati</a></p>
            </div> 
            
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