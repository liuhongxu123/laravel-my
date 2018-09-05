<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_message', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 32)->comment('标题');
            $table->text('content')->comment('内容');
            $table->tinyInteger('content_type')->comment('内容类型--1 文本 2 文章');
            $table->tinyInteger('push_type')->comment('推送方式--1 全部用户 2 特定用户');
            $table->string('user_id', 32)->comment('接收用户的唯一标识');
            $table->integer('create_time')->comment('创建时间');
            $table->tinyInteger('app_type')->comment('app类型--1 用户app 2 骑手app 3 商家app');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_message');
    }
}
