<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    public function index() {
        $admin = Auth::User();
        $posts = Post::orderBy('posted_at', 'desc');
        $posts = $posts->paginate(10);
        $blogcount = DB::table('blogs')->count();
        $postcount = DB::table('posts')->count();
        return view('Admin')
                        ->with(compact('admin'))
                        ->with('posts', $posts)
                        ->with('blogcount', $blogcount)
                        ->with('postcount', $postcount);
    }

    public function managestaff() {
        $admin = Auth::User();
        $users = User::where('role', 'user')->get();
        $staffs = User::where('role', 'staff')->get();
        return view('admin.Manage')
                        ->with(compact('admin'))
                        ->with('users', $users)
                        ->with('staffs', $staffs);
    }

    public function community() {
        $admin = Auth::User();
        $users = User::where('role', 'user')->get();
        return view('admin.community')
                        ->with(compact('admin'))
                        ->with(compact('users'));
    }

    public function requestuser(Request $request) {
        $user = User::where('id', $request->id)->first();
        $friends = $user->friends();
        $friendCount = DB::table('friendships')
                ->join('users as user1', 'friendships.id_user1', '=', 'user1.id')
                ->join('users as user2', 'friendships.id_user2', '=', 'user2.id')
                ->where('friendships.id_user2', $request->id)
                ->count();
        return response()->json([
                    "friends" => $friends,
                    "friendCount" => $friendCount
        ]);
    }

}
