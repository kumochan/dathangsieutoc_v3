<?php

namespace App\Http\Middleware;

use Closure;

class CheckNotPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if ($request->user()->can($permission)) {
            return abort('403');
        }

        return $next($request);
    }
}
