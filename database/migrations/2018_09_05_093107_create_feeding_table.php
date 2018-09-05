<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeding', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->string('name', 20)->comment('加料名称');
            $table->decimal('price', 10, 2)->comment('价格');
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
        Schema::dropIfExists('feeding');
    }
}
