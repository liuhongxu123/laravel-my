<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_food', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->integer('cuisine_id')->comment('cuisine.id');
            $table->integer('food_cat_id')->comment('food_category.id');
            $table->string('name', 32)->comment('菜品名称');
            $table->string('unit', 5)->comment('菜品单位');
            $table->decimal('min_price', 10, 2)->comment('起售价');
            $table->integer('min_num')->comment('起售份数');
            $table->tinyInteger('is_sell')->comment('售卖状态--0停售 1起售');
            $table->string('description', 200)->comment('菜品描述');
            $table->string('photo', 255)->comment('菜品图片');
            $table->tinyInteger('is_weigh')->comment('是否称重菜--0否 1是');
            $table->tinyInteger('is_multi_specification')->comment('是否多规格--0否 1是');
            $table->string('specification', 200)->comment('规格');
            $table->tinyInteger('is_recommend')->comment('是否推荐菜--0否 1是');
            $table->tinyInteger('is_separate_feed')->comment('是否单独加料--0否 1是');
            $table->string('separate_feed', 200)->comment('加料集合');
            $table->string('method', 200)->comment('菜品做法');
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
        Schema::dropIfExists('store_food');
    }
}
