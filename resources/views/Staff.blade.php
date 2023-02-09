@extends ('layouts.staff')

@section ('content')
<div class="content-container content">
    <!--RIASSUNTO PROFILO-->
    <div class="subcontent" id="left">
        <div class="profile-me">
            <div class="aligncenter">
            <div class="textindex-container">
                <div class="textstaff">
                    Area riservata allo Staff
                </div>
            </div>
            <div class="textstaffp">{{$mystaff->name}} {{$mystaff->surname}}</div> 
            <p>#{{$mystaff->username}}</p>
            <p>Data di nascita: {{ Carbon\Carbon::parse($mystaff->birthday)->format('d-m-Y') }}</p>
            </div>
        </div>
    </div>

    <!--PROFILO-->
    <div class="subcontent" id="center">
        <div class="profile">
            <div class="textstaff">Recentemente sono stati pubblicati:</div>

            <!-- ultimi post-->
            @forelse ($posts as $post)
            <div class="messageviewerblog_home" onclick= "location.href ='{{ route('blog.show',$post->blog->id_owner)}}'">    
                <div class="messageinfo">
                    <h3>
                        {{ $post->user->name}} {{ $post->user->surname}} ha postato nel Blog "{{$post->blog->subject}}"
                    </h3>
                    <div class="messageinfo">
                        <h4>
                            {{ Carbon\Carbon::parse($post->posted_at)->format('H:i:s d-m-Y') }}
                        </h4>
                    </div>
                </div>
                {{ $post->body }}
            </div>
            @empty
            Niente da vedere.
            @endforelse
            
        </div>
    </div>
</div>
</div>
@endsection

@section ('script')
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/animation.js')}}"></script>
<script src="{{ asset('js/functions.js')}}"></script>
@endsection
