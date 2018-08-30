<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/1
 * Time: 10:56
 */

namespace App\Http\Controllers\Customer\V1;

use App\lib\sendSms;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\V1\SmsRequest;


/**
 * @Resource("用户消息接口")
 */
class MsgController extends Controller {


    /**
     * 获取短息验证码
     * @Post("/api/customer/get_sms_code")
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

        //国际 不需要 符号+
       $templateCode = "SMS_10150007";
       $param = ['code'=>'123456','expire' => '5'];
       $phone = '8613516565558';

        //国内 手机号码 以 86 开头，不需要 符号 +
//        $templateCode = "SMS_134525033";
//        $param = ['code'=>'999111'];
//        $phone = '8613516565558';

        // phone 前两位 为 86 为大陆手机号码
        //  不是 86 ，则为 非大陆号码
        $response = sendSms::sendSms($templateCode, $param, $phone);

        return $this->returnJson(0, "success", $response);
    }
}