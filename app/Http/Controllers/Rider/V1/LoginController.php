<?php
/**
 *
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/26
 * Time: 16:02
 */

namespace App\Http\Controllers\Rider\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\V1\LoginRequest;
use App\Http\Requests\Rider\V1\PasswordForgetRequest;
use App\Http\Requests\Rider\V1\RegRequest;
use App\V1\Rider;

/**
 * @Resource("骑手登录授权API")
 */
class LoginController extends Controller {

    /**
     * 骑手登录
     * @Post("/api/rider/login")
     * @Version({"v1"})
     * @Request({"account":"15611111111","password":"123456"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function login (LoginRequest $request) {
        $account = '15611111111';
        $password = '123456';
        $params = $request->all();
        if($params['account'] != $account || $params['password'] != $password){
            return $this->returnJson(1,'用户名或密码错误');
        }
        return $this->returnJson(0, '登录成功', [
            'token' => auth()->login(Rider::find(1))
        ]);
    }

    /**
     * 骑手退出登录
     * @Post("/api/rider/logout")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function logout () {
        return $this->returnJson(0, '退出成功');
    }

    /**
     * 骑手注册
     * @Post("/api/rider/reg")
     * @Version({"v1"})
     * @Request({"name":"aa","mobile":"15611111111","password":"密码","verify_code":"验证码"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function reg (RegRequest $request) {
        return $this->returnJson(0,'注册成功');
    }

    /**
     * 骑手忘记密码
     * @Post("/api/rider/password/forget")
     * @Version({"v1"})
     * @Request({"account":"15611111111","verify_code":"1234","new_password":"123456"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function forgetPassword (PasswordForgetRequest $request) {
        $params = $request->all();
        $verify_code = "1234";
        if($verify_code != $params['verify_code']){
            return $this->returnJson(1,'验证码输入错误');
        }
        return $this->returnJson(0, '密码重置成功');
    }

}