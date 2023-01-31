<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class MessagesController extends Controller
{
    
    public function messages(){
        $myuser=Auth::User();
        return view('Profile.message')
            ->with(compact('toaccept'))
                ->with(compact('toview'))
                ->with(compact('myuser'));
    }
    
    public function messagesview($id){   
        $myuser=Auth::User();
        $that_user = User::where('id', $id)->first();
        $myuser->messageFrom()->updateExistingPivot($id, ['viewed' => true]); //HO VISTO LA NOTIFICA
        $firstMessages = DB::table("messages")
                ->where([['id_sent_to', $id],['id_sender', $myuser->id]])
                ->orderBy('created_at');
        $allMessages = DB::table("messages")
                ->where([['id_sent_to', $myuser->id],['id_sender',$id ]])
                ->union($firstMessages)
                ->orderBy('created_at');
        $allMessages = $allMessages->get();
        return view('Profile.messageview')
            ->with(compact('allMessages'))
                ->with(compact('myuser'))
                ->with(compact('that_user'));
    }
}
