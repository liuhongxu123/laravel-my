<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * @Resource("红包")
 */
class RedPackageController extends Controller
{
    /**
     * 红包列表
     *
     * 1/待使用; 2/已过期; 3/已使用;
     * 
     * @Get("api/customer/redpackages")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "type",
     *         description="1/表示正常红包; 0/过期红包"
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     */
    public function packages()
    {
        $data = [
            [
                'red_package_id' => '1',
                'red_package_title' => '新人专属红包',
                'red_package_money' => 1300,
                'red_package_max' => 3900,
                'red_package_des' => '红包描述',
                'red_package_status' => 1,
                'validity_time' => '2015-3-02 25:1:1',
            ],
            [
                'red_package_id' => '1',
                'red_package_title' => '新人专属红包',
                'red_package_money' => 1300,
                'red_package_max' => 3900,
                'red_package_des' => '红包描述',
                'red_package_status' => 1,
                'validity_time' => '2015-3-02 25:1:1',
            ]
        ];

        return $this->returnJson(0, 'success', $data);
    }
}
