<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class publicController extends Controller {

    //
    public function home() {

        /* controlla se user è loggato */
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        /* controlla il ruolo */
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin': return redirect()->route('user');
            case 'staff': return redirect()->route('staff');
            case 'user': return redirect()->route('user');
            default: return '/';
        }
    }

    public function aboutus() {
        return view('general.aboutus');
    }

    public function info() {
        return view('general.info');
    }

    public function terms() {
        return view('general.terms');
    }

    public function download($nomefile) {
        $path = public_path('documentazione/' . $nomefile);
        return response()->download($path);
    }

}
