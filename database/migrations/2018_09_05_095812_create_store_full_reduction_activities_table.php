<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreFullReductionActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_full_reduction_activities', function (Blueprint $table) {
            $table->primary("store_id")->comment("门店id");
            $table->primary("activity_id")->comment("平台满减活动id");
            $table->integer("open_time")->comment("开通时间");
            $table->tinyInteger("status")->comment("活动状态 1开启0关闭");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_full_reduction_activities');
    }
}
