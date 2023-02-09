<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller {

    public function find(Request $request) {
        if (Str::endsWith($request->input('searched'), '*')) {
            $searched = rtrim($request->input('searched'), "*");
            $found = User::select("id", "name", "surname")
                    ->orWhere(DB::raw("concat(name, ' ', surname)"), 'LIKE', $searched . "%")
                    ->where('role', 'user')
                    ->get();
        } else {
            $found = User::select("id", "name", "surname")
                    ->orWhere(DB::raw("concat(name, ' ', surname)"), 'LIKE', $request->input('searched'))
                    ->where('role', 'user')
                    ->get();
        }
        return view('friends.search', compact('found'));
    }

    public function findblog(Request $request) {
        $myuser=Auth::User();
        if (Str::endsWith($request->input('searched'), '*')) {
            $searched = rtrim($request->input('searched'), "*");
            $found = User::select("id", "name", "surname")
                    ->orWhere(DB::raw("concat(name, ' ', surname)"), 'LIKE', $searched . "%")
                    ->where('role', 'user')
                    ->get();
        } else {
            $found = User::select("id", "name", "surname")
                    ->orWhere(DB::raw("concat(name, ' ', surname)"), 'LIKE', $request->input('searched'))
                    ->where('role', 'user')
                    ->get();
        }
        if ($myuser->role == 'staff'){
            return view('friends.searchblog', compact('found'));
        }
        if ($myuser->role == 'admin'){
            return view('friends.searchblog_a', compact('found'));
        }
    }

}
