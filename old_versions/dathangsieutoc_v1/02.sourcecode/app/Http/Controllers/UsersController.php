<?php
namespace App\Http\Controllers;
use App\Option;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use session;
class UsersController extends Controller
{
    public function getCurrentToken()
    {
        return Hash::make(session('api-token'));
    }

    public function getLoginedUser() {
        return Hash::make(session('user-email'));
    }

    public function getCsrfToken() {
        return csrf_token();
    }
}