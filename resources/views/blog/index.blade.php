@extends ('layouts.user')

@section ('content')
<section class="content">
    <div class="border" id="circularborder"></div>
<h2>User</h2>  
@empty($myblog)
<div id="redirect">
    <div class="container-text">CREA IL TUO BLOG!</div>
    <button onclick= "location.href='{{ route('blog.create') }}'">CREA BLOG</button>
</div>
@endempty

@isset($myblog)
<div id="redirect">
    <div class="container-text">VISUALIZZA IL TUO BLOG!</div>
    <button onclick= "location.href='{{ route('blog.show', $myid)}}'">VISUALIZZA BLOG</button>
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
</section>
@endsection




