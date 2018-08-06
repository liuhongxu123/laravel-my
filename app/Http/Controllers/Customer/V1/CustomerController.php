<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\V1\Customer;


/**
 * @Resource("customers")
 */

class CustomerController extends Controller
{

    /**
     * 登录
     *
     * 用户端APP登录
     *
     * @Post("api/customer/login")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "customer_phone", 
     *         description="用户名(手机号)", 
     *         type="string",
     *         required=true,
     *         default="13800138001"
     *     ),
     *     @Parameter(
     *         "customer_password", 
     *         description="用户密码", 
     *         type="string",
     *         required=true,
     *         default="test"
     *     ),
     * })
     * 
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function login(Request $request)
    {
        $Customer = new Customer();
        $Customer->customer_phone = '13800138001';
        $Customer->customer_password = 'test';

        // $token = auth()->login($Customer->find(1));
        $token = auth()->login($Customer);

        return $this->returnJson(0, 'success', ['token' => $token]);

    }

    /**
     * 注册
     *
     * 用户端APP注册
     *
     * @Post("/api/customer/register")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "customer_phone", 
     *         description="用户名(手机号)", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "phone_code", 
     *         description="验证码", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "customer_password", 
     *         description="用户密码", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     * })
     * 
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function register(Request $request)
    {
         return $this->returnJson(0, 'success');
    }


    /**
     * 退出
     *
     * 用户端APP退出 (需要token)
     *
     * @Post("/api/customer/logout")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "token", 
     *         description="token 令牌", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     * })
     * 
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function logout(Request $request)
    {
        return $this->returnJson(0, 'success');
    }


    /**
     * 找回密码
     *
     * 用户端APP找回密码
     *
     * @Post("/api/customer/password/reset")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "customer_phone", 
     *         description="用户名(手机号)", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "phone_code", 
     *         description="验证码", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "phone_zone", 
     *         description="区号", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "customer_password", 
     *         description="用户密码", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     * })
     * 
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function resetPassword(Request $request)
    {
        return $this->returnJson(0, 'success');
    }

    /**
     * 修改密码
     *
     * 用户端APP修改密码
     *
     * @Post("/api/customer/password/update")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "customer_password", 
     *         description="原始密码", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "customer_new_password", 
     *         description="新密码", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "customer_new_password_twice", 
     *         description="第二次确认密码", 
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     * 
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function updatePassword(Request $request)
    {
        return $this->returnJson(0, 'success');
    }


    /**
     * 修改绑定手机号
     *
     * 用户端APP修改绑定手机号 (需要token)
     *
     * @Post("/api/customer/phone/update")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "customer_new_phone", 
     *         description="新的手机号", 
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "phone_code", 
     *         description="验证码", 
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     * 
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function updatePhone(Request $request)
    {
        return $this->returnJson(0, 'success');
    }

    /**
     * 修改用户头像
     *
     * 用户端APP修改用户头像 (需要token)
     *
     * @Post("/api/customer/head/update")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "hear_img",
     *         description="用户头像",
     *         type="base64位图片",
     *         required=true,
     *         default=""
     *     )
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function updateHead(Request $request)
    {
        return $this->returnJson(0, 'success');
    }

    /**
     * 修改用户名
     *
     * 用户端APP修改用户名 (需要token)
     *
     * @Post("/api/customer/name/update")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "customer_name",
     *         description="用户名",
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function updateName(Request $request)
    {
        return $this->returnJson(0, 'success');
    }

    /**
     * 获取用户信息
     *
     * 用户端APP修改用户名 (需要token)
     *
     * @Post("/api/customer/info")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function customerInfo(Request $request)
    {
        return $this->returnJson(0, 'success');
    }

    /**
     * 绑定 google
     *
     * 用户端APP绑定谷歌账号 (需要token)
     *
     * @Post("/api/customer/bind/google")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function bindGoogle(Request $request)
    {
        return $this->returnJson(0, 'success');
    }

    /**
     * 绑定 Twitter
     *
     * 用户端APP绑定 Twitter(需要token)
     *
     * @Post("/api/customer/bind/twitter")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function bindTwitter(Request $request)
    {
        return $this->returnJson(0, 'success');
    }

    /**
     * 绑定 FaceBook
     *
     * 用户端APP绑定 FaceBook(需要token)
     *
     * @Post("/api/customer/bind/facebook")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function bindFaceBook(Request $request)
    {
        return $this->returnJson(0, 'success');
    }

    /**
     * 查新新人红包
     *
     * 用户端APP绑定 Twitter(需要token)
     *
     * @Post("/api/customer/bind/twitter")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function redredEnvelope()
    {
        
    }

}
