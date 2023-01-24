<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class Staff
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
        /* controlla se user è loggato*/
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        /*controlla il ruolo*/
        $role = Auth::user()->role;
        
        switch ($role) {
            case 'admin': return redirect()->route('admin');
            case 'staff': return $next($request);
            case 'user': return redirect()->route('user');
            default: return '/';
        }
    }
}
