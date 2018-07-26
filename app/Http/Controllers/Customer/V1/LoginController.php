<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\V1\Customer;

class LoginController extends Controller
{
    /**
     * 用户 app- 登录
     *
     * @customer_name string 用户名
     * @customer_new_password string 用户密码
     * @verify_code string 验证码
     */
    public function login(Request $request)
    {
        $Customer = new Customer();

        $token = auth()->login($Customer->find(1));

        return $this->returnJson(0, '登录成功', ['token' => $token]);

    }

    /**
     * 用户 app- 注册
     * @customer_name string 用户名
     * @customer_new_password string 用户密码
     * @verify_code string 验证码
     * @return json
     */
    public function register(Request $request)
    {
         return $this->returnJson(0, '注册成功');
    }

    /**
     * 用户 app-退出
     */
    public function logout(Request $request)
    {
        return $this->returnJson(0, '退出成功');
    }


    /**
     * 用户 app - 修改密码
     * @customer_name string 用户名
     * @customer_new_password string 用户密码
     * @verify_code string 验证码
     */
    public function updatePassword(Request $request)
    {
        return $this->returnJson(0, '密码更新成功');
    }


}
