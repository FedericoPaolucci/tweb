<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class publicController extends Controller
{
    //
    public function home (){
        
        $var2 = 'but im not your bruh';
        
        
        return view('Public')
            ->with ('oggetto',$var2);
    }
    
}
