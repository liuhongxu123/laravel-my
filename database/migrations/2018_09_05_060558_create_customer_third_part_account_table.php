<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerThirdPartAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_third_part_account', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id', false, true)->comment('关联customer.id');
            $table->string('account', 64)->comment('账号');
            $table->tinyInteger('type')->comment('账号类型--1 Facebook 2 Google 3 Twitter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_third_part_account');
    }
}
