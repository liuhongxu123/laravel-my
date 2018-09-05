<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebitCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_card', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->integer('customer_id')->comment('customer.id');
            $table->integer('rider_id')->comment('rider.id');
            $table->string('account_name', 50)->comment('账户名');
            $table->string('bank_code', 20)->comment('银行代号');
            $table->string('bank_name', 32)->comment('银行名称');
            $table->string('account', 32)->comment('银行账户');
            $table->tinyInteger('type')->comment('账户类型--1 支票 2 储蓄');
            $table->tinyInteger('attribute')->comment('账户属性--1 个人 2 公司');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debit_card');
    }
}
