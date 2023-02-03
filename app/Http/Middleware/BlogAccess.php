<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class BlogAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $myid=Auth::id();
        $myuser=User::where('id',$myid)->first();
        $blogid=$request->route('blog');
        $bloguser=User::where('id',$blogid->id_owner)->first();
        if($myid == $blogid->id_owner || $myuser->role == 'staff' || $myuser->role == 'admin'){
        return $next($request);
        }
        foreach($bloguser->friends() as $friend){
            if($friend->id == $myid)
            {
                return $next($request);
            }
        }
        return redirect()->route('error',['alert'=>'Non sei autorizzato ad accedere a questo Blog!']);
    }
}
