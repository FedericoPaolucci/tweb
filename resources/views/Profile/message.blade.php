@extends ('layouts.user')

@section ('content')
<div class="content">
    @foreach ($myuser->notyetviewed() as $notify)
        NOTIFICA DA: {{$notify->name}} {{$notify->surname}}
        <button id='margintop' onclick= "location.href ='{{ route('messagesview',$notify->id)}}'">VISUALIZZA</button>
    @endforeach
    
    @foreach ($myuser->viewed() as $list)
        NOTIFICA LETTA: {{$list->name}} {{$list->surname}}
        <button id='margintop' onclick= "location.href ='{{ route('messagesview',$list->id)}}'">VISUALIZZA</button>
    @endforeach
</div>
@endsection
