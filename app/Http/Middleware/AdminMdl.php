<?php

namespace App\Http\Middleware;

use Closure;

class AdminMdl
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
        if (!session()->has('Admin')) {
            return back();
        }
        return $next($request);
    }
}
