<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\Wallet;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegisterFrom() {
        return view('frontend.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(Request $data)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
             return response()->json(['error' => $validator->errors()], 404);
        }
        $user = new User();
        $user->username = $data['username'];
        $user->channel = 'backend';
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        $user->roles()->attach(Role::where('slug', 'nguoi-dung')->first());
        $user->permissions()->attach(Role::where('slug', 'nguoi-dung')->first()
        ->permissions()->select(['permission_id'])
        ->where('role_id', Role::where('slug', 'nguoi-dung')->first()['id'])->get()->toArray());
        $wallet = new Wallet();
        $wallet->customer_id = $user->id;
        $wallet->save();
        return response()->json(['success' => 'Tạo thành công', 'redirect' => "/backyard"], 200);

        // $data->validate([
        //     'username' => 'required|string|max:255',
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|max:255|email|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        // ]);
        // $user = new User();
        // $user->username = $data['username'];
        // $user->channel = 'backend';
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password = Hash::make($data['password']);
        // $user->save();
        // $user->roles()->attach(Role::where('slug', 'nguoi-dung')->first());
        // $user->permissions()->attach(Role::where('slug', 'nguoi-dung')->first()
        // ->permissions()->select(['permission_id'])
        // ->where('role_id', Role::where('slug', 'nguoi-dung')->first()['id'])->get()->toArray());
        // $wallet = new Wallet();
        // $wallet->customer_id = $user->id;
        // $wallet->save();
    }
}