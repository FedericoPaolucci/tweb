@extends ('layouts.user')

@section ('content')
<div class="content-container">
    <div class="content" id="content-left">
        <div class="image-container">
            <img src="{{ asset($current_user->img_url) }}" class="profile-img">
        </div>
    </div>

    <div class="content" id="content-right">
        <div class="profile">
            <!--FORM MODIFICA-->
            {{ Form::open(array('route' => 'profile.update', 'class' => 'contact-form')) }}
            @method('PUT')

            {{ Form::hidden('id', $current_user->id, ['class' => 'input', 'id' => 'id']) }} <!--ID-->

            <div  class="form-input-item">
                {{ Form::label('name', 'Nome', ['class' => 'label-input']) }}
                {{ Form::text('name', $current_user->name, ['class' => 'input', 'id' => 'name']) }}
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
                {{ Form::text('surname', $current_user->surname, ['class' => 'input', 'id' => 'surname']) }}
                @if ($errors->first('surname'))
                <ul class="errors">
                    @foreach ($errors->get('surname') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div  class="form-input-item">
                {{ Form::label('birthday', 'Data di nascita', ['class' => 'label-input']) }}
                {{ Form::date('birthday', $current_user->birthday, ['class' => 'input', 'id' => 'birthday']) }}
                @if ($errors->first('birthday'))
                <ul class="errors">
                    @foreach ($errors->get('birthday') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div  class="form-input-item">
                {{ Form::label('visibility', 'Visibilità a utenti non amici', ['class' => 'label-input']) }}
                {{ Form::select('visibility',['1' => 'visibile', '0' =>'non visibile'],$current_user->visibility, ['class' => 'input', 'id' => 'visibility']) }}
                @if ($errors->first('visibility'))
                <ul class="errors">
                    @foreach ($errors->get('visibility') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div  class="form-input-item">
                {{ Form::label('profile', 'Scrivi qualcosa su di te.', ['class' => 'label-input']) }}
                {{ Form::textarea('profile', $current_user->profile, ['class' => 'input', 'id' => 'profile', 'rows'=> '5','style' => 'resize:none']) }}
                @if ($errors->first('profile'))
                <ul class="errors">
                    @foreach ($errors->get('profile') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div  class="form-input-item">
                {{ Form::label('img_url', 'Cambia immagine del profilo', ['class' => 'label-input']) }}
                {{ Form::file('img_url',['class' => 'input', 'id' => 'img_url']) }}
                @if ($errors->first('img_url'))
                <ul class="errors">
                    @foreach ($errors->get('img_url') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            

            <div class="form-button">                
                {{ Form::submit('MODIFICA', ['class' => 'button']) }}
            </div>

            {{ Form::close() }}
        </div>

    </div>
</div>
</div>
@endsection

@section ('script')
        <script src="{{ asset('js/jquery.js')}}"></script>
        <script src="{{ asset('js/functions.js')}}"></script>
@endsection