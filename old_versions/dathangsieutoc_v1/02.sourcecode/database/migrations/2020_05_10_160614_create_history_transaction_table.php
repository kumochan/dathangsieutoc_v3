<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_code');
            $table->integer('transaction_status_id')->default(0);
            $table->string('transaction_status_name')->default(null);
            $table->float('transaction_price')->default(0);
            $table->float('last_balance')->default(0); // Số dư cuối
            $table->string('note')->nullable()->default(null);
            $table->integer('order_id')->nullable();
            $table->integer('customer_id');
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
        Schema::dropIfExists('history_transaction');
    }
}
