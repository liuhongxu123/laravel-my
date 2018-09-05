<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("cat_id")->comment("文章类型");
            $table->string("title",32)->comment("标题");
            $table->string("author",32)->comment("作者");
            $table->text("content")->comment("文章内容");
            $table->string("cover",32)->comment("封面url");
            $table->string("link",32)->comment("文章链接");
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
        Schema::dropIfExists('article');
    }
}
