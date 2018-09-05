<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePlatformSetetTableollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_category_set', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->comment('父id');
            $table->string('name', 20)->comment('品类名称');
            $table->tinyInteger('level')->comment('级别');
        });
        DB::statement("ALTER TABLE `business_category_set` COMMENT '经营品类设置表'");


        Schema::create('service_facility_set', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->comment('设施名称');
        });
        DB::statement("ALTER TABLE `service_facility_set` COMMENT '服务设施设置表'");


        Schema::create('tag_set', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20)->comment('标签名称');
            $table->tinyInteger('type')->comment('标签类型--1备注设置 2取消原因 3作废原因');
        });
        DB::statement("ALTER TABLE `service _facility_set` COMMENT '服务设施设置表'");


        Schema::create('platform_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content', 100)->comment('公告内容');
            $table->integer('time')->comment('操作时间');
        });
        DB::statement("ALTER TABLE `platform_notice` COMMENT '平台公告设置'");
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
