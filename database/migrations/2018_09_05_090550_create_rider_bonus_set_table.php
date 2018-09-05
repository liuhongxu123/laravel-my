<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiderBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_bonus_set', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('praise')->comment('每单好评奖励分');
            $table->tinyInteger('bad_review')->comment('每单差评扣分');
            $table->tinyInteger('other_bad')->comment('转单失败、申请退款等其他扣分');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rider_bonus');
    }
}
