<?php

namespace App\Http\Middleware;

use Closure;

class ForceSSL
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
        // Getting production To avoid local uri.
        if (!$request->secure() && in_array(env('APP_ENV'), ['staging', 'production'])) {
            return redirect()->secure($request->getRequestUri());
        }
        return $next($request);
    }
}
