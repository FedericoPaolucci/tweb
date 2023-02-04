<!--VISUALIZZAZIONE POSTS-->

@forelse ($posts as $post)
@if ($post->id_writer == $blog->id_owner)
<div class="messageviewerblog">    
    <div class="messageinfo">
        <h3>
            {{ $post->user->name }} {{ $post->user->surname }}
        </h3>
        <h4>
            {{ $post->posted_at }}
            @if (Auth::check() && Auth::id() == $post->id_writer)
            <img src='{{ asset('img/X.svg') }}' class="deletepost" alt="{{$post->id}}" width="20px" height="20px">
            @endif
        </h4>
    </div>
    {{ $post->body }}
</div> 
@else
<div class="messageviewersmall">    
    <div class="messageinfo">
        <h3>
            {{ $post->user->name }} {{ $post->user->surname }}
        </h3>
        <h4>
            {{ $post->posted_at }}
            @if (Auth::check() && Auth::id() == $post->id_writer)
            <img src='{{ asset('img/X.svg') }}' class="deletepost" alt="{{$post->id}}" width="20px" height="20px">
            @endif
        </h4>
    </div>
    {{ $post->body }}
</div> 
@endif
@empty
<div class="empty-container">Nessun post pubblicato...</div>
@endforelse
<p>
    {{$posts->links()}}
</p>