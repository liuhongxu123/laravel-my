<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtocolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->comment('协议标题');
            $table->text('content')->comment('协议内容');
            $table->integer('create_time')->comment('添加时间');
            $table->tinyInteger('app_type')->comment('app类型--1 用户app 2 骑手app 3 商家app');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protocol');
    }
}
