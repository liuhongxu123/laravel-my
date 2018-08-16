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
     *      @Parameter("status", description="订单状态 -1 已取消 1 进行中 2 完成订单", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": {{
     *      "order_no": "订单编号",
     *      "name": "客户姓名",
     *      "mobile": "客户手机号",
     *      "address": "送餐地址",
     *      "current_time": "当前时间",
     *      "add_time": "下单时间",
     *      "final_time": "最后送达时间",
     *      "status": "订单状态",
     *      "food": {{
     *          "name": "菜品名称",
     *          "count": "数量",
     *          "price": "单价"
     *     }},
     *      "remark": "备注",
     *      "preparation": "备餐时长",
     *      "rider_name": "骑手姓名",
     *      "rider_mobile": "骑手电话",
     *      "full_reduction": "满减优惠",
     *      "red_envelope": "平台红包",
     *      "apply_refund_time": "申请退款时间",
     *      "apply_refund_reason": "申请退款原因",
     *      "refuse_time": "商家决绝退款时间",
     *      "refuse_reason": "商家拒绝退款原因"
     *     }}})
     */
    public function getTakeOutOrderList ($store_id, $status) {
        $data = [];
        switch ($status) {
            case -1:
            case 1:
            case 2:
                $data = [
                    [
                        'order_no' => '1254242125',
                        'name' => '张先生',
                        'mobile' => '1562221421',
                        'address' => '广东省广州市天河区',
                        'current_time' => date('Y-m-d H:i:s', time()),
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
                        'rider_mobile' => '18611111111',
                        'full_reduction' => '1', //满减优惠,
                        'red_envelope' => 4,     //平台红包
                        'apply_refund_time' => '2018-12-02 15:12:00',
                        'apply_refund_reason' => '没有时间去取餐',
                        'refuse_time' => '2018-12-03 15:12:00',
                        'refuse_reason' => '已和用户电话沟通'
                    ]
                ];
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
        $data = [];
        switch ($status) {
            case -1:
            case 1:
            case 2:
                $data = [
                    [
                        'order_no' => '1254242125',
                        'name' => '张先生',
                        'mobile' => '1562221421',
                        'address' => '广东省广州市天河区',
                        'current_time' => date('Y-m-d H:i:s', time()),
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
                        'rider_mobile' => '18611111111',
                        'full_reduction' => '1', //满减优惠,
                        'red_envelope' => 4,     //平台红包
                        'apply_refund_time' => '2018-12-02 15:12:00',
                        'apply_refund_reason' => '没有时间去取餐',
                        'refuse_time' => '2018-12-03 15:12:00',
                        'refuse_reason' => '已和用户电话沟通'
                    ]
                ];
                break;
        }
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取待处理订单列表
     * @Get("/order/pending/get/$store_id/$status")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="店铺id", required=true),
     *      @Parameter("status", description="订单状态 1 新订单 2 预订单 3 退款订单", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getPendingList ($store_id, $status) {
        switch ($status) {
            case 1:
            case 2:
            case 3:
                $data = [
                    [
                        'order_no' => '1254242125',
                        'name' => '张先生',
                        'mobile' => '1562221421',
                        'address' => '广东省广州市天河区',
                        'current_time' => date('Y-m-d H:i:s', time()),
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
                        'rider_mobile' => '18611111111',
                        'full_reduction' => '1', //满减优惠,
                        'red_envelope' => 4,     //平台红包
                        'apply_refund_time' => '2018-12-02 15:12:00',
                        'apply_refund_reason' => '没有时间去取餐',
                        'refuse_time' => '2018-12-03 15:12:00',
                        'refuse_reason' => '已和用户电话沟通'
                    ]
                ];
                return $this->returnJson(0, 'success', $data);
                break;
        }
    }

    /**
     * 出餐完成
     * @Post("order/meal/finish/$order_id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("order_id", description="订单id", required=true, type="integer")
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function FinishMeal () {
        return $this->returnJson(0, '出餐完成');
    }

    /**
     * 同意退款
     * @Post("order/refund/approve/$order_id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("order_id", description="订单id", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function approveRefund () {
        return $this->returnJson(0, '退款成功');
    }

    /**
     * 拒绝退款
     * @Post("order/refund/refund/$order_id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("order_id", description="订单id", required=true),
     *      @Parameter("reason", description="拒绝退款理由")
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function refushRefund () {
        return $this->returnJson(0, '提交成功');
    }

    /**
     * 获取可选退款理由
     * @Get("/reason/refund/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *      "reason": "理由描述"
     *     }}})
     */
    public function getRefundReasons () {
        $data = [
            [
                'reason' => '已和用户电话沟通'
            ],
            [
                'reason' => '质量服务没有问题'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取订单取消理由
     * @Get("/reason/order_cancel/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *      "reason": "理由描述"
     *     }}})
     */
    public function getCancelOrderReasons () {
        $data = [
            [
                'reason' => '店铺太忙'
            ],
            [
                'reason' => '商品已售完'
            ],
            [
                'reason' => '地址无法配送'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

}
















