<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller {

    public function index() {
        $myid = Auth::id();
        return redirect()->route('profiles', $myid);
    }

    public function searchindex() {
        return view('friends.search');
    }

    public function edit() {
        $current_user = User::find(Auth::id());
        return view('Profile.profile_edit', compact('current_user'));
    }

    public function update(Request $request) {
        $myuser = Auth::User();
        $request->validate([
            'name' => 'required|max:20',
            'surname' => 'required|max:20',
            'profile' => 'required|max:500']);
        $url = '/img/';
        $nuovourl = $url . $request->input('img_url');
        if ($nuovourl != '/img/') {
            $request->validate([
                'img_url' => 'ends_with:png'
            ]);
            $myuser->img_url = $nuovourl;
        }

        $myuser->name = $request->input('name');
        $myuser->surname = $request->input('surname');
        $myuser->birthday = $request->input('birthday');
        $myuser->visibility = $request->input('visibility');
        $myuser->profile = $request->input('profile');


        $myuser->save();
        return redirect()->route('user');
    }

    public function show($thisid) {
        $that_user = User::where('id', $thisid)->first();
        $currentid = Auth::id();
        $isfriend='0';
        foreach ($that_user->friends() as $friend) {
            if ($friend->id == $currentid) {
                $isfriend='1';
            }
        }
        return view('Profile.show')
            ->with(compact('that_user'))
            ->with(compact('currentid'))
            ->with(compact('isfriend'));
    }
    
    //MESSAGGI E AMICI
    
    public function messages(){
        $myuser=Auth::User();
        $toaccept=$myuser->notyetFriendsFrom;
        $toview=$myuser->notyetviewedFrom;
        return view('Profile.message')
            ->with(compact('toaccept'))
                ->with(compact('toview'));
    }
    
    public function friendaccept($id){
        $myuser=Auth::User();
        $myuser->friendsFrom()
                ->where('id_user1',$id)
                ->get();
        $myuser->friendsFrom()->updateExistingPivot($id, ['accepted' => true]);
        
        return redirect()->route('user');
    }

    public function friendrequest($id_user2)
    {
        $user1=Auth::User();
        $user1->friendsTo()->attach($id_user2);
        return redirect()->route('profiles',$id_user2);
        
    }
    
    public function friendremove($id){
        $myuser=Auth::User();
        DB::table('friendships')
        ->where('id_user1', $myuser->id)
        ->where('id_user2', $id)
        ->update(array('deleted_at' => DB::raw('NOW()')));
        DB::table('friendships')
        ->where('id_user1', $id)
        ->where('id_user2', $myuser->id)
        ->update(array('deleted_at' => DB::raw('NOW()')));
        
        return redirect()->route('user');
    }
}
