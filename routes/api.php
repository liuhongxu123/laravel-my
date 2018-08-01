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

/**
 * rider 骑手端接口
 */
$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Rider\V1',
    'middleware' => 'JwtRider'
], function ($api) {
    //骑手登录
    $api->post('rider/login', 'LoginController@login');
    //骑手注册
    $api->post('rider/reg', 'LoginController@reg');

    $api->group([
        'middleware' => ['jwt.rider.auth']
    ], function ($api) {
        //************************  用户相关Api  *******************************
        //退出登录
        $api->post('rider/logout', 'LoginController@logout');
        //重置密码
        $api->post('rider/password/reset', 'LoginController@resetPassword');
        //更换绑定手机
        $api->post('rider/phone/reset', 'UserController@resetPhone');
        //骑手基本信息
        $api->get('rider/basic_info', 'UserController@getBasicInfo');
        //骑手本月战绩
        $api->get('rider/month_score', 'UserController@getMonthScore');
        //骑手订单信息
        $api->get('rider/orders/{status}', 'UserController@orders');
        //骑手实名认证
        $api->post('rider/certificate', 'UserController@certificate');
        //骑手实名信息
        $api->get('rider/certificate_info', 'UserController@getCertificateInfo');
        //骑手余额信息
        $api->get('rider/balance', 'UserController@balance');
        //骑手余额明细
        $api->get('rider/balance_details', 'UserController@balanceDetails');
        //骑手收款账户信息
        $api->get('rider/account_info', 'UserController@accountInfo');
        //骑手账户设置
        $api->post('rider/account/set', 'UserController@accountSet');
        //骑手评价信息
        $api->get('rider/evaluate/{type?}', 'UserController@evaluate');

        //************************  骑手意见相关Api  ***************************************
        //骑手意见列表
        $api->get('rider/suggestion', 'UserController@suggestions');
        //骑手意见详情
        $api->get('rider/suggestion/{id}', 'UserController@suggestion');
        //骑手提交意见
        $api->post('rider/suggestion/post', 'UserController@suggestionPost');

        //************************  App相关Api  ***************************************
        //获取app基本信息
        $api->get('rider/app/info', 'AppController@getInfo');
        //更新app
        $api->get('rider/app/update', 'AppController@update');
        //app历史版本
        $api->get('rider/app/versions', 'AppController@versions');
        //app版本详情
        $api->get('rider/app/version/{id}', 'AppController@version');
        //获取骑手协议
        $api->get('rider/app/rider_protocol', 'AppController@getRiderProtocol');
        //获取隐私政策信息
        $api->get('rider/app/privacy_policy', 'AppController@getPrivacyPolicy');
        //获取客服热线
        $api->get('rider/app/hotline', 'AppController@getHotline');

        //************************  订单相关Api  ***************************************
        //订单列表
        $api->get('rider/order/index', 'OrderController@index');
        //骑手已接订单
        $api->get('rider/order/took', 'OrderController@took');
        //获取短信模板
        $api->get('rider/order/sms_tmpl', 'OrderController@getSmsTmpl');
        //骑手到店上报
        $api->post('rider/order/reach_store', 'OrderController@reachStore');
        //骑手确认收货
        $api->post('rider/order/confirm', 'OrderController@confirm');
        //获取订单菜品
        $api->get('rider/order/foods', 'OrderController@getFood');
        //获取订单详情
        $api->get('rider/order/details', 'OrderController@getDetails');

    });

});

