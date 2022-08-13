<?php

namespace App\Http\Controllers\Backend;

use App\Helper;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo;

    public function __construct()
    {
        $this->redirectTo = Helper::currentRoutePrefix();
    }

    public function showLoginForm()
    {
        return view('backend.login');
    }

    protected function credentials(Request $request)
    {
        return $request->only('channel', $this->username(), 'password');
    }

    protected function username()
    {
        $login = request()->input('usernameOrEmail');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$field => $login]);
        return $field;
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->generateToken();
            $user->save();
            $request->session()->put('current_user', $user);
            config('app.user_login_info', 123);
            $api_token = $user->api_token;
            session(['api-token' => $api_token]);
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect(Helper::currentRoutePrefix());
    }

}
