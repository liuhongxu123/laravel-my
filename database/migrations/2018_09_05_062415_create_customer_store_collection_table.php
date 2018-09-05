<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerStoreCollectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_store_collection', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id',false, true)->comment('customer.id');
            $table->integer('store_id', false, true)->comment('store.id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_store_collection');
    }
}
