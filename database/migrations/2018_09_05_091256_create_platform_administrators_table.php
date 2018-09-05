<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_administrators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile',15)->comment('登录账号/手机号');
            $table->string('password',255)->comment('登录密码');
            $table->string('real_name',32)->comment('姓名');
            $table->tinyInteger('gender')->comment('性别');
            $table->string('position')->comment('职位');
            $table->integer('create_time')->comment('添加时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_administrators');
    }
}
