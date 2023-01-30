<?php

namespace App\Http\Controllers;

use App\Models\Friendship;
use Illuminate\Support\Facades\Auth;

class FriendshipController extends Controller
{
    public function store($id_user2)
    {
        $id_user1=Auth::id();
        $friendship=new Friendship();
        
        $friendship->id_user1 = $id_user1;
        $friendship->id_user2 = $id_user2;
        
        $friendship->save();
        return redirect()->route('profiles',$id_user2);
        
    }
}
