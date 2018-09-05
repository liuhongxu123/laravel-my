<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerRedEnvelopeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_red_envelope', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->comment('customer.id');
            $table->string('red_envelope_name', 32)->comment('红包名称');
            $table->decimal('red_envelope_amount',10,2)->comment('红包金额');
            $table->integer('validity_period')->comment('有效期');
            $table->string('use_rule',200)->comment('红包使用规则');
            $table->tinyInteger('use_status')->comment('红包使用状态--0 未使用 1 已使用');
            $table->integer('receive_time')->comment('红包领取时间');
            $table->integer('use_time')->comment('红包使用时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_red_envelope');
    }
}
