<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePushListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_list', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('destination')->comment('推送地--1用户app 2骑手app 3商家app');
            $table->tinyInteger('is_all')->comment('是否全部对象接收--0否 1是');
            $table->string('user_id', 32)->comment('单对象接收的id');
            $table->tinyInteger('type')->comment('推送类型');
            $table->text('content')->comment('推送内容');
            $table->integer('time')->comment('推送时间');
            $table->tinyInteger('status')->comment('推送状态--0失败 1成功');
        });
        DB::statement("ALTER TABLE `push_list` COMMENT '推送表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('push_list');
    }
}
