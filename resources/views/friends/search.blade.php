@extends ('layouts.user')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed">
            @foreach ($found as $user)
            <div class="searchviewer"> 
                <div class="searchinfo">
                    <h3>{{$user->name}} {{$user->surname}}</h3>
                    <div class="gotoprofile">
                    Vai al profilo: <button onclick= "location.href ='{{ route('profiles',$user->id)}}'">PROFILO</button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>
@endsection
