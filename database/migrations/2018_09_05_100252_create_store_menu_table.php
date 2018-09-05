<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->string('name', 20)->comment('菜单名称');
            $table->tinyInteger('sale_channel')->comment('售卖渠道--1堂食 2外卖 3店取');
            $table->integer('time')->comment('操作时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_menu');
    }
}
