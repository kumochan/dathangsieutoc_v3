<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\MenuItem;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permission
        /*=== Người dùng - Tiếng Việt ===*/
        $permission = new Permission();
        $permission->slug = 'list-user';
        $permission->name = 'Danh sách Người dùng';
        $permission->thing_id = MenuItem::where([['slug', '/user'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-user';
        $permission->name = 'Thêm Người dùng';
        $permission->thing_id = MenuItem::where([['slug', '/user/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-user';
        $permission->name = 'Cập nhật Người dùng';
        $permission->thing_id = MenuItem::where([['slug', '/user/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-user';
        $permission->name = 'Xóa Người dùng';
        $permission->thing_id = MenuItem::where([['slug', '/user/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        /*=== Nhóm vai trò - Tiếng Việt ===*/
        $permission = new Permission();
        $permission->slug = 'list-role';
        $permission->name = 'Danh sách Nhóm vai trò';
        $permission->thing_id = MenuItem::where([['slug', '/role'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-role';
        $permission->name = 'Thêm Nhóm vai trò';
        $permission->thing_id = MenuItem::where([['slug', '/role/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-role';
        $permission->name = 'Cập nhật Nhóm vai trò';
        $permission->thing_id = MenuItem::where([['slug', '/role/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-role';
        $permission->name = 'Xóa Nhóm vai trò';
        $permission->thing_id = MenuItem::where([['slug', '/role/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        /*=== Quyền - Tiếng Việt ===*/
        $permission = new Permission();
        $permission->slug = 'list-permission';
        $permission->name = 'Danh sách Quyền';
        $permission->thing_id = MenuItem::where([['slug', '/permission'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-permission';
        $permission->name = 'Thêm Quyền';
        $permission->thing_id = MenuItem::where([['slug', '/permission/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-permission';
        $permission->name = 'Cập nhật Quyền';
        $permission->thing_id = MenuItem::where([['slug', '/permission/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-permission';
        $permission->name = 'Xóa Quyền';
        $permission->thing_id = MenuItem::where([['slug', '/permission/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        /*=== Tin tức - Tiếng Việt ===*/
        $permission = new Permission();
        $permission->slug = 'list-news';
        $permission->name = 'Danh sách Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-news';
        $permission->name = 'Thêm Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-news';
        $permission->name = 'Cập nhật Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-news';
        $permission->name = 'Xóa Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'list-category';
        $permission->name = 'Chuyên mục Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/category'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-category';
        $permission->name = 'Thêm chuyên mục Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/category/add'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-category';
        $permission->name = 'Cập nhật chuyên mục Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/category/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'delete-category';
        $permission->name = 'Xóa chuyên mục Tin tức';
        $permission->thing_id = MenuItem::where([['slug', '/news/category/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        /** order **/

        $permission = new Permission();
        $permission->slug = 'list-order';
        $permission->name = 'Đặt hàng';
        $permission->thing_id = MenuItem::where([['slug', '/order'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'list-order-detail';
        $permission->name = 'Chi tiết đơn hàng';
        $permission->thing_id = MenuItem::where([['slug', '/order/order-detail'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'add-order';
        $permission->name = 'Tạo mới đơn hàng';
        $permission->thing_id = MenuItem::where([['slug', '/order/cart'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-order';
        $permission->name = 'chỉnh sửa đơn hàng';
        $permission->thing_id = MenuItem::where([['slug', '/order/order-detail/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());


        $permission = new Permission();
        $permission->slug = 'delete-order';
        $permission->name = 'xóa đơn hàng';
        $permission->thing_id = MenuItem::where([['slug', '/order/delete'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        /**
         * ví điện tử
         */
        $permission = new Permission();
        $permission->slug = 'list-history-transaction';
        $permission->name = 'Lịch sử giao dịch';
        $permission->thing_id = MenuItem::where([['slug', '/history-transaction'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'edit-history-transaction';
        $permission->name = 'Lịch sử giao dịch';
        $permission->thing_id = MenuItem::where([['slug', '/edit-history-transaction'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        $permission = new Permission();
        $permission->slug = 'wallet';
        $permission->name = 'Ví điện tử';
        $permission->thing_id = MenuItem::where([['slug', '/wallet'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());

        /*=== Tùy chỉnh - Tiếng Việt ===*/
        $permission = new Permission();
        $permission->slug = 'edit-option';
        $permission->name = 'Cập nhật Tùy chỉnh';
        $permission->thing_id = MenuItem::where([['slug', '/option/edit'], ['locale', env('LOCALE_DEFAULT')]])->first()['id'];
        $permission->save();
        $permission->roles()->attach(Role::where([['slug', 'developer'], ['locale', env('LOCALE_DEFAULT')]])->first());
    }
}
