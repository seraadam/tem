<?php

namespace App\Http\Middleware;

use Closure;

class isActive
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
        if (Auth::check()){
            if (Auth::user()->is_active){
                return redirect('not-active');
            }
        }
        return $next($request);
    }
}
