<?php

use Illuminate\Database\Seeder;
use App\Option;

class OptionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option = new Option();
        $option->key = 'order_status';
        $option->value = '["Tạo đơn hàng", "Chờ đặt cọc", "Đã đặt cọc", "Đang đặt hàng", "Đã đặt hàng", "Shop xưởng giao", "Đang vận chuyển", "Kho VN nhận", "Đã trả hàng", "Đã Hủy"]';
        $option->locale = 'vi';
        $option->save();

        $option = new Option();
        $option->key = 'exchange_rate';
        $option->value = 3.399;
        $option->locale = 'vi';
        $option->save();

        $option = new Option();
        $option->key = 'history_transaction_status';
        $option->value = '["Nạp tiền","Rút tiền","Thanh toán đơn hàng","Đặt cọc đơn hàng","Tất toán đơn hàng","Hoàn lại tiền"]';
        $option->locale = 'vi';
        $option->save();
    }
}
