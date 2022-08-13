<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->string('image_link')->nullable(true);
            $table->string('size')->nullable(true);
            $table->string('color')->nullable(true);
            $table->integer('number')->default(1);
            $table->float('detail_price_cn')->nullable(true);
            $table->float('detail_price_vn')->nullable(true);
            $table->float('detail_total_price_cn')->nullable(true);
            $table->float('detail_total_price_vn')->nullable(true);
            $table->string('detail_note')->nullable(true);
            $table->text('detail_metadata')->nullable(true);
            $table->integer('order_id');
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
        Schema::dropIfExists('order_detail');
    }
}
