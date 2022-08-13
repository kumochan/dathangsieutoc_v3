<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Hash;
use Closure;
use App\Helper;
use Illuminate\Support\Facades\Auth;
class Cros
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
        $response = $next($request);
        header("Access-Control-Allow-Origin: http://127.0.0.1:8000/");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: GET, POST");
        header("Access-Control-Allow-Headers: Content-Type, *");
        try {
            if($request->header('Authorization') == null) {
                $token = Hash::make(session('api-token'));
                $request->headers->set('Authorization', $token);
            }
            if(Hash::check(session('current_user')->api_token, $request->header('Authorization'))) {
                return $next($request)->withHeaders($headers);
            }
        } catch (\Exception $e) {
            $a = session('api-token');
            $message = $e->getMessage();
            return response($message. $a, 401);
        }
    }
}
