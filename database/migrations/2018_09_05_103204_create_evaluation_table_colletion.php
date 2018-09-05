<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateEvaluationTableColletion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->comment('customer.id');
            $table->integer('rider_id')->comment('rider.id');
            $table->bigInteger('order_id')->comment('order.id');
            $table->tinyInteger('type')->comment('评价类型--1满意 2不满意');
            $table->integer('time')->comment('操作时间');
        });
        DB::statement("ALTER TABLE `rider_evaluation` COMMENT '骑手评价表'");


        Schema::create('food_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->comment('customer.id');
            $table->integer('food_id')->comment('food.id');
            $table->text('content')->comment('评价内容');
            $table->string('photo', 255)->comment('附加图片');
            $table->integer('time')->comment('评价时间');
        });
        DB::statement("ALTER TABLE `food_evaluation` COMMENT '菜品评价表'");


        Schema::create('store_evaluation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->comment('customer.id');
            $table->integer('store_id')->comment('store.id');
            $table->tinyInteger('store_score')->comment('门店评分');
            $table->tinyInteger('pack_score')->comment('包装评分');
            $table->tinyInteger('taste_score')->comment('口味评分');
            $table->tinyInteger('environment_score')->comment('环境评分');
            $table->tinyInteger('service_score')->comment('服务评分');
            $table->text('content')->comment('评价内容');
            $table->integer('time')->comment('评价时间');
            $table->text('reply')->comment('评价回复');
            $table->tinyInteger('is_read')->comment('已读未读--0未读 1已读');
        });
        DB::statement("ALTER TABLE `store_evaluation` COMMENT '门店评价表'");


        Schema::create('store_evaluation_appeal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->text('content')->comment('评价内容');
            $table->tinyInteger('status')->comment('申诉处理状态--0未处理 1通过 2拒绝');
            $table->integer('report_time')->comment('申诉时间');
            $table->integer('deal_with_time')->comment('处理时间');
        });
        DB::statement("ALTER TABLE `store_evaluation_appeal` COMMENT '门店评价申诉'");


        Schema::create('order_evaluation_appea', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->comment('order.id');
            $table->text('content')->comment('评价内容');
            $table->tinyInteger('status')->comment('申诉处理状态--0未处理 1通过 2拒绝');
            $table->integer('report_time')->comment('申诉时间');
            $table->integer('deal_with_time')->comment('处理时间');
        });
        DB::statement("ALTER TABLE `order_evaluation_appea` COMMENT '订单评价申诉表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
