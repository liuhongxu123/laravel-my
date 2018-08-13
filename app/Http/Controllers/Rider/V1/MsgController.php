<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/1
 * Time: 10:56
 */

namespace App\Http\Controllers\Rider\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\V1\GetSysmsgDetailsRequest;
use App\Http\Requests\Rider\V1\SmsRequest;

/**
 * @Resource("骑手端消息API")
 */
class MsgController extends Controller {

    /**
     * 获取订单消息列表
     * @Get("/api/rider/ordermsg/list/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "order_id": "订单id",
     *          "content": "订单消息内容",
     *          "date": "日期"
     *     }})
     */
    public function getOrdersMsg () {
        $data = [
            ['order_id'=> '1', 'content' => '您好，木道寿司的商家已经准备好餐了', 'date' => '2018-07-03 11:53:32'],
            ['order_id'=> '2', 'content' => '您好，客户在催单了', 'date' => '2018-07-03 11:53:32']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取系统消息列表
     * @Get("/api/rider/sysmsg/list/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "id": "消息id",
     *          "title": "系统消息标题",
     *          "date": "日期"
     *     }})
     */
    public function getSysMsg () {
        $data = [
            ['id' => 1, 'title' => '如果你无法简洁表达你的想法，那说明你还不够了解它', 'date' => '2018-07-03 11:53:32'],
            ['id' => 2,'title' => '如果你无法简洁表达你的想法，那说明你还不够了解它', 'date' => '2018-07-03 11:53:32']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取系统消息详情
     * @Get("/api/rider/sysmsg/details/get/$id")
     * @Parameters({
     *      @Parameter("id", description="消息id", required=true, type="integer")
     *     })
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getSysMsgDetails () {
        $data = [
            'title' => '爱因斯坦他老人家说，如果你无法简洁的表达你的想法，那只说明你还不够了解它',
            'content' => asset('storage/rider/suggestion/@origin/20180806/dFqTRWtcMV5yd3XLT3OYqnlnzbbC8MRw5KOu004y.jpeg'),
            'date' => '2018-07-03 11:53:32'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取短息验证码
     * @Post("/api/rider/get_sms_code")
     * @Version({"v1"});
     * @Parameters({
     *      @Parameter("mobile", description="手机号码", required=true),
     *      @Parameter("sms_type", description="验证码类型 sms_type=1 注册验证码 sms_type=2 忘记密码验证码", type="integer", required=true)
     * })
     * @Response(200, body={"code":0, "message": "","data": {
     *          "code": "验证码",
     *          "expire": "验证码过期时间"
     *     }})
     */
    public function getSmsCode (SmsRequest $request) {
        $data = [
            'code' => '123456',
            'expire' => 60
        ];
        return $this->returnJson(0, 'success', $data);
    }
}