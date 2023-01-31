@extends ('layouts.user')

@section ('content')
<div class="content-container">
    <!--RIASSUNTO PROFILO-->
    <div class="content" id="content-left">
        <div class="image-container">
            <img src="{{ asset($that_user->img_url) }}" class="profile-img">
        </div>
        <h2>{{$that_user->name}} {{$that_user->surname}}</h2> 
        <p>#{{$that_user->username}}</p>
        <p>Data di nascita: {{ Carbon\Carbon::parse($that_user->birthday)->format('d-m-Y') }}</p>

        @if ($that_user->id == $currentid)
        <button id="margintop" onclick= "location.href ='{{ route('profile.edit')}}'">MODIFICA PROFILO</button>
        @endif

        <!--AGGIUNGI AMICO-->
        @if ($that_user->isfriend($currentid) || $that_user->id == $currentid || $that_user->ispending($currentid))
        @else
        <button id="margintop" onclick= "location.href ='{{ route('friendrequest',$that_user->id)}}'">AGGIUNGI AMICO</button>
        @endif
        @if ($that_user->ispending($currentid) && $that_user->id != $currentid)
        <p>Richiesta già inviata.</p>
        @endif
        <!--RIMUOVI AMICO-->
        @if ($that_user->isfriend($currentid))
        <button id="margintop" onclick= "location.href ='{{ route('friendremove',$that_user->id)}}'">RIMUOVI AMICO</button>
        @endif

    </div>

    <!--PROFILO-->
    <div class="content" id="content-right">
        <div class="profile">
            @if ($that_user->id == $currentid || $that_user->visibility == '1' || $isfriend == '1')
            <div class="profile-item">
                <h2>Su di me.</h2>
                <p>{{$that_user->profile}}</p>

            </div>
            @isset($that_user->blog)
            <p>Ho scritto questo Blog -> "{{$that_user->blog->subject}}"</p>
            @endisset
            @else
            <p>L'utente è visibile solo ai suoi amici</p>
            @endif
        </div>
        <!-- TABELLA LATERALE-->
        <div class="profile-friends">
            <!-- TABELLA AMICI-->
            @if ($that_user->id == $currentid || $that_user->visibility == '1' || $isfriend == '1')
            <div class="side">
                <div class="title">
                    GRUPPO DEGLI AMICI 
                </div>
                <div class="allfriends">
                    @forelse ($that_user->friends() as $friend)
                    <button id="margintop" onclick= "location.href ='{{ route('profiles',$friend->id)}}'">{{$friend->name}} {{$friend->surname}}</button>
                    @empty
                    <p>Nessun amico...</p>
                    @endforelse
                </div>
            </div>
            <div class="allfriends">
                <button onclick= "location.href ='{{ route('blog.show', $that_user->id)}}'">BLOG</button>
            </div>
            @endif 
        </div>
    </div>
</div>
</div>
@endsection

@section ('script')
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/animation.js')}}"></script>
@endsection