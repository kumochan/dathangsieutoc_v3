<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $option = new Option();
        $option->key = 'service_fee';
        $option->value = '[{"locale":"vi","title": "Phí dịch vụ", "header": "3%", "content":["Chiết khấu lên đến 20%", "Tỉ lệ phần trăm đặt cọc 40%", "Chính sách khách hàng thân thiết", "24/7 support"]}]';
        $option->group = 'system';
        $option->description = 'Phí dịch vụ';
        $option->save();

        $option = new Option();
        $option->key = 'transport_fee';
        $option->value = '[{"locale":"vi","content":["<=10kg chỉ 26.000 vnđ", "10.1-20kg chỉ 25.000 vnđ", "20.1-70kg chỉ 23.000 vnđ", "70.1-200kg chỉ 20.000 vnđ"], "title": "Phí vận chuyển", "header": "20.000/kg"}]';
        $option->group = 'system';
        $option->description = 'Phí vận chuyển';
        $option->save();


        $option = new Option();
        $option->key = 'deposit_fee';
        $option->value = '[{"locale":"vi","content":["Hỗ trợ kiểm đếm", "Giao hàng miễn phí nội thành bao trên 60kg", "Nhận hàng nhanh 2-5 ngày", "Phí ship nội địa rẻ nhất"], "title": "Phí kí gửi", "header": "21.000/kg"}]';
        $option->group = 'system';
        $option->description = 'Phí kí gửi';
        $option->save();
    }
}
