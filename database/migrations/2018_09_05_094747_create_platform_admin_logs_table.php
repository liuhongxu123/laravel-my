<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformAdminLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_admin_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id',32)->comment('平台管理员id');
            $table->string('description',200)->comment('操作描述');
            $table->string('ip',20)->comment('访问ip地址');
            $table->integer('time')->comment('操作时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_admin_logs');
    }
}
