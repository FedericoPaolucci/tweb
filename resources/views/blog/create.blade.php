@extends ('layouts.user')

@section ('content')

<div class="content" id="form-container">
    <h3>Creazione Blog</h3> 
        
            {{ Form::open(array('route' => 'blog.store', 'class' => 'contact-form')) }}
            @method('POST')

            <div  class="form-input-item">
                {{ Form::label('subject', 'Argomento del Blog', ['class' => 'label-input']) }}
                {{ Form::text('subject', '', ['class' => 'input', 'id' => 'subject']) }}
                
                @if ($errors->first('subject'))
                <ul class="errors">
                    @foreach ($errors->get('subject') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                
            </div>
            
            <div  class="form-input-item">
                {{ Form::label('about', 'Descrizione', ['class' => 'label-input']) }}
                {{ Form::text('about', '', ['class' => 'input', 'id' => 'about']) }}
                
                @if ($errors->first('about'))
                <ul class="errors">
                    @foreach ($errors->get('about') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
                
            </div>

            
            <div class="form-button">                
                {{ Form::submit('CREA', ['class' => 'button']) }}
            </div>
            
            {{ Form::close() }}
        
    

</div>

@endsection

