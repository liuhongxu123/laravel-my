<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Resource("用户APP-建议")
 */
class SuggestController extends Controller
{
    /**
     * 我的反馈列表(token)
     *
     * @Get("/api/customer/suggests")
     * @Version("v1")
     */
    public function index()
    {
        $data = [
            [
                'suggest_id' => 1,
                'suggest_type' => '手机卡顿',
                'suggest_desc' => '卡啊, 卡啊,卡啊, 卡啊,卡啊, 卡啊,卡啊, 卡啊',
                'suggest_img' => [
                    '1.jpg',
                    '1.jpg',
                    '1.jpg',
                    '1.jpg'
                ],
                'created_time' => '2018-3-26 4:52:36',
            ],
            [
                'suggest_id' => 1,
                'suggest_type' => '手机卡顿',
                'suggest_desc' => '卡啊, 卡啊,卡啊, 卡啊,卡啊, 卡啊,卡啊, 卡啊',
                'suggest_img' => [
                    '1.jpg',
                    '1.jpg',
                    '1.jpg',
                    '1.jpg'
                ],
                'created_time' => '2018-3-26 4:52:36',
            ],
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 添加反馈
     *
     * @Post("api/customer/suggest/create")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "suggest_type",
     *         description="建议类型",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "suggest_desc",
     *         description="问题描述",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "suggest_img",
     *         description="截图",
     *         type="array",
     *         required=true,
     *         default=""
     *     ),
     * })
     */
    public function store()
    {
        return $this->returnJson(0, 'success', $data);
    }


}
