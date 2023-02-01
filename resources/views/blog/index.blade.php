@extends ('layouts.user')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed">
            <h2>User</h2>  
            @empty($myblog)
            <div id="redirect">
                <div class="container-text">CREA IL TUO BLOG!</div>
                <button onclick= "location.href ='{{ route('blog.create') }}'">CREA BLOG</button>
            </div>
            @endempty

            @isset($myblog)
            <div id="redirect">
                <div class="container-text">VISUALIZZA IL TUO BLOG!</div>
                <button onclick= "location.href ='{{ route('blog.show', $myid)}}'">VISUALIZZA BLOG</button>
            </div>
            @endisset

            @isset($myblog)
            {{ Form::open(array('route' => ['blog.destroy', $myid], 'class' => 'contact-form')) }}
            @method('DELETE')
            <div id="redirect">
                <div class="container-text">CANCELLA IL TUO BLOG :(</div>
                <div class="form-button">                
                    {{ Form::submit('ELIMINA BLOG', ['class' => 'button']) }}
                </div>
            </div>
            {{ Form::close() }}
            @endisset
        </div>
    </div>
    <div class="subcontent" id="right"></div>
</div>
@endsection




