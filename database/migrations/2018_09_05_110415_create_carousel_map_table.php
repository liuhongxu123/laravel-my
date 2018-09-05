<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCarouselMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousel_map', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_id')->comment('position.id');
            $table->integer('article_id')->comment('article.id');
            $table->tinyInteger('type')->comment('类型--1优选菜 2活动 3软文');
            $table->string('title', 32)->comment('标题');
            $table->string('link', 100)->comment('文章链接');
            $table->string('photo', 100)->comment('图片url');
            $table->tinyInteger('status')->comment('状态--0停用 1启用');
            $table->integer('time')->comment('操作时间');
        });
        DB::statement("ALTER TABLE `carousel_map` COMMENT '轮播图表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carousel_map');
    }
}
