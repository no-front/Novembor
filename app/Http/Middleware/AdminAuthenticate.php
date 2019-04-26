<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

use Closure;

use Auth;

use App\User;

class AdminAuthenticate
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
        // if(Auth::Admin()) {
        //     if(Auth::Admin()->status=="admin"||Auth::Admin()->status=="cook") {
        //         return $next($request);
        //     }else{
        //         return Redirect::to('admin');  
        //     }
        // }else{
        //     return Redirect::to('admin');
        // }
        if(Auth::User()) {
            if(Auth::User()->status=='admin') {
               return $next($request);
            }else{
               return Redirect::to('admin/');
            }
        }else{
            return Redirect::to('admin/');
        }
        
    }
}
