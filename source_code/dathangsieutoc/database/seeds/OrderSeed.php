<?php

use Illuminate\Database\Seeder;
use App\Orders;

class OrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order = new Orders();
        $order->shipping_code = '75500';
        $order->shop_name = '发现好货';
        $order->shop_id = '4691948847';
        $order->warehouse = 'Kho HN';
        $order->number_counted = 3;
        $order->number_order = 3;
        $order->received_address = 'ha dong, ha noi';
        $order->product_type = '1, 2';
        $order->prepayment = 31500;
        $order->price_vn = 35000;
        $order->price_cn = 10;
        $order->ship_cn = 0;
        $order->ship_vn = 30000;
        $order->weight = 1.5;
        $order->weight_fee = 10000;
        $order->purchase_fee = 1050;
        $order->additional_fee = 0;
        $order->arrears_fee = 50550;
        $order->counting_fee = 0;
        $order->packing_fee = 0;
        $order->total_price_vn = 28000;
        $order->total_price_cn = 8;
        $order->user_id = '1, 25';
        $order->customer_id = 3;
        $order->save();



        $order = new Orders();
        $order->shipping_code = '3520000012';
        $order->shop_name = '實時推薦最適合你的寶貝';
        $order->shop_id = '24442857143';
        $order->warehouse = 'Kho HN';
        $order->number_counted = 0;
        $order->number_order = 1;
        $order->received_address = 'ha dong, ha noi';
        $order->product_type = '1, 3';
        $order->prepayment = 63000;
        $order->price_vn = 70000;
        $order->price_cn = 20;
        $order->ship_cn = 0;
        $order->ship_vn = 30000;
        $order->weight = 1;
        $order->weight_fee = 10000;
        $order->purchase_fee = 2100;
        $order->additional_fee = 0;
        $order->arrears_fee = 49100;
        $order->counting_fee = 0;
        $order->packing_fee = 0;
        $order->total_price_vn = 70000;
        $order->total_price_cn = 20;
        $order->user_id = '1, 24';
        $order->customer_id = 3;
        $order->save();
    }
}
