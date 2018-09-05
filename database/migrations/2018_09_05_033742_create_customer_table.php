<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name', 50)->comment('用户名');
            $table->string('mobile', 15)->comment('手机号/登录账号');
            $table->string('password', 255)->comment('用户密码');
            $table->tinyInteger('gender')->comment('性别--0未知 1男 2女');
            $table->integer('register_time')->comment('注册时间');
            $table->integer('last_login_time')->comment('最后登录时间');
            $table->tinyInteger('status')->comment('用户状态');
            $table->tinyInteger('is_register')->comment('是否注册--0否 1是');
            $table->string('avatar', 100)->comment('头像url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
