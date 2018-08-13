<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 14:54
 */

namespace App\Http\Controllers\Rider\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\V1\AbnormalRequest;
use App\Http\Requests\Rider\V1\GetOrderDetailsRequest;
use App\Http\Requests\Rider\V1\GetOrderListRequest;
use App\Http\Services\Rider\V1\UploadService;

/**
 * @Resource("骑手端订单API")
 */
class OrderController extends Controller {

    /**
     * 获取订单列表
     * @Get("/api/rider/order/list/get/$status")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("status", description="订单状态", required=true, type="integer")
     * })
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "origin": "取货",
     *          "dest": "送货",
     *          "current_time": "当前时间",
     *          "add_time": "下单时间",
     *          "final_time": "最后送达时间（即13:00前送达）",
     *          "status": "订单状态，可选值：-1 已取消订单 0 可抢订单 1 待取货 2 待送达 3 进行中 4 完成订单",
     *          "slip_status": "转单状态 slip_status=0 正常状态 slip_status=1 转单中 slip_status=2 转单完成",
     *          "store_head": "商家头像",
     *          "store_tel": "商家电话",
     *          "store_name": "商家名称"
     *     }}})
     */
    public function getList ($status) {
        switch ($status) {
            case -1:    //已取消订单
                $data = [
                    [
                        'origin' => '广州市天河区化州糖水',
                        'dest' => '华景新城',
                        'add_time' => '2018.03.01 12:12:12',
                        'final_time' => '2018.03.01 14:12:12',
                        'status' => -1, //订单状态
                        'store_head' => asset('storage/rider/certificate/@origin/20180802/um3MjR7STgWmGFGCwUkFvL8MheWbsU22b2Q44LEw.jpeg'),
                        'store_name' => '麦当劳'
                    ]
                ];
                return $this->returnJson(0, 'success', $data);
                break;
            case 0: //新订单
                $data = [
                    [
                        'origin' => '广州市天河区化州糖水',
                        'dest' => '华景新城',
                        'add_time' => '2018.03.01 12:12:12',
                        'final_time' => '2018.03.01 14:12:12',
                        'status' => 0, //订单状态
                    ]
                ];
                return $this->returnJson(0, 'success', $data);
                break;
            case 1: //待取货订单
                $data = [
                    [
                        'origin' => '广州市天河区化州香油鸡',
                        'dest' => '棠东180号',
                        'add_time' => 1533110855,   //下单时间
                        'current_time' => time(), //当前时间
                        'final_time' => '2018-01-05 15:21:00',
                        'status' => 1,  //订单状态
                        'slip_status' => 0, //转单状态
                        'store_tel' => '15622111111',
                        'store_name' => '麦当劳',
                        'store_head' => '1.jpg',
                        'food' => [
                            ['name' => '西红柿炒蛋', 'count' => 2],
                            ['name' => '薯条', 'count' => 1]
                        ]
                    ]
                ];
                return $this->returnJson(0, 'success', $data);
                break;
            case 2: //待送达订单
                $data = [
                    [
                        'origin' => '广州市天河区食在真湘',
                        'dest' => '棠东毓桂大街一巷8号',
                        'add_time' => '2018.03.01 12:12:12',
                        'final_time' => '2018.03.01 14:12:12',
                        'current_time' => time(), //当前时间
                        'type' => 2,
                        'customer_tel' => '13111111111',
                        'store_tel' => '15622111111',
                        'store_name' => '麦当劳',
                        'store_head' => '1.jpg'
                    ]
                ];
                return $this->returnJson(0, 'success', $data);
                break;
            case 3: //进行中 （路线推荐可调用此状态）
                $data = [
                    [
                        'origin' => '广州市天河区化州糖水',
                        'dest' => '华景新城',
                        'add_time' => '2018.03.01 12:12:12',
                        'final_time' => '2018.03.01 14:12:12',
                        'status' => 2, //待取货,
                        'price' => 4,
                        'store_head' => asset('storage/rider/certificate/@origin/20180802/um3MjR7STgWmGFGCwUkFvL8MheWbsU22b2Q44LEw.jpeg'),
                        'store_name' => '麦当劳'
                    ],
                    [
                        'origin' => '广州市天河区化州糖水',
                        'dest' => '华景新城',
                        'add_time' => '2018.03.01 12:12:12',
                        'final_time' => '2018.03.01 14:12:12',
                        'status' => 3, //待送达,
                        'price' => 4,
                        'store_head' => asset('storage/rider/certificate/@origin/20180802/um3MjR7STgWmGFGCwUkFvL8MheWbsU22b2Q44LEw.jpeg'),
                        'store_name' => '麦当劳'
                    ]
                ];
                return $this->returnJson(0, 'success', $data);
                break;
            case 4: //已完成订单
                $data = [
                    [
                        'origin' => '广州市天河区化州糖水',
                        'dest' => '华景新城',
                        'add_time' => '2018.03.01 12:12:12',
                        'arrive_time' => '2018.03.01 13:12:12', //送达时间
                        'final_time' => '2018.03.01 14:12:12',
                        'status' => 4, //订单状态
                        'price' => 4,
                        'store_head' => asset('storage/rider/certificate/@origin/20180802/um3MjR7STgWmGFGCwUkFvL8MheWbsU22b2Q44LEw.jpeg'),
                        'store_name' => '麦当劳'
                    ]
                ];
                return $this->returnJson(0, 'success', $data);
                break;
        }
    }

    /**
     * 获取订单详情
     * @Get("/api/rider/order/details/get/$id")
     * @Parameters({
     *      @Parameter("id", description="订单id", required=true, type="integer")
     *     })
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "origin": "取货地址",
     *          "dest": "送货地址",
     *          "status": "订单状态",
     *          "current_time": "当前时间",
     *          "take_time": "接单时间",
     *          "reach_store_time": "到店时间",
     *          "take_delivery_time": "取货时间",
     *          "finish_time": "送达时间",
     *          "deliver_money": "配送费",
     *          "discount_money": "优惠金额",
     *          "remark": "备注",
     *          "store_name": "商家名称",
     *          "store_head": "商家头像",
     *          "store_tel": "商家电话",
     *          "food": {{
     *              "name": "菜品名称",
     *              "price": "单价",
     *              "count": "数量",
     *              "img": "菜品图片"
     *     }}
     *     }})
     */
    public function getDetails () {
       $data = [
           'origin' => '广州市天河区东圃镇',
           'dest' => '广州市天河区车陂地铁站',
           'status' => '1', //订单状态
           'current_time' => '2018.03.03 12:00:00', //当前时间
           'take_time' => '2018.03.03 11:12:00', //接单时间,
           'reach_store_time' => '2018.03.03 11:12:00', //到店时间,
           'take_delivery_time' => '2018.03.03 11:12:00', //取货时间,
           'finish_time' => '2018.03.03 11:12:00', //送达时间,
           'deliver_money' => 3,
           'discount' => 02,
           'remark' => '您好，麻烦多备一份餐具，谢谢',
           'store_name' => '麦当劳',
           'store_head' => asset('storage/rider/certificate/@origin/20180802/um3MjR7STgWmGFGCwUkFvL8MheWbsU22b2Q44LEw.jpeg'),
           "store_tel" => '123456',
           'food' => [
               [
                   'name' => '挪威三文鱼盖饭',
                   'price' => 12,
                   'count' => 2,
                   'img' => asset('storage/rider/certificate/@origin/20180802/um3MjR7STgWmGFGCwUkFvL8MheWbsU22b2Q44LEw.jpeg')
               ],
               [
                   'name' => '神奇寿司',
                   'price' => 9999,
                   'count' => 2,
                   'img' => asset('storage/rider/certificate/@origin/20180802/um3MjR7STgWmGFGCwUkFvL8MheWbsU22b2Q44LEw.jpeg')
               ]
           ]
       ];
       return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取订单明细
     * @Get("/api/rider/order/statement/get")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("month", description="月份(传参方式形如：2018-03 的月份)")
     *     })
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "date": "日期",
     *          "order_no": "订单号",
     *          "receiver": "收货人",
     *          "receiver_mobile": "联系电话",
     *          "remark": "备注",
     *          "sum": "合计",
     *          "origin": "取货",
     *          "dest": "送货",
     *          "type": "类型 type=1 正常 type = 2退款单"
     *     }}})
     */
    public function getOrderStatement () {
        $data = [
            [
                "date" => '2018-03-03 12:02:02',
                'order_no' => 'No1234567',
                'receiver' => 'ling',   //收货人
                'receiver_mobile' => '15611111111', //收货人电话
                'remark' => '您好码放多备一份餐具',
                'sum' => 25, //金额合计
                'origin' => '广州市天河区旭景西街商业大厦',
                'dest' => '广州市天河区员村三横路5号',
                'type' => '1'
            ],
            [
                "date" => '2018-03-03 12:02:02',
                'order_no' => 'No1234567',
                'receiver' => 'ling',   //收货人
                'receiver_mobile' => '15611111111', //收货人电话
                'mark' => '您好码放多备一份餐具',
                'sum' => 25, //金额合计
                'origin' => '广州市天河区旭景西街商业大厦',
                'dest' => '广州市天河区员村三横路5号',
                'type' => '2'
            ],
            [
                "date" => '2018-03-03 12:02:02',
                'order_no' => 'No1234567',
                'receiver' => 'ling',   //收货人
                'receiver_mobile' => '15611111111', //收货人电话
                'mark' => '您好码放多备一份餐具',
                'sum' => 25, //金额合计
                'origin' => '广州市天河区旭景西街商业大厦',
                'dest' => '广州市天河区员村三横路5号',
                'type' => '1'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手确认接单
     * @Post("/api/rider/order/robbing")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function robbing () {
        return $this->returnJson(0, '抢单成功');
    }

    /**
     * 骑手到店上报
     * @Post("/api/rider/order/reach_store")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function reachStore () {
        return $this->returnJson(0, '上报门店成功');
    }

    /**
     * 骑手确认收货
     * @Post("/api/rider/order/take_delivery")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function takeDelivery () {
        return $this->returnJson(0, '收货成功');
    }

    /**
     * 骑手确认送达
     * @Post("/api/rider/order/finish")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "commission": "订单佣金"
     *     }})
     */
    public function finish () {
        $data = [
            'commission' => '12'
        ];
        return $this->returnJson(0, '确认送达成功', $data);
    }

    /**
     * 获取本月剩余转单数
     * @Get("/api/rider/order/get_slip_num")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "num": "本月剩余转单次数"
     *     }})
     */
    public function getSlipNum () {
        $data = [
            'num' => 2
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 确认转订单
     * @Post("/api/rider/order/slip")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function slip () {
        return $this->returnJson(0, '已进行转单，等待其他骑手接单');
    }

    /**
     * 取消转单
     * @Post("/api/rider/order/cancel_slip")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function cancelSlip () {
        return $this->returnJson(0, '已取消转单');
    }


    /**
     * 订单异常报备
     * @Post("/api/rider/order/abnormity/post")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("cat_id", description="异常分类id", required=true, type="integer"),
     *      @Parameter("content", description="异常描述", required=true, type="string"),
     *      @Parameter("phote", description="异常图片", required=true)
     *})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function abnormalPost (AbnormalRequest $request) {
        $msg = '订单异常上报成功';
        $origin_path = 'rider/abnormal/@origin/'.date('Ymd',time());
        $files = $request->file('photo');
        $res = UploadService::saveAll($files, $origin_path);
        if ($res['err'] === 1) {
            $msg = $res['msg'];
        }
        return $this->returnJson(0, $msg);
    }

    /**
     * 获取订单异常类型
     * @Get("/api/rider/order/abnormity_cat/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "id": "订单异常分类id",
     *          "name": "异常名称"
     *     }}})
     */
    public function getAbnormalCat () {
        $data = [
            ['id' => 1, 'name' => '商家未营业/已关门'],
            ['id' => 2, 'name' => '商家出餐慢'],
            ['id' => 3, 'name' => '其他']
        ];
        return $this->returnJson(0, 'success', $data);
    }
}