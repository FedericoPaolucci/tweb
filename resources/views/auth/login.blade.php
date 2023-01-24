@extends('layouts.public')

<!-- @section('title', 'Registrazione') DA IMPLEMENTARE-->

@section('content')
<div class="auth-container">
    <h3>Login</h3>
    <p>Utilizza questa form per autenticarti al sito</p>

    
        <div class="auth-form">
            {{ Form::open(array('route' => 'login', 'class' => 'contact-form')) }}
            
            <div  class="input-item">
                <p> Se non hai già un account <a  href="{{ route('register')}}">registrati</a></p>
            </div> 
            
            <div  class="input-item">
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
            
            <div  class="input-item">
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
                {{ Form::submit('Login', ['class' => 'button']) }}
            </div>
            
            {{ Form::close() }}
        </div>
    

</div>
@endsection
