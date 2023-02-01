<!--VISUALIZZAZIONE POSTS-->

@forelse ($posts as $post)
<div class="posts-container">    
    <div class="post-info">
        <div class="post-who">

            {{ $post->user->username }}
        </div>
        <div class="post-when">
            {{ $post->posted_at }}
        </div>
    </div>
    <div class="post-body">
        <div class="post-text">
            {{ $post->body }}
        </div>  
        @if (Auth::check() && Auth::id() == $post->id_writer)
        <img src='{{ asset('img/X.svg') }}' class="deletepost" alt="{{$post->id}}" width="20px" height="20px">
        @endif
    </div> 
</div> 
@empty
<div class="empty-container">Nessun post pubblicato...</div>
@endforelse
<p>
    {{$posts->links()}}
</p>

<div class="container-text">Aggiungi un post!</div>
<!--FORM CREAZIONE NUOVO POST-->
{{ Form::open(array('route' => 'post', 'class' => 'contact-form')) }}
@method('POST')

{{ Form::hidden('id_blog_owner', $blog->id_owner, ['class' => 'input', 'id' => 'body']) }} <!--ID BLOG-->

<div  class="form-input-item">
    {{ Form::label('body', ' ', ['class' => 'label-input']) }}
    {{ Form::textarea('body', '', ['class' => 'input', 'id' => 'body', 'rows'=> '5','style' => 'resize:none']) }}
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