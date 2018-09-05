<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformFullReductionActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_full_reduction_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal("min_amount",10,2)->comment("满减最小金额");
            $table->decimal("discount",10,2)->comment("优惠金额");
            $table->tinyInteger("effective_type")->comment("生效类型 1永久生效 2自定义时间");
            $table->tinyInteger("status")->comment("活动状态 1开启 2关闭");
            $table->integer("start_time")->comment("自定义开始时间");
            $table->integer("end_time")->comment("自定义结束时间");
            $table->text("description")->comment("活动描述");
            $table->integer("create_time")->comment("添加时间");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_full_reduction_activities');
    }
}
