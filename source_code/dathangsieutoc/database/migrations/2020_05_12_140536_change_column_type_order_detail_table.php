<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTypeOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_detail', function (Blueprint $table) {
            DB::statement('ALTER TABLE order_detail MODIFY detail_price_cn FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE order_detail MODIFY detail_price_vn FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE order_detail MODIFY detail_total_price_cn FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE order_detail MODIFY detail_total_price_vn FLOAT(16,3) default 0;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orderdetail', function (Blueprint $table) {
            //
        });
    }
}
