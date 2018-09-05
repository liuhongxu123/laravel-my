<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarouselPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("position",20)->comment("位置名称");
            $table->tinyInteger("type")->comment("类型 1轮播位置 2品质优选位置");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousel_positions');
    }
}
