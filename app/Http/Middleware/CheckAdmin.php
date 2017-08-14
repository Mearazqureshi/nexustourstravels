<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class CheckAdmin
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
        if(Auth::user()){
            if(Auth::user()->is_admin == '0')
            {
                Session::flash('success_msg', 'You must login first..!');
                return redirect('admin');
            }
        }
        else{
            Session::flash('success_msg', 'You must login first..!');
            return redirect('admin');
        }

        return $next($request);
    }
}
