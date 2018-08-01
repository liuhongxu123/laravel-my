<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 14:54
 */

namespace App\Http\Controllers\Rider\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\AbnormalRequest;

/**
 * @Resource("骑手端订单API")
 */
class OrderController extends Controller {

    /**
     * 获取订单列表
     * @Get("/api/rider/order/index")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {"type": "订单类型--type = 1 待取货 type =2 待送达"}})
     */
    public function index () {
        $data = [
            'rob' => [
                ['origin' => '广州市天河区化州糖水', 'dest' => '华景新城', 'final_time' => '13:30']
            ],
            'untake' => [
                [
                    'origin' => '广州市天河区化州香油鸡',
                    'dest' => '棠东180号',
                    'add_time' => 1533110855,   //下单时间
                    'current_time' => time(), //当前时间
                    'final_time' => '13:45',
                    'type' => 1,
                    'price' => 2,
                    'store_tel' => '15622111111',
                    'store_name' => '麦当劳',
                    'store_img' => '1.jpg',
                    'food' => [
                        ['name' => '西红柿炒蛋', 'count' => 2],
                        ['name' => '薯条', 'count' => 1]
                    ]
                ]
            ],
            'undeliver' => [
                [
                    'origin' => '广州市天河区食在真湘',
                    'dest' => '棠东毓桂大街一巷8号',
                    'final_time' => '14:00',
                    'add_time' => 1533110855,   //下单时间
                    'current_time' => time(), //当前时间
                    'type' => 2,
                    'customer_tel' => '13111111111',
                    'store_tel' => '15622111111',
                    'store_name' => '麦当劳',
                    'store_img' => '1.jpg'
                ]
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手已接订单列表
     *
     * @Get("/api/rider/order/took")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {"type": "订单类型--type = 1 待取货 type =2 待送达"}})
     */
    public function took () {
        $data = [
            ['store_name'=>'麦当劳','store_img'=>'1.jpg',  'origin'=>'广州市天河区岗顶', 'dest'=>'棠德南路19号', 'type'=>1],
            ['store_name'=>'麦当劳','store_img'=>'1.jpg',  'origin'=>'广州市天河区岗顶', 'dest'=>'棠德南路19号', 'type'=>2]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取订单详情
     * type = 1 待取货 type = 2 待送达
     * @Get("/api/rider/order/$id")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {"type": "订单类型--type = 1 待取货 type =2 待送达"}})
     */
    public function getDetails ($id) {
       $data = [
           'origin' => '广州市天河区东圃镇',
           'dest' => '广州市天河区车陂地铁站',
           'status' => '1',
           'time' => '2018.03.03 12:00:00', //当前时间
           'time2' => '2018.03.03 11:12:00', //接单时间,
           'time3' => '2018.03.03 11:12:00', //到店时间,
           'time4' => '2018.03.03 11:12:00', //取货时间,
           'time5' => '2018.03.03 11:12:00', //送达时间,
           'type' => 1,
           'deliver_money' => 3,
           'remark' => '您好，麻烦多备一份餐具，谢谢',
           'store_name' => '麦当劳',
           'store_img' => '1.jpg',
           'food' => [
               [
                   'name' => '挪威三文鱼盖饭',
                   'price' => 12,
                   'count' => 2,
                   'img' => '1.jpg'
               ],
               [
                   'name' => '神奇寿司',
                   'price' => 9999,
                   'count' => 2,
                   'img' => '2.jpg'
               ]
           ]
       ];
       return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手确认接单
     * @Post("/api/rider/order/taking")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function taking () {
        return $this->returnJson(0, '接单成功');
    }

    /**
     * 骑手到店上报
     * @Post("/api/rider/order/reachstore")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function reachStore () {
        return $this->returnJson(0, '上报门店成功');
    }

    /**
     * 骑手确认收货
     * @Post("/api/rider/order/takegoods")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function takeGoods () {
        return $this->returnJson(0, '收货成功');
    }

    /**
     * 骑手确认送达
     * @Post("/api/rider/order/finish")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function finish () {
        return $this->returnJson(0, '确认送达成功');
    }

    /**
     * 确认转交订单
     * @Post("/api/rider/order/slip")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function slip () {
        return $this->returnJson(0, '转单成功');
    }

    /**
     * 订单异常报备
     * @Post("/api/rider/order/abnormalpost")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("type", description="异常类型", required=true, type="integer"),
     *      @Parameter("content", description="异常描述", required=true, type="string"),
     *      @Parameter("phote", description="异常图片", required=true)
     *})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function abnormalPost (AbnormalRequest $request) {
        return $this->returnJson(0, '订单异常上报成功');
    }
}