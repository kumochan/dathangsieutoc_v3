<?php

namespace App\Http\Middleware;

use App\Option;
use Carbon\Carbon;
use Closure;
use App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'web')
    {
        if (session('locale') == []) {
            if ($request->has('lang')) {
                session(['locale' => $request->lang]);
            } else {
                session(['locale' => app()->getLocale()]);
            }
        } else if ($request->has('lang')) {
            session(['locale' => $request->lang]);
        }

        // make metatags
        $metatags = new \stdClass();
        $metatags->title = Option::get('site_title');
        $metatags->description = Option::get('site_description');
        $metatags->image = Option::get('site_image');
        Session::put('metatags', $metatags);

        return $next($request);
    }
}
