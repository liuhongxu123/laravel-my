<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreatePeripheralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peripheral', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->comment('产品类型--1pos 2pad 3打印机 4刷卡机 5钱箱');
            $table->string('name', 32)->comment('产品名称');
            $table->decimal('price', 10, 2)->comment('产品价格');
            $table->integer('create_time')->comment('添加时间');
        });
        DB::statement("ALTER TABLE `peripheral` COMMENT '外设产品表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peripheral');
    }
}
