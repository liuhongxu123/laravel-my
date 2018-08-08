<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/7
 * Time: 15:40
 */

namespace App\Http\Controllers\Business\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Business\V1\GetSmsCodeRequest;

class MsgController extends Controller {

    /**
     * 获取验证码
     * @Post('/get_sms_code')
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("mobile", description="手机号"),
     *      @Parameter("sms_type", description="验证码类型 sms_type=1 注册验证码 sms_type=2 忘记密码验证码")
     *     })
     * @Response(200, body={"code":0, "message": "","data": {
     *          "code": "验证码",
     *          "expire": "验证码过期时间"
     *     }})
     */
    public function getSmsCode (GetSmsCodeRequest $request) {
        $data = [
            'code' => 123456,
            'expire' => 60
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取订单消息列表
     * @Get("/order_msg/get/$store_id")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "order_id": "订单id",
     *          "content": "消息内容",
     *          "date": "日期"
     *     }}})
     */
    public function getOrderMsgList () {
        $data = [
            [
                'order_id' => 1,
                'content' => '您好，木道寿司店家已经准备好，请尽快去取',
                'date' => '2018-06-05 12:12:12'
            ],
            [
                'order_id' => 2,
                'content' => '您好，木道寿司店家已经准备好，请尽快去取',
                'date' => '2018-06-05 12:12:12'
            ],
            [
                'order_id' => 3,
                'content' => '您好，木道寿司店家已经准备好，请尽快去取',
                'date' => '2018-06-05 12:12:12'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取系统消息列表
     * @Get("/sys_msg/get/$store_id")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "id": "消息id",
     *          "title": "消息标题",
     *          "date": "日期"
     *     }}})
     */
    public function getSysMsgList () {
        $data = [
            [
                'id' => 1,
                'title' => '您好，木道寿司店家已经准备好，请尽快去取',
                'date' => '2018-06-05 12:12:12'
            ],
            [
                'id' => 2,
                'title' => '您好，木道寿司店家已经准备好，请尽快去取',
                'date' => '2018-06-05 12:12:12'
            ],
            [
                'id' => 3,
                'title' => '您好，木道寿司店家已经准备好，请尽快去取',
                'date' => '2018-06-05 12:12:12'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取系统消息详情
     * @Get("/sys_msg/details/get/$id")
     * @Parameters({
     *      @Parameter("id", description="系统消息id", required=true, type="integer")
     *     })
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "title": "标题",
     *          "content": "富文本内容，图片格式",
     *          "date": "日期"
     *     }})
     */
    public function getSysMsgDetails ($id) {
        $data = [
            'title' => '这是标题',
            'content' => '1.jpg',
            'date' => '2018-05-05 12:12:12'
        ];
        return $this->returnJson(0, 'success', $data);
    }

}



























