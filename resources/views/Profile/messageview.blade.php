@extends ('layouts.user')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed" id="spacebetween">
            <div class="inlisted" id="reversed">
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

                @if ($message->type == 'notice')
                <p>
                    {{$message->body}} {{$message->created_at}}  
                </p>
                @endif
                @endforeach
            </div>   

            <p>
                {{$allMessages->links()}}
            </p>
            <!--SCRIVI MESSAGGIO-->
            <div class="inlisted">
                {{ Form::open(array('route' => 'messageswrite', 'class' => 'contact-form')) }}
                @method('POST')

                {{ Form::hidden('id_sent_to', $that_user->id, ['class' => 'input', 'id' => 'id_sent_to']) }} 

                <div  class="form-input-item">
                    {{ Form::label('body', ' ', ['class' => 'label-input']) }}
                    {{ Form::textarea('body', '', ['class' => 'input', 'id' => 'body', 'rows'=> '5','style' => 'resize:none']) }}
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
