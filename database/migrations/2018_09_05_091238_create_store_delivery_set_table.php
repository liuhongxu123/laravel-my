<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreDeliverySetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_delivery_set', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->tinyInteger('delivery_type')->comment('配送方式--1骑手配送 2商家配送 3自定义配送');
            $table->string('zip_code', 20)->comment('邮编');
            $table->string('location', 100)->comment('位置');
            $table->double('longitude', 10, 2)->comment('经度');
            $table->double('latitude', 10, 2)->comment('纬度');
            $table->integer('radius')->comment('半径');
            $table->decimal('start_price', 10, 2)->comment('起送价');
            $table->decimal('delivery_fee', 10, 2)->comment('配送费');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_delivery_set');
    }
}
