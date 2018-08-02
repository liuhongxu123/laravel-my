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
use App\Http\Requests\Rider\LoginRequest;
use App\Http\Requests\Rider\PasswordResetRequest;
use App\Http\Requests\Rider\RegRequest;
use App\V1\Rider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * @Resource("Login")
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
     * 骑手登录密码重置（忘记密码|更换密码）
     * @Post("/api/rider/password/reset")
     * @Version({"v1"})
     * @Request({"account":"15611111111","verify_code":"1234","new_password":"123456","is_verify_code":"是否为验证码方式(默认为false)"})
     * @Request({"old_password":"旧密码","new_password":"新密码","new_password_confirmation":"重复新密码"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function resetPassword (PasswordResetRequest $request) {
        $params = $request->all();
        if ($request->input('is_verify_code', false)) {
            $verify_code = "1234";
            if($verify_code != $params['verify_code']){
                return $this->returnJson(1,'验证码输入错误');
            }
        }else{
            $old_password = '123456';
            if($params['old_password'] != $old_password){
                return $this->returnJson(1, '原密码输入错误');
            }
        }
        return $this->returnJson(0,'密码重置成功');
    }

}