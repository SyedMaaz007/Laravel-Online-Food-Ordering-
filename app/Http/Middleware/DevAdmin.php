<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DevAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('DELIVERY_LOGIN')){

        }
        else{
            $request->session()->flash('error','Access Denied');
            return redirect('dev_admin');
        }
        return $next($request);
    }
}
