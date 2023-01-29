@extends ('layouts.user')

@section ('content')
<div class="content">
    <div class='Blog-info'>
        <div>{{$blog->subject}}</div>
        <div>--------</div>
        <div>{{$blog->about}}</div>
    </div>
    <div class='Blog-posts'>
        @include ('blog._post')
    </div>
</div>
@endsection

@section ('script')
        <script src="{{ asset('js/jquery.js')}}"></script>
        <script src="{{ asset('js/functions.js')}}"></script>
@endsection