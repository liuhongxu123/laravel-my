<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumerHotlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumer_hotline', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->comment('客服名称');
            $table->string('tel', 20)->comment('客服电话');
            $table->integer('create_time')->comment('添加时间');
            $table->tinyInteger('app_type')->comment('app类型--1用户app 2骑手app 3商家app');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumer_hotline');
    }
}
