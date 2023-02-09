@extends ('layouts.admin')

@section ('content')
<div class="content-container content">
    <div class="subcontent" id="left">
        <div class="profile-me">
            <div class="listed aligncenter">
                <div class="textadmins aligncenter">Promuovi uno User a Staff</div>

                <form method="POST" action="{{ route('updaterole') }}">
                    @csrf
                    <input type="hidden" name="role" value='staff'>
                    <select name="user_id" class="form-control">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->surname }}</option>
                        @endforeach
                    </select>
                    <button type="submit">PROMUOVI</button>
                </form>
            </div>
        </div>
    </div>
    <div class="subcontent" id="center">
        <div class="listed">
            <div class="textadminp aligncenter">GESTIONE STAFF</div>
            @if (session('success'))
            <div class="messageviewer" id="messagerequest">
                {{ session('success') }}
            </div>
            @endif
            <div class="inlisted">
                @foreach ($staffs as $staff)
                <div class="elencostaff">
                    {{ $staff->name }} {{ $staff->surname }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="subcontent" id="right">
        <div class="profile-me">
            <div class="listed aligncenter">
                <div class="textadmins aligncenter">Rimuovi membro Staff</div>

                <form method="POST" action="{{ route('updaterole') }}">
                    @csrf
                    <input type="hidden" name="role" value='user'>
                    <select name="user_id" class="form-control">
                        @foreach ($staffs as $staff)
                        <option value="{{ $staff->id }}">{{ $staff->name . ' ' . $staff->surname }}</option>
                        @endforeach
                    </select>
                    <button type="submit">RIMUOVI</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

