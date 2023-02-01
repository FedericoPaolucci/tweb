<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class MessagesController extends Controller {

    public function messages() {
        $myuser = Auth::User();
        return view('Profile.message')
                        ->with(compact('toaccept'))
                        ->with(compact('toview'))
                        ->with(compact('myuser'));
    }

    public function messagesview($id) {
        $myuser = Auth::User();
        $that_user = User::where('id', $id)->first();
        $myuser->messageFrom()->updateExistingPivot($id, ['viewed' => true]); //HO VISTO LA NOTIFICA
        $firstMessages = DB::table("messages")
                ->where([['id_sent_to', $id], ['id_sender', $myuser->id]])
                ->orderBy('created_at','desc');
        $allMessages = DB::table("messages")
                ->where([['id_sent_to', $myuser->id], ['id_sender', $id]])
                ->union($firstMessages)
                ->orderBy('created_at','desc');
        $allMessages = $allMessages->paginate(20);
        return view('Profile.messageview')
                        ->with('allMessages',$allMessages)
                        ->with(compact('myuser'))
                        ->with(compact('that_user'));
    }

    public function store(Request $request) {
        $request->validate([
            'body' => 'required|max:500'
        ]);
        if (Auth::check()) {
            DB::table('messages')->insert([
                'body' => $request->input('body'),
                'id_sender' => Auth::id(),
                'id_sent_to' => $request->input('id_sent_to'),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        } else {
            return redirect()->back();
        }
        return redirect()->back();
    }

}
