@extends ('layouts.user')

@section('title')
@if ($myuser->id == $blog->id_owner)
Il mio Blog
@else
Blog: {{$blog->subject}}
@endif
@endsection

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left">
        <div class="profile-me">
            <div class='Blog-info'>
                <h3>Tema: <span class="blogtitle">{{$blog->subject}}</span></h3>
                <div><span style='font-weight: bold;'>Descrizione:</span> {{$blog->about}}</div>
            </div>
            <!--FORM CREAZIONE NUOVO POST-->
            {{ Form::open(array('route' => 'post', 'class' => 'contact-form')) }}
            @method('POST')

            {{ Form::hidden('id_blog_owner', $blog->id_owner, ['class' => 'input', 'id' => 'body']) }} <!--ID BLOG-->

            <div  class="form-input-item">
                <div class="container-text">Aggiungi un post!</div>
                {{ Form::label('body', ' ', ['class' => 'label-input']) }}
                {{ Form::textarea('body', '', ['class' => 'input', 'id' => 'bodym', 'rows'=> '5','style' => 'resize:none']) }}
                @if ($errors->first('subject'))
                <ul class="errors">
                    @foreach ($errors->get('subject') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="form-button">                
                {{ Form::submit('INSERISCI POST', ['class' => 'button']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>


    <div class="subcontent" id="center">
        <div class="listed">
            <div class='Blog-posts'>
                @include ('blog._post')
            </div>
        </div>
    </div>


    <div class="subcontent" id="right">
        <div class="profile-me">
            <div class="unite">
                <div class="image-container">
                    <img src="{{ asset($blog->user->img_url) }}" class="profile-img">
                </div>
                <h4>Blog di</h4>
                <h2>{{$blog->user->name}} {{$blog->user->surname}}</h2> 
                <p>#{{$blog->user->username}}</p>
            </div>

            @if ($myuser->id != $blog->id_owner)
            <button onclick= "location.href ='{{ route('profiles',$blog->user->id)}}'">VAI AL PROFILO</button>
            @endif

            <!--ELIMINAZIONE BLOG-->
            @if ($myuser->id == $blog->id_owner)
            {{ Form::open(array('route' => ['blog.destroy', $myuser->id], 'class' => 'contact-form')) }}
            @method('DELETE')
            <div id="redirect">
                <div class="form-button">                
                    {{ Form::submit('ELIMINA BLOG', ['class' => 'button areyousure']) }}
                </div>
            </div>
            {{ Form::close() }}
            @endif
        </div>
    </div>
</div>

@endsection

@section ('script')
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/functions.js')}}"></script>
@endsection