<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->comment('关联customer.id');
            $table->string('mobile', 15)->comment('收货人手机号');
            $table->string('name', 50)->comment('收货人姓名');
            $table->tinyInteger('gender')->comment('收货人性别--0 未知 1 男 2 女');
            $table->string('address', 100)->comment('收货地址');
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
        Schema::dropIfExists('customer_address');
    }
}
