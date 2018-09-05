<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbnormalSmsTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abnormal_sms_template', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 50)->comment('短信标题');
            $table->string('content', 200)->comment('短信内容');
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
        Schema::dropIfExists('abnormal_sms_template');
    }
}
