<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 14:54
 */

namespace App\Http\Controllers\Rider\V1;


use App\Http\Controllers\Controller;

/**
 * @Resource("Order")
 */
class OrderController extends Controller {

    /**
     * 订单列表
     * @Get("/api/rider/order/index")
     * @Version({"v1"})
     * @Request({})
     */
    public function index () {
        $data = [
            'rob' => [
                ['origin' => '广州市天河区化州糖水', 'dest' => '华景新城', 'time' => '13:30']
            ],
            'take' => [
                ['origin' => '广州市天河区化州香油鸡', 'dest' => '棠东180号', 'time' => '13:45', 'store_link' => '15622111111']
            ],
            'deliver' => [
                ['origin' => '广州市天河区食在真湘', 'dest' => '棠东毓桂大街一巷8号','time' => '14:00'
                    , 'store_link' => '15622111111', 'customer_link' => '13111111111']
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手已接订单；列表
     * type = 1 待取货 type =2 待送达
     * @Get("/api/rider/order/took")
     * @Version({"v1"})
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
     * @Get("/api/rider/order/details")
     * @Version({"v1"})
     * @Request({})
     */
    public function getDetails () {
       $data = [
           'origin' => '广州市天河区东圃镇',
           'dest' => '广州市天河区车陂地铁站',
           'status' => '1',
           'time' => '2018.03.03 12:00:00', //当前时间
           'time2' => '2018.03.03 11:12:00', //接单时间,
           'time3' => '2018.03.03 11:12:00', //到店时间,
           'time4' => '2018.03.03 11:12:00', //取货时间,
           'time5' => '2018.03.03 11:12:00', //送达时间
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
     * 骑手到店上报
     * @Post("/api/rider/order/reach_store")
     * @Version({"v1"})
     * @Request({})
     */
    public function reachStore () {
        return $this->returnJson(0, '上报门店成功');
    }

    /**
     * 骑手确认收货
     * @Post("/api/rider/order/confirm")
     * @Version({"v1"})
     * @Request({})
     */
    public function confirm () {
        return $this->returnJson(0, '收货成功');
    }

    /**
     * 获取订单菜品
     * @Get("/api/rider/order/foods")
     * @Version({"v1"})
     * @Request({})
     */
    public function getFood () {
        $data = [
            ['name' => '西红柿炒蛋', 'count' => 2],
            ['name' => '薯条', 'count' => 1]
        ];
        return $this->returnJson(0,'success', $data);
    }

    /**
     * 获取短信模板
     * @Get("/api/rider/order/sms_tmpl")
     * @Version({"v1"})
     * @Request({})
     */
    public function getSmsTmpl (){
        $data = [
            ['content' => '默认/自定义'],
            ['content' => '货品马上送到(10分钟内)'],
            ['content' => '由于天气原因要稍晚送到'],
        ];
        return $this->returnJson(0, 'success', $data);
    }
}