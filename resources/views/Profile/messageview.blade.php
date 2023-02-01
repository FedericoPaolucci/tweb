@extends ('layouts.user')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed">
            @foreach ($allMessages as $message)

            @if ($message->type == 'request')
            @foreach ($myuser->notyetFriendsFrom as $user)
            @if ($user->id == $that_user->id)
            {{$user->name}} {{$user->surname}} Ha mandato una richiesta di amicizia in data:{{$user->pivot->created_at}}
            Accetta: <button id='margintop' onclick= "location.href ='{{ route('friendaccept',$user->id)}}'">ACCETTA</button>
            <button id="margintop" onclick= "location.href ='{{ route('friendremove',$user->id)}}'">RIFIUTA</button>
            @endif
            @endforeach
            @endif

            @if ($message->type == 'normal')
            <p>
                {{$message->id_sender}}  {{$message->body}}  
            </p>
            @endif

            @if (($message->type == 'removed')&&($message->id_sender == $that_user->id))
            <p>
                {{$that_user->name}} {{$that_user->surname}} Ti ha rimosso dal gruppo di amici in data:{{$message->created_at}}
            </p>
            @endif
            @endforeach
        </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>
@endsection
