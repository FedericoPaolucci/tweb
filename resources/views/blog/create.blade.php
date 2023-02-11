@extends ('layouts.user')

@section('title')
Crea Blog
@endsection

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed">
            <div id="form-container">
                <h3 class="textblogcreate aligncenter">Creazione Blog</h3> 

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
                    {{ Form::textarea('about', '', ['class' => 'input', 'id' => 'about', 'rows'=> '5','style' => 'resize:none']) }}

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
        </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>
@endsection

