<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Resource("用户APP-协议")
 */
class ProtocolController extends Controller
{
    /**
     * 协议列表
     * 
     * @Get("api/customer/protocols")
     * @Version("v1")
     */
    public function protocols()
    {
        $data = [
            [
                'protocols_id' => '1',
                'protocols_title' => '协议标题',
                'created_at' => '2018-3-6 12:32:12',
            ],
            [
                'protocols_id' => '1',
                'protocols_title' => '协议标题',
                'created_at' => '2018-3-6 12:32:12',
            ],

        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 协议详情
     *
     * @Get("api/customer/protocolInfo")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "protocols_id",
     *         description="协议ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     * 
     */
    public function protocolInfo()
    {
        $data = [
            'protocols_id' => '1',
            'protocols_title' => '协议标题',
            'protocols_info' => '<p>这里是html代码, 需要解析</p>',
            'created_at' => '2018-3-6 12:32:12',
        ];
        return $this->returnJson(0, 'success', $data);
    }
}
