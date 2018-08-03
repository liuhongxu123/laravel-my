<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/1
 * Time: 10:56
 */

namespace App\Http\Controllers\Rider\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\SmsRequest;

/**
 * @Resource("Msg")
 */
class MsgController extends Controller {

    /**
     * 获取订单消息列表
     * @Get("/api/rider/ordermsg")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getOrdersMsg () {
        $data = [
            ['content' => '您好，木道寿司的商家已经准备好餐了', 'date' => '2018.07.03 11:53:32'],
            ['content' => '您好，客户在催单了', 'date' => '2018.07.03 11:53:32']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取系统消息列表
     * @Get("/api/rider/sysmsg")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getSysMsg () {
        $data = [
            ['content' => '如果你无法简洁表达你的想法，那说明你还不够了解它', 'date' => '2018.07.03 11:53:32'],
            ['content' => '如果你无法简洁表达你的想法，那说明你还不够了解它', 'date' => '2018.07.03 11:53:32']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取系统消息详情
     * @Get("/api/rider/sysmsg/$id")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getSysMsgDetails () {
        $data = [
            'content' => '爱因斯坦他老人家说，如果你无法简洁的表达你的想法，那只说明你还不够了解它'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取短息验证码
     * @Post("/api/rider/get_sms_code")
     * @Version({"v1"});
     * @Parameters({
     *      @Parameter("mobile", description="手机号码", required=true)
     * })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getSmsCode (SmsRequest $request) {
        $data = [
            'code' => '123456',
            'expire' => 60
        ];
        return $this->returnJson(0, 'success', $data);
    }
}