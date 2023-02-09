@extends ('layouts.staff')

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
                        @isset($user->blog)
                        Vai al Blog: <button onclick= "location.href ='{{ route('blog.show',$user->id)}}'">BLOG</button>
                        @endisset
                        @empty($user->blog)
                        Nessun blog creato.
                        @endempty
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>
@endsection
