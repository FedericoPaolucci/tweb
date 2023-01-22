@extends ('layouts.public')

@section ('content')
<h1>email: {{$user->email}}</h1>

<p>{{$user->name}} {{$user->surname}}, questo è il tuo nome</p>

<h2>{{$oggetto}}<h2>  
@endsection