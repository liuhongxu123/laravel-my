<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBillTableCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_style_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_name', 20)->comment('分类名称');
        });
        DB::statement("ALTER TABLE `bill_style_category` COMMENT '票据样式分类'");


        Schema::create('bill_style', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->comment('bill_style_category.id');
            $table->string('name', 32)->comment('票据名称');
            $table->string('photo', 100)->comment('票据图片');
            $table->integer('time')->comment('操作时间');
        });
        DB::statement("ALTER TABLE `bill_style` COMMENT '票据样式表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
