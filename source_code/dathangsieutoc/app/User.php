<?php

namespace App;

use App\Base\HasPermissionsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    use HasPermissionsTrait;
    use SoftDeletes;
    use CanResetPassword;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'channel'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function permissions() {
        return $this->belongsToMany('\App\Permission', 'users_permissions');
    }

    /**
     * Trả ra menu cho backend user
     */
    public function menu()
    {
        // Nếu có trong session thì trả ra
        if (session()->has('menu')) {
            //dd(session('menu'));
            return session('menu');
        }

        $menuItems = $this->getMenuItems();

        // Chưa có thì lưu vào session
        session(['menu' => $menuItems]);
        return session('menu');
    }

    private function getMenuItems($parentId = 0)
    {
        $items = DB::table('things')
            ->selectRaw('things.id,
                things.title,
                things.slug as menu_item_slug,
                things.featured_img,
                things.metadata,
                things.parent_id,
                permissions.slug as permission_slug')
            ->join('permissions', 'permissions.thing_id', '=', 'things.id')
            ->join('users_permissions', 'users_permissions.permission_id', '=', 'permissions.id')
            ->where([
                ['users_permissions.user_id', $this->id],
                ['things.parent_id', $parentId],
                ['things.locale', env('LOCALE_DEFAULT')],
            ])
            ->orderBy('order_index')
            ->get();

        foreach ($items as $item) {

            $temp = (array)json_decode($item->metadata);

            $item->menu_item_slug = Helper::currentRoutePrefix() . $item->menu_item_slug;
            if (array_key_exists('hasChild', $temp)) {
                $item->hasChild = $temp['hasChild'];
            } else {
                $item->hasChild = false;
            }

            if (array_key_exists('showOnMenu', $temp)) {
                $item->showOnMenu = $temp['showOnMenu'];
            } else {
                $item->showOnMenu = false;
            }

            if ($item->hasChild) {
                $subItems = $this->getMenuItems($item->id);
                $item->children = $subItems;
            }
        }

        return $items;
    }

    /**
     * Danh sách được phân trang cho user type = backend (user hệ thống)
     * @param $search
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public static function pagedList($search, $offset, $limit)
    {
        $list = User::where('username', 'like', '%' . $search . '%')
            ->where('channel', 'backend')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $list;
    }
    public static function count($search)
    {
        $count = User::where('name', 'like', '%' . $search . '%')->count();
        return $count;
    }
    /**
     * Danh sách được phân trang cho user type = frontend (user subscriber)
     * @param $search
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public static function pagedListSubscriber($search, $offset, $limit)
    {
        $list = User::where('username', 'like', '%' . $search . '%')->where('channel', 'frontend')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $list;
    }

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();
        return $this->api_token;
    }
    //user la string
    public static function getArrayUser($user_id) {
        if ($user_id != '') {
            $array_user_id = explode(',', $user_id);
            foreach ($array_user_id as $id) {
                $array_user[] = self::where('id', $id)->first();
            }
            return array_filter($array_user);
        }
    }

    // lay user theo role
    public static function getUserByRoles($role)
    {
        $user = DB::table('users')
                ->selectRaw('users.*')
                ->leftJoin('users_roles', 'users.id', 'users_roles.user_id')
                ->leftJoin('roles', 'roles.id', 'users_roles.role_id')
                ->where('roles.slug', $role)
                ->get('id');
        return $user;
    }
}
