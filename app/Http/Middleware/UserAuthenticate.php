<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use App\Http\Requests;

use Closure;

use Auth;

use App\User;

class UserAuthenticate
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
        if(Auth::User()) {
            return $next($request);
        }else{
            return Redirect::to('login');
        }
    }
}
