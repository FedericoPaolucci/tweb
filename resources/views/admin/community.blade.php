@extends ('layouts.admin')

@section ('content')
<div class="content-container content">
    <!--RIASSUNTO PROFILO-->
    <div class="subcontent" id="left">
        <div class="profile-me">

            <div class="listed aligncenter">
                <div class="textadmins aligncenter">Seleziona User</div>

                <form method="POST" action="{{ route('showuserinfo') }}">
                    <select id="userselect" name="user_id" class="form-control">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->surname }}</option>
                        @endforeach
                    </select>
                    <button id="showinfo">INFO</button>
                </form>
            </div>
        </div>
    </div>

    <div class="subcontent" id="center">
        <div class="profile">
            <div class="listed">
                <div id="userDetails">
                    Nome :<div class="name"></div>
                    Cognome: <div class="surname"></div>
                    username: <div class="username"></div>
                </div>
            </div>
        </div>
    </div>

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

