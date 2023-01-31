@extends ('layouts.user')

@section ('content')
<div class="content">
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
@endsection
