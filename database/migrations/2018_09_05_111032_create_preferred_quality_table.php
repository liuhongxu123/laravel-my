<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePreferredQualityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferred_quality', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pos_id')->comment('position.id');
            $table->integer('article_id')->comment('article.id');
            $table->tinyInteger('type')->comment('类型--1优选菜 2活动 3软文');
            $table->string('title', 20)->comment('标题');
            $table->string('photo', 255)->comment('附加图片');
            $table->tinyInteger('status')->comment('状态--0停用 1启用');
            $table->string('link', 100)->comment('文章链接');
            $table->string('store_set', 200)->comment('商家集合');
            $table->string('food_set', 200)->comment('菜品集合');
            $table->integer('time')->comment('操作时间');
        });
        DB::statement("ALTER TABLE `preferred_quality` COMMENT '品质优选表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferred_quality');
    }
}
