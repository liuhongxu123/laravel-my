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
        Schema::create('riders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rider_name')->comment('骑手用户名');
            $table->string('rider_password')->comment('骑手密码');
            $table->string('rider_info_apply_status')->comment('资料审核; 1/审核中;2/未通过;3/通过');
            $table->string('rider_real_name_apply_status')->comment('实名认证审核; 1/审核中;2/未通过;3/通过');
            $table->string('rider_status')->default('0')->comment('骑手状态; 1/正常接单;2/禁用');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riders');
    }
}
