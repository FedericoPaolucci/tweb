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
    <h3>Registrazione</h3>
    <p>Utilizza questa form per registrarti al sito</p>



    {{ Form::open(array('route' => 'register', 'class' => 'contact-form')) }}

    <div  class="form-input-item">
        {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
        {{ Form::text('name', '', ['class' => 'input', 'id' => 'name']) }}

        @if ($errors->first('name'))
        <ul class="errors">
            @foreach ($errors->get('name') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif

    </div>

    <div  class="form-input-item">
        {{ Form::label('surname', 'Cognome', ['class' => 'label-input']) }}
        {{ Form::text('surname', '', ['class' => 'input', 'id' => 'surname']) }}

        @if ($errors->first('surname'))
        <ul class="errors">
            @foreach ($errors->get('surname') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif

    </div>

    <div  class="form-input-item">
        {{ Form::label('username', 'Nome Utente', ['class' => 'label-input']) }}
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
        {{ Form::label('email', 'Email', ['class' => 'label-input']) }}
        {{ Form::text('email', '', ['class' => 'input','id' => 'email']) }}

        @if ($errors->first('email'))
        <ul class="errors">
            @foreach ($errors->get('email') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div  class="form-input-item">
        {{ Form::label('birthday', 'Data di nascita', ['class' => 'label-input']) }}
        {{ Form::date('birthday', \Carbon\Carbon::now(), ['class' => 'input','id' => 'birthday']) }}

        @if ($errors->first('email'))
        <ul class="errors">
            @foreach ($errors->get('email') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div  class="form-input-item">
        {{ Form::label('password', 'Password', ['class' => 'label-input']) }}
        {{ Form::password('password', ['class' => 'input', 'id' => 'password']) }}

        @if ($errors->first('password'))
        <ul class="errors">
            @foreach ($errors->get('password') as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
        @endif

    </div>

    <div  class="form-input-item">
        {{ Form::label('password-confirm', 'Conferma password', ['class' => 'label-input']) }}
        {{ Form::password('password_confirmation', ['class' => 'input', 'id' => 'password-confirm']) }}
    </div>

    <div class="form-button">                
        {{ Form::submit('REGISTRA', ['class' => 'button']) }}
    </div>

    {{ Form::close() }}



</div>
@endsection

@section('bottone')
<div id="redirect">
    <div class="container-text">Hai un account? Allora effettua il LOGIN!</div>
    <button onclick= "location.href ='{{ route('login') }}'">LOGIN</button>
</div>

@endsection