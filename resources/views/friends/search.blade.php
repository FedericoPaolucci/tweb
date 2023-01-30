@extends ('layouts.user')

@section ('content')
<div class="content">
    @foreach ($found as $user)
    <p> {{$user->name}} {{$user->surname}} 
        Vai al profilo: <button onclick= "location.href ='{{ route('profiles',$user->id)}}'">PROFILO</button>
    </p>
    @endforeach

</div>
@endsection
