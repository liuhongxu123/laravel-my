<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStoreTableColletion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_category_feed_relation', function (Blueprint $table) {
           $table->integer('food_cat_id')->comment('food_category.id');
           $table->integer('feed_id')->comment('feeding.id');
        });
        DB::statement("ALTER TABLE `food_category_feed_relation` COMMENT '门店菜品分类-加料关联表'");


        Schema::create('store_package', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->integer('package_cat_id')->comment('package_category.id');
            $table->string('name', 32)->comment('套餐名称');
            $table->decimal('price', 10, 2)->comment('售价');
            $table->string('photo', 255)->comment('套餐附加图片');
            $table->string('description', 255)->comment('套餐描述');
            $table->integer('min_num')->comment('起售份数');
        });
        DB::statement("ALTER TABLE `store_package` COMMENT '门店套餐表'");


        Schema::create('store_package_food_relation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->integer('package_id')->comment('store_package.id');
            $table->integer('food_id')->comment('food.id');
            $table->integer('num')->comment('份数');
        });
        DB::statement("ALTER TABLE `store_package_food_relation` COMMENT '门店套餐-菜品关联表'");


        Schema::create('store_peripheral', function (Blueprint $table) {
            $table->integer('store_id')->comment('store.id');
            $table->integer('peripheral_id')->comment('peripheral.id');
            $table->string('serial_num', 32)->comment('序列号');
            $table->tinyInteger('bill_cat_id')->comment('bill_category.id');
            $table->decimal('price', 10, 2)->comment('价格');
            $table->integer('add_time')->comment('添加时间');
        });
        DB::statement("ALTER TABLE `store_peripheral` COMMENT '门店外设表'");


        Schema::create('store_peripheral_bill_relation', function (Blueprint $table) {
            $table->integer('peripheral_id')->comment('peripheral.id');
            $table->integer('bill_id')->comment('bill.id');
        });
        DB::statement("ALTER TABLE `store_peripheral_bill_relation` COMMENT '门店外设票据关联表'");

        Schema::create('store_service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->tinyInteger('take_out_food_service')->comment('外卖业务状态--1开启0关闭');
            $table->tinyInteger('help_yourself_service')->comment('店取业务状态--1开启0关闭');
            $table->tinyInteger('dine_in_service')->comment('堂食业务状态--1开启0关闭');
        });
        DB::statement("ALTER TABLE `store_service` COMMENT '门店业务状态'");


        Schema::create('store_work_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->string('store_work_day', 20)->comment('店内营业日');
            $table->string('store_work_time', 100)->comment('店内营业时间');
            $table->string('takeaway_work_day', 20)->comment('外卖营业日');
            $table->string('takeaway_work_time', 100)->comment('外卖营业时间');
        });
        DB::statement("ALTER TABLE `store_work_time` COMMENT '门店营业时间'");


        Schema::create('store_service_facility_relation', function (Blueprint $table) {
            $table->integer('store_id')->comment('store.id');
            $table->integer('service_facility_id')->comment('facility.id');
        });
        DB::statement("ALTER TABLE `store_service_facility_relation` COMMENT '门店设施表'");


        Schema::create('store_member', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->string('mobile', 15)->comment('登录账号/手机号');
            $table->string('password', 255)->comment('登录密码');
            $table->string('real_name', 100)->comment('真实姓名');
            $table->string('position', 20)->comment('职位');
            $table->integer('create_time')->comment('添加时间/主账号时为注册时间');
            $table->tinyInteger('is_master')->comment('是否为主账号--1是0否');
        });
        DB::statement("ALTER TABLE `store_member` COMMENT '门店成员表'");


        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->string('registration_name', 100)->comment('公司注册名称');
            $table->string('company_address', 200)->comment('公司地址');
        });
        DB::statement("ALTER TABLE `company` COMMENT '门店公司信息表'");


        Schema::create('company_tax_registration', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->comment('company.id');
            $table->string('tax_rate_area', 32)->comment('税率地区');
            $table->string('tax_rate_number', 50)->comment('税率登记号');
            $table->string('tax_reta_set', 10)->comment('税率设置');
        });
        DB::statement("ALTER TABLE `company_tax_registration` COMMENT '公司税务登记表'");


        Schema::create('area', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->string('name', 20)->comment('区域名称');
        });
        DB::statement("ALTER TABLE `area` COMMENT '区域管理表'");


        Schema::create('table_qrcode', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->integer('table_id')->comment('table.id');
            $table->string('qrcode', 100)->comment('二维码内容');
        });
        DB::statement("ALTER TABLE `table_qrcode` COMMENT '桌台二维码表'");


        Schema::create('table', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('store.id');
            $table->integer('area_id')->comment('area.id');
            $table->string('name', 20)->comment('桌台名称');
            $table->tinyInteger('count')->comment('桌台位数');
            $table->tinyInteger('status')->comment('桌台状态');
        });
        DB::statement("ALTER TABLE `table` COMMENT '桌台表'");
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
