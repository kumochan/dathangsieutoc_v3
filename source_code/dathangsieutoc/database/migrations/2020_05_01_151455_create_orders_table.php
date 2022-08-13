<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */

    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shipping_code')->nullable(true);
            $table->string('shop_name')->nullable(true);
            $table->string('shop_id')->nullable(true);
            $table->string('warehouse')->default('');
            $table->integer('number_counted')->default(0); // số hàng kiểm thực tế
            $table->integer('number_order')->default(0); // tổng số hàng đặt trong bảng order_detail cộng lại
            $table->string('received_address')->nullable(true);
            $table->string('product_type')->default(''); // kiểu hàng vd: hàng dễ vỡ , đóng gỗ , kiểm đếm
            $table->float('prepayment')->default(0); // tiền đặt cọc
            $table->float('price_vn')->default(0);   // tien hang
            $table->float('price_cn')->default(0); // tien hang
            $table->float('ship_cn')->default(0);
            $table->float('ship_vn')->default(0);
            $table->float('weight')->default(0);
            $table->float('weight_fee')->default(0);
            $table->float('purchase_fee')->default(0); //  Phí mua hàng (3%)
            $table->float('additional_fee')->default(0); //  Phí phát sinh
            $table->float('arrears_fee')->default(0); // tiền còn thiếu (missing_price)
            $table->float('counting_fee')->default(0);
            $table->float('packing_fee')->default(0);
            $table->float('total_price_vn')->default(0); // tong  cua tat ca cac loai tien
            $table->float('total_price_cn')->default(0);   // tong  cua tat ca cac loai tien
            $table->string('user_id')->nullable(true);
            $table->integer('customer_id');
            $table->integer('status_id')->default(0);
            $table->string('status_name')->default('Chờ tạo đơn hàng');
            $table->text('note')->nullable(true);
            $table->text('metadata')->nullable(true);
            $table->datetime('deleted_at')->default(null)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
