@extends ('layouts.user')

@section ('content')
<div class="content">
    @foreach ($toaccept as $user)
        {{$user->name}} {{$user->surname}} {{$user->pivot->created_at}}
        Accetta: <button id='margintop' onclick= "location.href ='{{ route('friendaccept',$user->id)}}'">ACCETTA</button>
        <button id="margintop" onclick= "location.href ='{{ route('friendremove',$user->id)}}'">RIFIUTA</button>
    @endforeach
</div>
@endsection
