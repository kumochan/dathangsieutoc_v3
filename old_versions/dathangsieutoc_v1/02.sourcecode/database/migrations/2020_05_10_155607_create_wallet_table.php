<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->float('deposit')->default(0); //tiền nạp
            $table->float('withdraw')->default(0); // tiền rút
            $table->float('total_payment')->default(0); // tổng thanh toán
            $table->float('balance')->default(0); // số dư
            $table->float('refund')->default(0); // số tiền hoàn
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
        Schema::dropIfExists('wallet');
    }
}
