<?php

use Illuminate\Database\Seeder;
use App\Base\Thing;
use App\Base\Term;
class ThingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create things
        /*=== Người dùng - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Người dùng';
        $thing->slug = '/user';
        $thing->featured_img = 'ti-user';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 8;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm';
        $thing->slug = '/user/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa';
        $thing->slug = '/user/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa';
        $thing->slug = '/user/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        /*=== Nhóm vai trò - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Nhóm vai trò';
        $thing->slug = '/role';
        $thing->featured_img = 'ti-cup';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 2;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm';
        $thing->slug = '/role/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/role'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa';
        $thing->slug = '/role/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/role'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa';
        $thing->slug = '/role/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/role'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();


        /*=== Quyền - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Danh sách Quyền';
        $thing->slug = '/permission';
        $thing->featured_img = 'ti-shield';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/user'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 3;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm';
        $thing->slug = '/permission/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/permission'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Sửa';
        $thing->slug = '/permission/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/permission'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa';
        $thing->slug = '/permission/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/permission'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        /*=== Tin tức - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Tin tức';
        $thing->slug = '/news';
        $thing->featured_img = 'ti-direction-alt';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 5;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Thêm mới';
        $thing->slug = '/news/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Cập nhật';
        $thing->slug = '/news/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa';
        $thing->slug = '/news/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Chuyên mục';
        $thing->slug = '/news/category';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 2;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Thêm chuyên mục';
        $thing->slug = '/news/category/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Cập nhật chuyên mục';
        $thing->slug = '/news/category/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Xóa chuyên mục';
        $thing->slug = '/news/category/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/news/category'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();


        /*=== Order  ===*/
        $thing = new Thing();
        $thing->title = 'Đặt Hàng';
        $thing->slug = '/order';
        $thing->featured_img = 'ti-direction-alt';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 6;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());

        $thing = new Thing();
        $thing->title = 'Tạo mới đơn hàng';
        $thing->slug = '/order/add';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/order'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 1;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Giỏ hàng';
        $thing->slug = '/order/cart';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/order'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Chi tiết đơn hàng';
        $thing->slug = '/order/order-detail';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/order'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'chỉnh sửa đơn hàng';
        $thing->slug = '/order/order-detail/edit';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/order'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'xóa đơn hàng';
        $thing->slug = '/order/delete';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/order'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":false}';
        $thing->save();

        /**
         * ví điện tử
         */
        $thing = new Thing();
        $thing->title = 'Ví điện tử';
        $thing->slug = '/wallet';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = 0;
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":true,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Lịch sử giao dịch';
        $thing->slug = '/history-transaction';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/wallet'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        $thing = new Thing();
        $thing->title = 'Lịch sử giao dịch';
        $thing->slug = '/edit-history-transaction';
        $thing->featured_img = '';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->parent_id = Thing::where([['slug', '/wallet'], ['locale', $thing->locale]])->first()['id'];
        $thing->order_index = 0;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->save();

        /*=== Tùy chỉnh - Tiếng Việt ===*/
        $thing = new Thing();
        $thing->title = 'Tùy chỉnh';
        $thing->slug = '/option/edit';
        $thing->featured_img = 'ti-settings';
        $thing->type = 'menu_item';
        $thing->status = 'publish';
        $thing->parent_id = 0;
        $thing->order_index = 6;
        $thing->metadata = '{"hasChild":false,"showOnMenu":true}';
        $thing->locale = env('LOCALE_DEFAULT');
        $thing->save();
        $thing->terms()->attach(Term::where([['slug', 'backend-menu'], ['locale', $thing->locale]])->first());
    }
}
