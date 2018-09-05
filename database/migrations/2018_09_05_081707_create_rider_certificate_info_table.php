<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiderCertificateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_certificate_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rider_id')->comment('rider.id');
            $table->integer('report_time')->comment('提交时间');
            $table->integer('deal_with_time')->comment('处理时间');
            $table->string('address', 100)->comment('详细地址');
            $table->string('safe_code', 10)->comment('社会安全码');
            $table->string('driver_permit', 100)->comment('驾驶证图url');
            $table->string('address_permit', 100)->comment('地址证明图url');
            $table->string('car_insurance', 100)->comment('车险证明图url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rider_certificate_info');
    }
}
