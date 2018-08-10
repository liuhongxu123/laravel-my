<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 9:51
 */

namespace App\Http\Controllers\Business\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Business\V1\ForgetPasswordRequest;
use App\Http\Requests\Business\V1\LoginRequest;

/**
 * @Resource("商家后台APP--授权接口")
 */
class LoginController extends Controller {

    /**
     * 用户注册
     * @Post("/user/reg")
     * @Versions({"v1"})
     * @Parameters({
     *          @Parameter("mobile", description="手机号", required=true),
     *          @Parameter("verify_code", description="注册验证码", required=true),
     *          @Parameter("password", description="设置密码", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function reg () {
        return $this->returnJson(0, '注册成功');
    }

    /**
     * 用户登录
     * @Post("/user/login")
     * @Versions({"v1"})
     * @Parameters({
     *          @Parameter("mobile", description="手机号(账号)", required=true),
     *          @Parameter("password", description="登录密码", required=true),
     *          @Parameter("read_and_confirm", description="阅读并接受", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function login (LoginRequest $request) {
        return $this->returnJson(0, '登录成功');
    }

    /**
     * 退出登录
     * @Post("/user/logout")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function logout () {
        return $this->returnJson(0, '退出成功');
    }

    /**
     * 忘记密码
     * @Post("/password/forget")
     * @Versions({"v1"})
     * @Parameters({
     *          @Parameter("mobile", description="手机号", required=true),
     *          @Parameter("password", description="新密码", required=true),
     *          @Parameter("verify_code", description="忘记密码验证码", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function forgetPassword (ForgetPasswordRequest $request) {
        return $this->returnJson(0, '密码重置成功');
    }


}