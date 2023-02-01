@extends ('layouts.user')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed">
            @foreach ($found as $user)
            <p> {{$user->name}} {{$user->surname}} 
                Vai al profilo: <button onclick= "location.href ='{{ route('profiles',$user->id)}}'">PROFILO</button>
            </p>
            @endforeach

        </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>
@endsection
