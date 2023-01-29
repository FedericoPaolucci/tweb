@extends ('layouts.user')

@section ('content')
<section class="content">
<div class="border" id="circularborder"></div>
<h2>User</h2>  
<div id="redirect">
    <div class="container-text">blog:</div>
    <button onclick= "location.href='{{ route('blog.index')}}'">IL TUO BLOG</button>
</div>
</section>
@endsection


