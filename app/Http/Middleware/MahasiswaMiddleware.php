<?php

namespace App\Http\Middleware;

use Closure;

class MahasiswaMiddleware
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
        if ($request->user() && $request->user()->type != 'm'){
            return new Response(
                view('auth.login');
            );
        }
        return $next($request);
    }
}
