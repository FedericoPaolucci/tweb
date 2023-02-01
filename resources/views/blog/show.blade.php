@extends ('layouts.user')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed">
            <div class='Blog-info'>
                <div>{{$blog->subject}}</div>
                <div>--------</div>
                <div>{{$blog->about}}</div>
            </div>
            <div class='Blog-posts'>
                @include ('blog._post')
            </div>
        </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>

@endsection

@section ('script')
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/functions.js')}}"></script>
@endsection