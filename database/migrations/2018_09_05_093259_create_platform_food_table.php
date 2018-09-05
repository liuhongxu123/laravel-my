<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platform_food', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cuisine_id')->comment('cuisine.id');
            $table->string('name', 32)->comment('菜品名称');
            $table->decimal('price', 10, 2)->comment('菜品价格');
            $table->string('unit', 5)->comment('菜品单位');
            $table->string('description', 255)->comment('菜品描述');
            $table->string('photo', 255)->comment('菜品图片');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platform_food');
    }
}
