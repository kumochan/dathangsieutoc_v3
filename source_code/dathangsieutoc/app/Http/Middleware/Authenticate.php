<?php

namespace App\Http\Middleware;
use App\Helper;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
//    public function handle($request, Closure $next, ...$guards)
//    {
//        $this->guards = $guards;
//
//        return parent::handle($request, $next, ...$guards);
//    }
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return redirect(Helper::currentRoutePrefix() . '/login');
        }
    }
}
