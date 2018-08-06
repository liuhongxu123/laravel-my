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
    $api->post('customer/login', 'CustomerController@login')->name('登录');
    // 注册
    $api->post('customer/register', 'CustomerController@register')->name('注册');
    // 找回密码
    $api->post('customer/password/reset', 'CustomerController@resetPassword')->name('找回密码');

    //************************  附近商家  *******************************

    // 附近商家列表
    $api->get('customer/near/stores', 'NearController@stores')->name('附近商家列表');
    // 附近商家主页
    $api->get('customer/near/store/info', 'NearController@storeInfo')->name('附近商家主页');
    // 附近商家主页评论列表
    $api->get('customer/near/store/comments', 'NearController@storeComments')->name('附近商家主页评论列表');
    // 附近商家主页添加评论
    $api->post('customer/near/store/comments', 'NearController@createStoreComment')->name('附近商家主页添加评论');
    // 附近商家推荐菜品
    $api->get('customer/near/store/recommend/goods', 'NearController@storeGoodsRecommend')->name('附近商家推荐菜品');

    //************************  店取  *******************************




    //************************  外卖  *******************************



    //************************  订单  *******************************
    // 订单列表(外卖, 堂食, 店取)
    $api->get('customer/orders', 'OrderController@orders')->name('订单列表');

    //************************  扫码  *******************************

    // 商家信息
    $api->get('customer/dine/store/info', 'StoreController@dineStoreInfo')->name('商家信息');
    // 菜品分类列表
    $api->get('customer/dine/store/menus', 'StoreController@dineStoreMenu')->name('菜品分类列表');
    // 菜品列表
    $api->get('customer/dine/store/menu/goods', 'StoreController@dineStoreMenuGoods')->name('菜品列表');
    // 菜品详情
    $api->get('customer/dine/store/goods/info', 'StoreController@dineGoodsInfo')->name('菜品详情');
    // 菜品评价
    $api->get('customer/dine/store/goods/comments', 'StoreController@dineGoodsComments')->name('菜品评价');
    // 提交订单
    $api->post('customer/dine/order', 'StoreController@dineOrder')->name('提交订单');
    



});

// app 用户端接口(登录)
$api->version('v1', [
//    'middleware' => ['JwtCustomer', 'jwt.auth'],
    'namespace' => 'App\Http\Controllers\Customer\V1'
], function ($api)
{
    // 退出
    $api->post('customer/logout', 'CustomerController@logout')->name('退出');
    // 修改密码
    $api->post('customer/password/update', 'CustomerController@updatePassword')->name('updatePassword')->name('修改密码');
    // 修改手机号
    $api->post('customer/phone/update', 'CustomerController@updatePhone')->name('updatePhone')->name('修改手机号');
    // 修改头像
    $api->post('customer/head/update', 'CustomerController@updateHead')->name('updateHead')->name('修改头像');
    // 修改用户名
    $api->post('customer/name/update', 'CustomerController@updateName')->name('updateName')->name('修改用户名');
    // 获取用户信息
    $api->get('customer/info', 'CustomerController@customerInfo')->name('获取用户信息');
    // 账号绑定
    $api->post('customer/bind/google', 'CustomerController@bindGoogle')->name('bindGoogle')->name('');
    $api->post('customer/bind/twitter', 'CustomerController@bindTwitter')->name('bindTwitter')->name('');
    $api->post('customer/bind/facebook', 'CustomerController@bindFaceBook')->name('bindFaceBook')->name('');
    


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
    //退出登录
    $api->post('rider/logout', 'LoginController@logout');
    //骑手注册
    $api->post('rider/reg', 'LoginController@reg');
    //骑手忘记密码
    $api->post('rider/password/forget', 'LoginController@forgetPassword');

    $api->group([
        'middleware' => ['jwt.rider.auth']
    ], function ($api) {
        //************************  用户相关Api  *******************************
        //修改密码
        $api->post('rider/password/reset', 'UserController@resetPassword');
        //更换绑定手机
        $api->post('rider/phone/reset', 'UserController@resetPhone');
        //骑手基本信息
        $api->get('rider/basic_info', 'UserController@getBasicInfo');
        //骑手本月战绩
        $api->get('rider/month_score', 'UserController@getMonthScore');
        //骑手入驻
        $api->post('rider/join', 'UserController@join');
        //骑手实名认证
        $api->post('rider/certificate', 'UserController@certificate');
        //骑手实名信息
        $api->get('rider/certificate_info', 'UserController@getCertificateInfo');
        //骑手余额基本信息
        $api->get('rider/balance', 'UserController@getBalance');
        //获取银行流水
        $api->get('rider/bank_statement', 'UserController@getBankStatement');
        //骑手收款账户信息
        $api->get('rider/account', 'UserController@getAccountInfo');
        //骑手收款账户设置
        $api->post('rider/account/set', 'UserController@accountSet');
        //骑手评价信息
        $api->get('rider/evaluate', 'UserController@evaluate');
        //设置工作状态
        $api->post('rider/set_work_status', 'UserController@setWorkStatus');

        //************************  骑手意见相关Api  ***************************************
        //骑手意见列表
        $api->get('rider/suggestion', 'SuggestionController@getSuggestion');
        //骑手意见详情
        $api->get('rider/suggestion/details', 'SuggestionController@getSuggestionDetails');
        //骑手提交意见
        $api->post('rider/suggestion/post', 'SuggestionController@suggestionPost');
        //获取意见分类
        $api->get('rider/suggestion/cat', 'SuggestionController@getSuggestionCat');

        //************************  App相关Api  ***************************************
        //获取app基本信息
        $api->get('rider/app/info', 'AppController@getInfo');
        //更新app
        $api->get('rider/app/update', 'AppController@update');
        //app历史版本
        $api->get('rider/app/version', 'AppController@getVersionList');
        //app版本详情
        $api->get('rider/app/version/details', 'AppController@getVersionDetails');
        //获取骑手协议
        $api->get('rider/app/rider_protocol', 'AppController@getRiderProtocol');
        //获取隐私政策信息
        $api->get('rider/app/privacy_policy', 'AppController@getPrivacyPolicy');
        //获取客服热线
        $api->get('rider/app/hotline', 'AppController@getHotline');
        //获取短信模板
        $api->get('rider/app/smstmpl', 'AppController@getSmsTmpl');

        //************************  订单相关Api  ***************************************
        //订单列表
        $api->get('rider/order/get_list', 'OrderController@getList');
        //获取订单详情
        $api->get('rider/order/details', 'OrderController@getDetails');
        //获取订单明细
        $api->get('rider/order/order_statement', 'OrderController@getOrderStatement');
        //骑手确认接单
        $api->post('rider/order/robbing', 'OrderController@robbing');
        //骑手到店上报
        $api->post('rider/order/reach_store', 'OrderController@reachStore');
        //骑手确认收货
        $api->post('rider/order/take_delivery', 'OrderController@takeDelivery');
        //骑手确认送达
        $api->post('rider/order/finish', 'OrderController@finish');
        //获取本月剩余转单数
        $api->get('rider/order/get_slip_num', 'OrderController@getSlipNum');
        //确认转订单
        $api->post('rider/order/slip', 'OrderController@slip');
        //取消转单
        $api->post('rider/order/cancel_slip', 'OrderController@cancelSlip');
        //获取订单异常类型
        $api->get('rider/order/abnormal_cat', 'OrderController@getAbnormalCat');
        //订单异常报备
        $api->post('rider/order/abnormal_post', 'OrderController@abnormalPost');

        //************************  消息相关Api  ***************************************
        //获取订单消息
        $api->get('rider/ordermsg', 'MsgController@getOrdersMsg');
        //获取系统消息
        $api->get('rider/sysmsg', 'MsgController@getSysMsg');
        //获取系统消息详情
        $api->get('rider/sysmsg/details', 'MsgController@getSysMsgDetails');
        //获取短信验证码
        $api->post('rider/get_sms_code', 'MsgController@getSmsCode');

        //************************  测试控制器  ***************************************
        $api->post('test/index', 'TestController@index');
    });

});

