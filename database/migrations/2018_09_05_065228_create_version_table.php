<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVersionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('version', function (Blueprint $table) {
            $table->increments('id');
            $table->string('version_number', 32)->comment('版本号');
            $table->tinyInteger('system_type')->comment('系统类型--1 ios 2 android');
            $table->string('download_url', 150)->comment('下载地址');
            $table->string('qrcode', 150)->comment('二维码地址');
            $table->integer('update_time')->comment('更新时间');
            $table->text('content')->comment('更新内容');
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
        Schema::dropIfExists('version');
    }
}
