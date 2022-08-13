<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTypeHistoryTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_transaction', function (Blueprint $table) {
            DB::statement('ALTER TABLE history_transaction MODIFY transaction_price FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE history_transaction MODIFY last_balance FLOAT(16,3) default 0;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('history_transaction', function (Blueprint $table) {
            //
        });
    }
}
