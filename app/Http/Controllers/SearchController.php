<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;

class SearchController extends Controller {


    public function find(Request $request) {
        if (Str::endsWith($request->input('searched'),'*')){
            $searched=rtrim($request->input('searched'), "*");
            $found = User::select("id", "name", "surname")
                       ->orWhere(DB::raw("concat(name, ' ', surname)"), 'LIKE', $searched ."%")
                       ->get();
        }
        else{
           $found = User::select("id", "name", "surname")
                       ->orWhere(DB::raw("concat(name, ' ', surname)"), 'LIKE', $request->input('searched'))
                       ->get(); 
        }
            return view('friends.search', compact('found'));
    }

}
