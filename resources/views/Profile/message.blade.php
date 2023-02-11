@extends ('layouts.user')

@section('title')
I tuoi messaggi
@endsection

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed" style="align-items:center;">
            <div class="textindex">MESSAGGI</div>
            @foreach ($myuser->notyetviewed() as $notify)
            @if ($notify->pivot->id_sender != $myuser->id)
            @if ($notify->role == 'user')
            <div class="searchviewerto">
                <div class="searchinfo">
                    <div class="bold">NUOVA NOTIFICA: {{$notify->name}} {{$notify->surname}}</div>
                        <button onclick= "location.href ='{{ route('messagesview',$notify->id)}}'">VISUALIZZA</button>
                </div>
            </div>
            @else
            <div class="searchviewerto">
                <div class="searchinfo">
                    <div class="bold">NOTIFICA DA STAFF: {{$notify->name}} {{$notify->surname}}</div>
                        <button onclick= "location.href ='{{ route('messagesview',$notify->id)}}'">VISUALIZZA</button>
                </div>
            </div>
            @endif
            @endif
            @endforeach

            @foreach ($myuser->viewed() as $list)
            @if ($list->pivot->id_sender != $myuser->id)
            @if ($list->role == 'user')
            <div class="searchviewer">
                <div class="searchinfo">
                    NOTIFICHE VISUALIZZATE: {{$list->name}} {{$list->surname}}
                        <button onclick= "location.href ='{{ route('messagesview',$list->id)}}'">VISUALIZZA</button>
                </div>
            </div>
            @else
            <div class="searchviewer">
                <div class="searchinfo">
                    NOTIFICHE STAFF VISUALIZZATE: {{$list->name}} {{$list->surname}}
                        <button onclick= "location.href ='{{ route('messagesview',$list->id)}}'">VISUALIZZA</button>
                </div>
            </div>
            @endif
            @endif
            @endforeach

        </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>
@endsection
