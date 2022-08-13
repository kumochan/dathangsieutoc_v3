<?php

use Illuminate\Database\Seeder;
use App\OrderDetail;
class OrderDetailSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img_id = rand(8,15);
        $order_id = rand(10, 16);
        $order_detail = new OrderDetail();
        $order_detail->name = '20年新菜 四川宜宾特产戎陈坊手撕大头菜冰糖麻辣味250g*3袋 咸菜';
        $order_detail->image_link = "backend/assets/images/products/big/{$img_id}.jpg";
        $order_detail->size = 'S';
        $order_detail->color = 'do';
        $order_detail->number = 2;
        $order_detail->detail_price_cn = 3;
        $order_detail->detail_price_vn = 10500;
        $order_detail->detail_total_price_cn = 6;
        $order_detail->detail_total_price_vn = 21000;
        $order_detail->order_id = $order_id;
        $order_detail->save();

        $img_id = rand(8,15);
        $order_id = rand(10, 16);
        $order_detail = new OrderDetail();
        $order_detail->name = '糖麻辣味250g*3袋 咸菜';
        $order_detail->image_link = "backend/assets/images/products/big/{$img_id}.jpg";
        $order_detail->size = 'S';
        $order_detail->color = 'do';
        $order_detail->number = 1;
        $order_detail->detail_price_cn = 2;
        $order_detail->detail_price_vn = 7000;
        $order_detail->detail_total_price_cn = 2;
        $order_detail->detail_total_price_vn = 7000;
        $order_detail->order_id = $order_id;
        $order_detail->save();


        $img_id = rand(8,15);
        $order_id = rand(10, 16);
        $order_detail = new OrderDetail();
        $order_detail->name = '23袋 咸菜';
        $order_detail->image_link = "backend/assets/images/products/big/{$img_id}.jpg";
        $order_detail->size = 'M';
        $order_detail->color = 'xanh';
        $order_detail->number = 1;
        $order_detail->detail_price_cn = 20;
        $order_detail->detail_price_vn = 70000;
        $order_detail->detail_total_price_cn = 20;
        $order_detail->detail_total_price_vn = 70000;
        $order_detail->order_id = $order_id;
        $order_detail->save();
    }
}
