<?php

namespace App\Http\Middleware;

use Closure;

class DosenMiddleware
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
        if ($request->user() && $request->user()->type != 'd'){
            return new Response(
                view('auth.login');
            );
        }
        return $next($request);
    }
}
