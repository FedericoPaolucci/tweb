@extends ('layouts.user')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left">
            <!--SCRIVI MESSAGGIO-->
            <div class="profile-me">
                {{ Form::open(array('route' => 'messageswrite', 'class' => 'contact-form')) }}
                @method('POST')

                {{ Form::hidden('id_sent_to', $that_user->id, ['class' => 'input', 'id' => 'id_sent_to']) }} 

                <div  class="form-input-item">
                <div class="messagetext">Scrivi un messaggio</div>
                    {{ Form::label('body', ' ', ['class' => 'label-input']) }}
                    {{ Form::textarea('body', '', ['class' => 'input', 'id' => 'bodym', 'rows'=> '5', 'style' => 'resize:none']) }}
                    @if ($errors->first('subject'))
                    <ul class="errors">
                        @foreach ($errors->get('subject') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <div class="form-button">                
                    {{ Form::submit('INVIA', ['class' => 'button']) }}
                </div>

                {{ Form::close() }}
            </div>
    </div>
    
    <div class="subcontent" id="center">
        <div class="listed" id="spacebetween">
            <div class="inlisted">
                @foreach ($allMessages as $message)

                @if ($message->type == 'request')
                @foreach ($myuser->notyetFriendsFrom as $user)
                @if ($user->id == $that_user->id)
                <div class="messageviewer" id="messagerequest">
                    <div class="messagetext">
                        {{$user->name}} {{$user->surname}} Ha mandato una richiesta di amicizia in data: {{$user->pivot->created_at}}
                    </div>
                    <button id='margintop' onclick= "location.href ='{{ route('friendaccept',$user->id)}}'">ACCETTA</button>
                    <button id="margintop" onclick= "location.href ='{{ route('friendremove',$user->id)}}'">RIFIUTA</button>
                </div>
                @endif
                @endforeach
                @endif

                @if ($message->type == 'normal')
                @if ($message->id_sender != $myuser->id)
                <div class="messageviewer" id="messagenormal">
                    <div class="messagetext">
                        <div class="messageinfo">
                        <h3>{{$that_user->name}} {{$that_user->surname}}:</h3>
                        <h4>{{$message->created_at}}</h4>
                        </div>
                        {{$message->body}}  
                    </div>
                </div>
                @endif
                @if ($message->id_sender == $myuser->id)
                <div class="messageviewer" id="messagenormalme">
                    <div class="messagetext">
                        <div class="messageinfo">
                        <h3>{{$myuser->name}} {{$myuser->surname}}:</h3>
                        <h4>{{$message->created_at}}</h4>
                        </div>
                        {{$message->body}}  
                    </div>
                </div>
                @endif

                @endif

                @if (($message->type == 'removed')&&($message->id_sender == $that_user->id))
                <div class="messageviewer" id="messageremoved">
                    <div class="messagetext">
                        {{$that_user->name}} {{$that_user->surname}} Ti ha rimosso dal gruppo di amici in data: {{$message->created_at}}
                    </div>
                </div>
                @endif

                @if (($message->type == 'notice')&&($message->id_sender == $that_user->id))
                <div class="messageviewer" id="messagenotice">
                    <div class="messagetext">
                        {{$message->body}} {{$message->created_at}}  
                    </div>
                </div>
                @endif
                @endforeach
            </div>   

            <div class="messagepag">
                {{$allMessages->links()}}
            </div>
        </div>
    </div>

    <!--ALTRO UTENTE-->
    <div class="subcontent" id="right">
        <div class="profile-me">
            <div class="unite">
                <div class="image-container">
                    <img src="{{ asset($that_user->img_url) }}" class="profile-img">
                </div>
                <h2>{{$that_user->name}} {{$that_user->surname}}</h2> 
                <p>#{{$that_user->username}}</p>
            </div>
            <button onclick= "location.href ='{{ route('profiles',$that_user->id)}}'">VAI AL PROFILO</button>
        </div>
    </div>
</div>
@endsection

@section ('script')
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/functions.js')}}"></script>
@endsection
