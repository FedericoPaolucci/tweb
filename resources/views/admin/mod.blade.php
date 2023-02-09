@extends ('layouts.staff')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed">
            <div class="textstaff">Ultime moderazioni:</div>
        <div class="inlisted">
            @forelse ($Messages as $message)

            <div class="messageviewer" id="messagenotice">
                <div class="messagetext">
                    <div class="messageinfo">
                        <h4> Utente moderato: {{$message->name}} {{$message->surname}}
                        <h4>{{$message->pivot->created_at}}</h4>
                    </div>
                    {{$message->pivot->body}}  
                </div>
            </div>
            @empty
            <div class="textstaff">Ancora niente da visualizzare.</div>
            @endforelse
        </div>
    </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>
@endsection