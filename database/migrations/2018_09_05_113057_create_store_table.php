<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_name')->comment('门店名称');
            $table->string('store_head', 100)->comment('门店头像');
            $table->string('link_name', 50)->comment('联系人');
            $table->string('link_tel', 15)->comment('联系电话');
            $table->string('email', 50)->comment('邮箱');
            $table->string('notice', 100)->comment('门店公告');
            $table->string('address', 200)->comment('详细地址');
            $table->string('zip_code', 32)->comment('邮编');
            $table->string('photo', 255)->comment('附加图片');
            $table->integer('business_cat_id')->comment('business_category_set.id');
            $table->string('staff_size', 32)->comment('人员规模');
            $table->tinyInteger('level1')->comment('经营品类一级');
            $table->tinyInteger('level2')->comment('经营品类二级');
            $table->tinyInteger('level3')->comment('经营品类三级');
            $table->tinyInteger('store_status')->comment('门店营业状态--1营业中 0停业');
            $table->tinyInteger('takeaway_status')->comment('外卖营业状态--1营业中 0停业');
            $table->tinyInteger('is_auto_receive')->comment('是否自动接单--1是0否');
            $table->integer('order_wait')->comment('订单等待时间（分钟）');
            $table->tinyInteger('is_delete')->comment('是否删除--0否 1是');

        });
        DB::statement("ALTER TABLE `store` COMMENT '门店表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store');
    }
}
