@extends ('layouts.user')

@section ('content')
<div class="content-container">
    <div class="content" id="content-left">
        <div class="image-container">
            <img src="{{ asset($that_user->img_url) }}" class="profile-img">
        </div>
        <h2>{{$that_user->name}} {{$that_user->surname}}</h2> 
        <p>#{{$that_user->username}}</p>
        <h4>Data di nascita: {{ Carbon\Carbon::parse($that_user->birthday)->format('d-m-Y') }}</h4>
        
        @if ($that_user->id == $currentid)
        <button id="margintop" onclick= "location.href='{{ route('profile.edit')}}'">MODIFICA PROFILO</button>
        @endif
        
    </div>

    <div class="content" id="content-right">
        <div class="profile">
            <div class="profile-item">
                <h2>Su di me.</h2>
                <p>{{$that_user->profile}}</p>
            </div>
            @isset($that_user->blog)
            <p>Ho scritto questo Blog -> "{{$that_user->blog->subject}}"</p>
            @endisset  
        </div>
        
        @if ($that_user->id == $currentid || $that_user->visibility == '1' || $isfriend == '1')
        <div class="profile-friends">
            <div class="title">
                GRUPPO DEGLI AMICI 
                <div class="allfriends">
                @forelse ($that_user->friends() as $friend)
                {{$friend->name}} {{$friend->surname}}
                @empty
                    <p>Nessun amico...</p>
                @endforelse
                </div>
            </div>
        @endif 
        
        </div>
    </div>
</div>
@endsection