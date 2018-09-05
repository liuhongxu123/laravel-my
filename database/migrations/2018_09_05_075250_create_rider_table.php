<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile', 15)->comment('手机号/登录账号');
            $table->string('password', 255)->comment('密码');
            $table->string('real_first_name', 50)->comment('真实名');
            $table->string('real_last_name', 50)->comment('真实姓');
            $table->string('email', 50)->comment('邮箱');
            $table->tinyInteger('work_status')->comment('工作状态--0 休息 1 工作');
            $table->tinyInteger('status')->comment('账户状态--0禁用 1启用');
            $table->string('avatar')->comment('头像');
            $table->string('description', 55)->comment('自我介绍');
            $table->tinyInteger('score')->comment('综合评分');
            $table->decimal('balance', 10, 2)->comment('账户余额');
            $table->decimal('balance_freeze', 10, 2)->comment('冻结余额');
            $table->integer('apply_enter_time')->comment('申请入驻时间');
            $table->integer('enter_time')->comment('入驻时间');
            $table->integer('last_login_time')->comment('上一次登录时间');
            $table->tinyInteger('is_certificate')->comment('实名状态-- -1实名被拒 0 未实名 1 已实名');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rider');
    }
}
