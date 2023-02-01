@extends ('layouts.user')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed">
            @foreach ($myuser->notyetviewed() as $notify)
            @if ($notify->pivot->id_sender != $myuser->id)
            NOTIFICA DA: {{$notify->name}} {{$notify->surname}}
            <button id='margintop' onclick= "location.href ='{{ route('messagesview',$notify->id)}}'">VISUALIZZA</button>
            @endif
            @endforeach

            @foreach ($myuser->viewed() as $list)
            @if ($list->pivot->id_sender != $myuser->id)
            NOTIFICA LETTA: {{$list->name}} {{$list->surname}}
            <button id='margintop' onclick= "location.href ='{{ route('messagesview',$list->id)}}'">VISUALIZZA</button>
            @endif
            @endforeach
        </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>
@endsection
