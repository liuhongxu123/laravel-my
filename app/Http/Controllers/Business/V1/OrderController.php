<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/9
 * Time: 14:37
 */

namespace App\Http\Controllers\Business\V1;


use App\Http\Controllers\Controller;

/**
 * @Resource("商家后台APP--订单接口")
 */
class OrderController extends Controller {

    /**
     * 获取外卖订单列表
     * @Get("/order/take_out/get/$store_id/$status")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="店铺id", required=true),
     *      @Parameter("status", description="订单状态 -1 已取消 0 新订单 1 进行中 2 预约订单 3 退款订单 4 完成订单", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getTakeOutOrderList ($store_id, $status) {
        switch ($status) {
            case -1:
                $data = [
                    [
                        'name' => '张先生',
                        'mobile' => '1562221421',
                        'address' => '广东省广州市天河区',
                        'add_time' => '2018-05-05 15:12:00',
                        'final_time' => '2018-05-05 15:12:00',
                        'status' => '-1',
                        'food' => [
                            ['name' => '外婆小炒肉', 'count' => 1, 'price' => 15],
                            ['name' => '牛肉滑蛋饭', 'count' => 2, 'price' => 20]
                        ],
                        'remark' => '都拿一双筷子',
                        'preparation' => '04:12', //备餐时长
                        'rider_name' => '小王',   //骑手姓名
                        'full_reduction' => '1', //满减优惠,
                        'red_envelope' => 4     //平台红包
                    ]
                ];
                break;
            case 0:
                break;
            case 1:
                $data = [];
                break;
            case 2:
                $data = [];
                break;
            case 3:
                break;
            case 4:
                break;
        }
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取自取订单列表
     * @Get("/order/take_by_yourself/get/$store_id/$status")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="店铺id", required=true),
     *      @Parameter("status", description="订单状态 -1 已取消 1 进行中 2 已完成", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getTakeByYourselfList ($store_id, $status) {
        switch ($status) {
            case -1:
                $data = [
                    [
                        'name' => '张先生',
                        'mobile' => '1562221421',
                        'address' => '广东省广州市天河区',
                        'add_time' => '2018-05-05 15:12:00',
                        'final_time' => '2018-05-05 15:12:00',
                        'status' => '-1',
                        'food' => [
                            ['name' => '外婆小炒肉', 'count' => 1, 'price' => 15],
                            ['name' => '牛肉滑蛋饭', 'count' => 2, 'price' => 20]
                        ],
                        'remark' => '都拿一双筷子',
                        'preparation' => '04:12', //备餐时长
                        'rider_name' => '小王',   //骑手姓名
                        'full_reduction' => '1', //满减优惠,
                        'red_envelope' => 4     //平台红包
                    ]
                ];
                break;
            case 1:
                $data = [];
                break;
            case 2:
                $data = [];
                break;
        }
        return $this->returnJson(0, 'success', $data);
    }
}