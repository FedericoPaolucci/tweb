<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller {

    public function index() {
        $mystaff = Auth::User();
        $posts = Post::orderBy('posted_at','desc');
        $posts = $posts->paginate(10);
        return view('Staff')
            ->with(compact('mystaff'))
            ->with('posts',$posts);
    }
    
    public function moderation() {
        $mystaff = Auth::User();
        $Messages = $mystaff->messageTo()
                ->where('id_sender',$mystaff->id)
                ->orderBy('pivot_created_at','desc')
                ->get();
        return view('admin.mod')
                        ->with('Messages',$Messages)
                        ->with(compact('mystaff'));
    }

}
