<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->comment('customer.id');
            $table->integer('rider_id')->comment('rider.id');
            $table->integer('store_id')->comment('store.id');
            $table->integer('cat_id')->comment('feedback_category.id');
            $table->text('content')->comment('反馈内容');
            $table->string('photo', 255)->comment('附加图片');
            $table->integer('report_time')->comment('提交时间');
            $table->integer('deal_with_time')->comment('处理时间');
            $table->tinyInteger('status')->comment('处理状态--0 未处理 1 已处理');
            $table->tinyInteger('app_type')->comment('app类型--1用户app 2骑手app 3商家app');
            $table->tinyInteger('tag')->comment('标记/问题类型--1标红 2标黄 3标蓝');
            $table->string('remark', 255)->comment('备注');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
