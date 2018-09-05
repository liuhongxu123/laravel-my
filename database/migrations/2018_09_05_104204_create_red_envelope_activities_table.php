<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedEnvelopeActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('red_envelope_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name",32)->comment("活动名称");
            $table->decimal("amount",10,2)->comment("红包金额");
            $table->integer("validity_period")->comment("有效期");
            $table->string("use_rule",255)->comment("使用规则");
            $table->tinyInteger("status")->comment("活动状态 1开启 2关闭");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('red_envelope_activities');
    }
}
