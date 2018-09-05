<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbnormalOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abnormal_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rider_id')->comment('rider.id');
            $table->bigInteger('order_id')->comment('order.id');
            $table->tinyInteger('cat_id')->comment('abnormal_category.id');
            $table->string('description', 255)->comment('异常描述');
            $table->string('photo', 255)->comment('附加图片');
            $table->tinyInteger('status')->comment('处理状态--0未处理 1通过 2 拒绝');
            $table->tinyInteger('tag')->comment('标记/问题类型--1标红 2标黄 3标蓝');
            $table->string('remark', 255)->comment('备注');
            $table->integer('deal_with_time')->comment('处理时间');
            $table->integer('report_time')->comment('上报时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abnormal_order');
    }
}
