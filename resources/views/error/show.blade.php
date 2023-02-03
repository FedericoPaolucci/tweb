@extends ('layouts.user')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left"></div>
    <div class="subcontent" id="center">
        <div class="listed">
        <div class="alert">
            @isset($alert)
            {{$alert}}
            @endisset
        </div>
        </div>
    </div>
</div>
<div class="subcontent" id="right"></div>
</div>
@endsection
