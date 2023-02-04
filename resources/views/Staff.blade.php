@extends ('layouts.staff')

@section ('content')
<div class="content-container content">
    <!--RIASSUNTO PROFILO-->
    <div class="subcontent" id="left">
        <div class="profile-me">

        </div>
    </div>

    <!--PROFILO-->
    <div class="subcontent" id="center">
        <div class="profile">
            <div class="textindex-container">
                <div class="textindex">
                    Benvenuto {{$mystaff->name}} {{$mystaff->surname}}!
                </div>
                <div class="textindex">
                    Area riservata allo Staff del sito.
                </div>
            </div>
        </div>
    </div>

    <!-- TABELLA LATERALE-->
    <div class="subcontent" id="right">
        <div class="profile-friends">

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
