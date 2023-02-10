@extends ('layouts.admin')

@section('title')
Community Info
@endsection

@section ('content')
<div class="content-container content">
    <!--RIASSUNTO PROFILO-->
    <div class="subcontent" id="left">
        <div class="profile-me">

            <div class="listed aligncenter">
                <div class="textadmins aligncenter">Seleziona User</div>

                <form>
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
                <div class="textadminsp aligncenter">Gruppo degli Amici dell'User</div>
                <div class="inlisted" id="friend-list">
                    <div class="textindex aligncenter">Seleziona un utente.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="subcontent" id="right">
        <div class="profile-me">
            <div class="listed aligncenter">
            <div class="textadminsp aligncenter">Numero di richieste di amicizia ricevute in totale dall'utente:</div>
            <div class="counter" id="friendcount"></div>
                
            </div>
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

