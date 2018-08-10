<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/10
 * Time: 16:42
 */

namespace App\Http\Controllers\Business\V1;

use App\Http\Controllers\Controller;

/**
 * @Resource("商家后台APP--统计接口")
 */
class StatisticsController extends Controller {

    /**
     * 获取每天的统计
     * @Get("/statistics/day/get/$time")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("time", description="时间 形如 2018-01-01 00:00:00")
     *     })
     * @Response(200, body={"code":0, "message": "","data": {{
     *      "finish": "完成订单",
     *      "cancel": "取消订单",
     *      "income": "营业额",
     *      "type": "类型 1 堂食 2 外卖 3 店取"
     *     }}})
     */
    public function getStatisticsOfDay () {
        $data = [
            [
                'finish' => 124,
                'cancel' => 2,
                'income' => 10000,
                'type' => 1
            ],
            [
                'finish' => 124,
                'cancel' => 2,
                'income' => 10000,
                'type' => 2
            ],
            [
                'finish' => 124,
                'cancel' => 2,
                'income' => 10000,
                'type' => 3
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取统计详情
     * @Get("/statistics/details/get/$type")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("type", description="获取类型 1 昨日 2 本周 3 上周 4 本月 5 上月")
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getStatisticsDetails () {
        $data = [

        ];
        return $this->returnJson(0, 'success');
    }
}