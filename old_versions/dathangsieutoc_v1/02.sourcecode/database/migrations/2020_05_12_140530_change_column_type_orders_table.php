<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTypeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {

            DB::statement('ALTER TABLE orders MODIFY prepayment FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY price_vn FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY price_cn FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY ship_cn FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY ship_vn FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY weight FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY weight_fee FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY purchase_fee FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY additional_fee FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY arrears_fee FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY counting_fee FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY packing_fee FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY total_price_vn FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE orders MODIFY total_price_cn FLOAT(16,3) default 0;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
