@extends ('layouts.user')

@section('title')
@if ($that_user->id == $currentid)
Il mio Profilo
@else
Profilo di {{$that_user->username}}
@endif
@endsection

@section ('content')
<div class="content-container content">
    <!--RIASSUNTO PROFILO-->
    <div class="subcontent" id="left">
        <div class="profile-me">
            <div class="image-container">
                <img src="{{ asset($that_user->img_url) }}" class="profile-img">
            </div>
            <h2>{{$that_user->name}} {{$that_user->surname}}</h2> 
            <p>#{{$that_user->username}}</p>
            @if ($that_user->isfriend($currentid) || $that_user->id == $currentid)
            <p>Data di nascita: {{ Carbon\Carbon::parse($that_user->birthday)->format('d-m-Y') }}</p>
            @endif

            @if ($that_user->id == $currentid)
            <button id="margintop" onclick= "location.href ='{{ route('profile.edit')}}'">MODIFICA PROFILO</button>
            @endif

            <!--AGGIUNGI AMICO-->
            @if ($that_user->isfriend($currentid) || $that_user->id == $currentid || $that_user->ispending($currentid))
            @else
            {{ Form::open(array('route' => 'friendrequest')) }}
            @method('POST')
            {{ Form::hidden('id_user2', $that_user->id, ['class' => 'input', 'id' => 'id']) }}
            {{ Form::submit('AGGIUNGI AGLI AMICI', ['class' => 'button', 'id' => 'margintop']) }}
            {{ Form::close() }}
            @endif
            @if ($that_user->ispending($currentid) && $that_user->id != $currentid)
            <p>Richiesta già inviata.</p>
            @endif
            <!--RIMUOVI AMICO-->
            @if ($that_user->isfriend($currentid))
            {{ Form::open(array('route' => 'friendremove')) }}
            @method('POST')
            {{ Form::hidden('id', $that_user->id, ['class' => 'input', 'id' => 'id']) }}
            {{ Form::submit('RIMUOVI AMICO', ['class' => 'areyousure2 button', 'id' => 'margintop']) }}
            {{ Form::close() }}
            @endif
        </div>
    </div>

    <!--PROFILO-->
    <div class="subcontent" id="center">
        <div class="profile">
            @if ($that_user->id == $currentid || $that_user->visibility == '1' || $isfriend == '1')
            <div class="profile-item">
                <div class="listed">
                    <h2 class="textindex">Qualcosa su di me...</h2>
                    <p>{{$that_user->profile}}</p>
                </div>
            </div>

            <div class="centered"> 
                @isset($that_user->blog)
                <button onclick= "location.href ='{{ route('blog.show', $that_user->id)}}'">VISUALIZZA BLOG</button>
                @endisset

                @if ($that_user->id != $currentid)
                <button class="marginleft" onclick= "location.href ='{{ route('messagesview', $that_user->id)}}'">INVIA MESSAGGIO</button>
                @endif

                @if ($that_user->id == $currentid)
                @empty($that_user->blog)
                <div id="redirect">
                    <div class="container-text">CREA IL TUO BLOG!</div>
                    <button onclick= "location.href ='{{ route('blog.create') }}'">CREA BLOG</button>
                </div>
                @endempty
                @endif
            </div>

            @else
            <p>L'utente è visibile solo ai suoi amici</p>
            @endif
        </div>
    </div>

    <!-- TABELLA LATERALE-->
    <div class="subcontent" id="right">
        <div class="profile-friends">
            <!-- TABELLA AMICI-->
            @if ($that_user->id == $currentid || $that_user->visibility == '1' || $isfriend == '1')
            <div class="side">
                <div class="textindex">
                    GRUPPO DEGLI AMICI 
                </div>
                <div class="allfriends">
                    @forelse ($that_user->friends() as $friend)
                    <button class="elementfriendb" onclick= "location.href ='{{ route('profiles',$friend->id)}}'">{{$friend->name}} {{$friend->surname}}</button>
                    @empty
                    <p>Nessun amico...</p>
                    @endforelse
                </div>

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
<script src="{{ asset('js/functions.js')}}"></script>
@endsection