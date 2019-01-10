<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SubscriberMiddleware
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
        if(!Auth::user() || Auth::user()->role != 'subscriber')
            abort(404);

        return $next($request);
    }
}
