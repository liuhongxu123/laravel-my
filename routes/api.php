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

// 将所有的 Exception 全部交给 App\Exceptions\Handler 来处理
app('api.exception')->register(function (Exception $exception) {
    $request = Illuminate\Http\Request::capture();
    return app('App\Exceptions\Handler')->render($request, $exception);
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
    // 找回密码
    $api->post('customer/password/reset', 'CustomerController@resetPassword');

    //************************  附近商家  *******************************

    // 附近商家列表
    $api->get('customer/near/stores', 'NearController@stores');
    // 附近商家主页
    $api->get('customer/near/store/info', 'NearController@storeInfo');
    // 附近商家主页评论列表
    $api->get('customer/near/store/comments', 'NearController@storeComments');
    // 附近商家主页添加评论
    $api->post('customer/near/store/comments', 'NearController@createStoreComment');
    // 附近商家推荐菜品
    $api->get('customer/near/store/recommend/goods', 'NearController@storeGoodsRecommend');

    //************************  店取  *******************************




    //************************  外卖  *******************************



    //************************  订单  *******************************
    // 订单列表(外卖, 堂食, 店取)
    $api->get('customer/orders', 'OrderController@orders');

    //************************  扫码  *******************************

    // 商家信息
    $api->get('customer/dine/store/info', 'StoreController@dineStoreInfo');
    // 菜品分类列表
    $api->get('customer/dine/store/menus', 'StoreController@dineStoreMenu');
    // 菜品列表
    $api->get('customer/dine/store/menu/goods', 'StoreController@dineStoreMenuGoods');
    // 菜品详情
    $api->get('customer/dine/store/goods/info', 'StoreController@dineGoodsInfo');
    // 菜品评价
    $api->get('customer/dine/store/goods/comments', 'StoreController@dineGoodsComments');
    // 提交订单
    $api->post('customer/dine/order', 'StoreController@dineOrder');
    
});

// app 用户端接口(登录)
$api->version('v1', [
//    'middleware' => ['JwtCustomer', 'jwt.auth'],
    'namespace' => 'App\Http\Controllers\Customer\V1'
], function ($api)
{
    // 退出
    $api->post('customer/logout', 'CustomerController@logout');
    // 修改密码
    $api->post('customer/password/update', 'CustomerController@updatePassword');
    // 修改手机号
    $api->post('customer/phone/update', 'CustomerController@updatePhone');
    // 修改头像
    $api->post('customer/head/update', 'CustomerController@updateHead');
    // 修改用户名
    $api->post('customer/name/update', 'CustomerController@updateName');
    // 获取用户信息
    $api->get('customer/info', 'CustomerController@customerInfo');
    // 账号绑定
    $api->post('customer/bind/google', 'CustomerController@bindGoogle');
    $api->post('customer/bind/twitter', 'CustomerController@bindTwitter');
    $api->post('customer/bind/facebook', 'CustomerController@bindFaceBook');

    /*-----------------------  地址  -----------------------*/
    // 收货地址列表
    $api->get('customer/addreses', 'CustomerController@index');
    // 删除收货地址
    $api->post('customer/address/destroy', 'CustomerController@destroy');
    // 添加收货地址
    $api->post('customer/addreses/create', 'CustomerController@store');
    // 编辑收货地址
    $api->post('customer/addreses/update', 'CustomerController@update');
    // 收货地址详情
    $api->post('customer/addreses/detail', 'CustomerController@detail');




    /*-----------------------  电子钱包  -----------------------*/
    // 卡列表
    $api->get('customer/wallet/cards', 'WalletController@cards');
    // 添加借记卡
    $api->post('customer/wallet/debit/card', 'WalletController@createDebitCard');
    // 添加信用卡
    $api->post('customer/wallet/credit/card', 'WalletController@createCreditCard');
    // 常见问题列表
    $api->get('customer/wallet/questions', 'WalletController@questions');
    // 问题详情
    $api->get('customer/wallet/question/detail', 'WalletController@questionDetail');



    /*-----------------------  消息列表  -----------------------*/
    // 订单消息
    $api->get('customer/news/orders', 'NewsController@orderNews');
    // 系统消息
    $api->get('customer/news/system', 'NewsController@systemNews');
    // 系统消息详情
    $api->get('customer/news/system/detail', 'NewsController@systemDetail');

    /*-----------------------  意见反馈  -----------------------*/
    // 提交意见反馈
    $api->post('customer/suggest/create', 'SuggestController@store');
    // 意见反馈列表
    $api->post('customer/suggests', 'SuggestController@index');


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
        'middleware' => ['jwt.auth.and.refresh']
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

/**
 * **********************************商家后台APP API*****************************************
 * 登录验证待修改
 */

$api->version('v1',[
    'namespace' => 'App\Http\Controllers\BusinessApp\V1',
    //'middleware' => 'JwtRider',
], function ($api) {
    $api->group(['prefix' => 'business'], function ($api) {
        //获取验证码
        $api->post('get_sms_code', 'MsgController@getSmsCode');


    });

});


























