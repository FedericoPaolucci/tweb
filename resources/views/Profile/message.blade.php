@extends ('layouts.user')

@section ('content')
<div class="content">
    @foreach ($toaccept as $user)
        {{$user->name}} {{$user->surname}}
        Accetta: <button onclick= "location.href ='{{ route('friendaccept',$user->id)}}'">ACCETTA</button>
    @endforeach
</div>
@endsection
