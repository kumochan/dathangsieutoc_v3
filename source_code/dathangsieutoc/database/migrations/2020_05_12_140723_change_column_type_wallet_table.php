<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnTypeWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wallet', function (Blueprint $table) {
            DB::statement('ALTER TABLE wallet MODIFY deposit FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE wallet MODIFY withdraw FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE wallet MODIFY total_payment FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE wallet MODIFY balance FLOAT(16,3) default 0;');
            DB::statement('ALTER TABLE wallet MODIFY refund FLOAT(16,3) default 0;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wallet', function (Blueprint $table) {
            //
        });
    }
}
