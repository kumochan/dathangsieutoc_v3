<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;
use App\Wallet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use session;
//use mysql_xdevapi\Session;

class UserController extends ApiController
{
    /**
     * Get token of current login user for using api
     * @param Request $request
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed|null
     */

    public function getAllUser(Request $request)
    {
        return User::all();
    }

    public function list(Request $request)
    {

        $users = User::all();
        $totalRow = User::count();
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $users
        );
        $result = json_encode($jsonData);
        return $result;
    }

    //

    /**
     * Danh sách user phân trang trên table quản trị
     */
    public function grid(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');
        $users = User::pagedList($search, $offset, $limit)->except(1);//->where('channel','backend');
        $totalRow = User::count($search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $users
        );
        $result = json_encode($jsonData);
        return $result;
    }

    /**
     * Xóa dữ liệu nhieu ban ghi cung luc
     */
    public function delete(Request $request)
    {
        $ids = $request->input('ids');
        DB::transaction(function () use ($ids) {
            // 01. Xoa du lieu bang users_roles
            UserRole::whereIn('role_id', explode(',', $ids))->delete();

            // 02. Xoa du lieu bang roles_permissions
            RolesPermission::whereIn('role_id', explode(',', $ids))->delete();

            // 03. Xoa du lieu bang  roles
            Role::whereIn('id', explode(',', $ids))->delete();
            // 0.4 Xoa du lieu bang user
            $user = User::findOrFail($ids);
            $user->delete();

        });
        return response()->json(200);
    }

    public function register(Request $request) {
        $messages = self::messages();
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], $messages);
        if ($validator->fails()) {
             return response()->json(['error' => $validator->messages()]);
        }
        $user = new User();
        $user->username = $request['username'];
        $user->channel = 'backend';
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();
        $user->roles()->attach(Role::where('slug', 'nguoi-dung')->first());
        $user->permissions()->attach(Role::where('slug', 'nguoi-dung')->first()
        ->permissions()->select(['permission_id'])
        ->where('role_id', Role::where('slug', 'nguoi-dung')->first()['id'])->get()->toArray());
        $wallet = new Wallet();
        $wallet->customer_id = $user->id;
        $wallet->save();
         return response()->json(['success' => 'Tạo thành công', 'redirect' => '/backyard'], 200);
    }

    public static function messages()
    {
        return [
            'max' => 'Tên phải dưới 255 kí tự',
            'unique' => 'Email đã được sử dụng',
            'confirmed' => 'Mật khẩu xác nhận không đúng'
        ];
    }
}
