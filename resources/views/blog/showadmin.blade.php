@extends ('layouts.admin')

@section('title')
Blog: {{$blog->subject}}
@endsection

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left">
        <div class="profile-me">
            <div class='Blog-info'>
                <h3>Tema: <span class="blogtitle">{{$blog->subject}}</span></h3>
                <div><span style='font-weight: bold;'>Descrizione:</span> {{$blog->about}}</div>
            </div>
        </div>
    </div>

    <div class="subcontent" id="center">
        <div class="listed">
            <div class='Blog-posts'>
                @include ('blog._post')
            </div>
        </div>
    </div>

    <div class="subcontent" id="right">
        <div class="profile-me">
            <div class="unite">
                <div class="image-container">
                    <img src="{{ asset($blog->user->img_url) }}" class="profile-img">
                </div>
                <h4>Blog di</h4>
                <h2>{{$blog->user->name}} {{$blog->user->surname}}</h2> 
                <p>#{{$blog->user->username}}</p>
            </div>
            <div class="deleteblog_admin" alt='{{$blog->id_owner}}' altt="{{$blog->subject}}">ELIMINA BLOG</div>
        </div>
    </div>
</div>
<div id="notifybody2" style="display: none;">
    <form id="notifyform2">
        <div class="textindex">Perchè vuoi eliminare il Blog?</div>
        <textarea name="body"></textarea>
        <input type="submit" class="button" value="Invia">
    </form>
</div>
@endsection

@section ('script')
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/functions.js')}}"></script>
@endsection

