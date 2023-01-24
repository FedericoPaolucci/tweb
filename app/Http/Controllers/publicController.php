<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class publicController extends Controller
{
    //
    public function prova (){
        
        $var1 = User::where('id','1')
                ->get()->first();
        $var2 = 'but im not your bruh';
        
        
        return view('Public')
            ->with ('user',$var1)
            ->with ('oggetto',$var2);
    }
    
}
