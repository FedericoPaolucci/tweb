<!--VISUALIZZAZIONE POSTS-->

@forelse ($posts as $post)
@if ($post->id_writer == $blog->id_owner)
<div class="messageviewerblog">    
    <div class="messageinfo">
        <h3>
            {{ $post->user->name }} {{ $post->user->surname }}
        </h3>
        <div class="messageinfo">
            <h4>
                {{ Carbon\Carbon::parse($post->posted_at)->format('H:i:s d-m-Y') }}
            </h4>
            @if (Auth::check() && Auth::id() == $post->id_writer)
            <img src='{{ asset('img/X.svg') }}' class="deletepost" alt="{{$post->id}}">
            @endif
            @if (Auth::check() && ($myuser->role == 'staff' || $myuser->role =='admin'))
            <img src='{{ asset('img/X.svg') }}' class="deletepost_admin" alt='{{$post->id}}' altt="{{$post->body}}">
            @endif

        </div>
    </div>
    {{ $post->body }}
</div> 
@else
<div class="messageviewersmall">    
    <div class="messageinfo">
        <h3>
            {{ $post->user->name }} {{ $post->user->surname }}
        </h3>
        <div class="messageinfo">
            <h4>
                {{ Carbon\Carbon::parse($post->posted_at)->format('H:i:s d-m-Y') }}
            </h4>
            @if (Auth::check() && Auth::id() == $post->id_writer)
            <img src='{{ asset('img/X.svg') }}' class="deletepost" alt="{{$post->id}}">
            @endif
            @if (Auth::check() && ($myuser->role == 'staff' || $myuser->role =='admin'))
            <img src='{{ asset('img/X.svg') }}' class="deletepost_admin" alt='{{$post->id}}' altt="{{$post->body}}">
            @endif

        </div>
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


<div id="notifybody" style="display: none;">
    <form id="notifyform">
        <div class="textindex">Perchè vuoi eliminare il Post?</div>
        <textarea name="body"></textarea>
        <input type="submit" class="button" value="Invia">
    </form>
</div>