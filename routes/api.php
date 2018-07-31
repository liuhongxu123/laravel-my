<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function($api){
    $api->get('hello', 'App\Http\Controllers\TestController@hello');
});

/**
 * 测试 jwt
 */

$api->version('v1', function ($api)
{
    /**
     * 生成令牌
     * @username string 用户名
     * @Password string 用户密码
     */
    $api->post('login', 'App\Http\Controllers\TestController@login');

    $api->group([
        'middleware'=>'jwt.auth'
    ], function ($api)
    {
        /**
         * 查看令牌信息
         * @token string 令牌
         */
        $api->get('test','App\Http\Controllers\TestController@info');
    });
});

/**
 * 测试语言
 */
$api->version('v1', function ($api)
{
    $api->get('lang/en', 'App\Http\Controllers\TestController@lang_en');
    $api->get('lang/zh-CN', 'App\Http\Controllers\TestController@lang_zh');

});

// app 用户端接口(非登录)
$api->version('v1', [
    'middleware' => ['JwtCustomer'],
    'namespace' => 'App\Http\Controllers\Customer\V1'
], function ($api)
{
    // 登录
    $api->post('customer/login', 'CustomerController@login');
    // 注册
    $api->post('customer/register', 'CustomerController@register');
    // 退出
    $api->post('customer/logout', 'CustomerController@logout');
    // 找回密码
    $api->post('customer/password/reset', 'CustomerController@resetPassword');
});

// app 用户端接口(登录)
$api->version('v1', [
    'middleware' => ['JwtCustomer', 'jwt.auth'],
    'namespace' => 'App\Http\Controllers\Customer\V1'
], function ($api)
{
    // 修改密码
    $api->post('customer/password/update', 'CustomerController@updatePassword')->name('updatePassword');
    // 修改手机号
    $api->post('customer/phone/update', 'CustomerController@updatePhone')->name('updatePhone');
    // 修改头像
    $api->post('customer/head/update', 'CustomerController@updateHead')->name('updateHead');
    // 修改用户名
    $api->post('customer/name/update', 'CustomerController@updateName')->name('updateName');
    // 账号绑定
    $api->post('customer/bind/google', 'CustomerController@bindGoogle')->name('bindGoogle');
    $api->post('customer/bind/twitter', 'CustomerController@bindTwitter')->name('bindTwitter');
    $api->post('customer/bind/facebook', 'CustomerController@bindFaceBook')->name('bindFaceBook');
    // 获取用户信息
    $api->get('customer/info', 'CustomerController@customerInfo')->name('binds');


});
