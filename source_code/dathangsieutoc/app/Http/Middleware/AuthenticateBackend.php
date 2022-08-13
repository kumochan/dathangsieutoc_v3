<?php

namespace App\Http\Middleware;

use App\Helper;
use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateBackend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'backend')
    {
        if(!Auth::guard($guard)->check()) {
            if (Helper::currentRoutePrefix() === '/api') {
                return $next($request);
            }
            return redirect(Helper::currentRoutePrefix() . '/login');
        }

        if ($request->has('lang')) {
            session(['locale' => $request->lang]);
        } else {
            session(['locale' => app()->getLocale()]);
        }
        return $next($request);
    }
}
