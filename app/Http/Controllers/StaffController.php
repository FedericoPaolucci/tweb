<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller {

    public function index() {
        $mystaff = Auth::User();
        return view('Staff')
            ->with(compact('mystaff'));
    }

}
