<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_card', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->integer('customer_id')->comment('customer.id');
            $table->string('cardholder')->comment('持卡人姓名');
            $table->string('card_account', 32)->comment('卡号');
            $table->string('safe_code', 5)->comment('安全码');
            $table->integer('validity_period')->comment('有效期');
            $table->string('address')->comment('详细地址');
            $table->string('zip_code', 32)->comment('邮编');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_card');
    }
}
