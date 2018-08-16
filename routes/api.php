<?php
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

    //************************  订单  *******************************
    // 订单列表(外卖, 堂食, 店取)
    $api->get('customer/orders', 'OrderController@orders');

    //************************  版本  *******************************
    // 获取最新版本
    $api->get('customer/version/latest', 'VersionController@versionLatest');
    // 获取版本列表
    $api->get('customer/versions', 'VersionController@versions');
    // 获取版本详情
    $api->get('customer/version/info', 'VersionController@versionInfo');
    
    //************************  协议  *******************************
    
    $api->get('customer/protocols', 'ProtocolController@protocols');
    $api->get('customer/protocolInfo', 'ProtocolController@protocolInfo');

    


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

    /*-----------------------  收藏  -----------------------*/
    // 收藏列表
    $api->get('customer/collects', 'CollectController@collects');
    // 取消收藏
    $api->post('customer/collect/delete', 'CollectController@destroy');
    


    /*-----------------------  我的评价  -----------------------*/
    // 大众评价
    

    // 订单评价
    



    /*-----------------------  地址  -----------------------*/
    // 收货地址列表
    $api->get('customer/addreses', 'AdressController@index');
    // 删除收货地址
    $api->post('customer/address/destroy', 'AdressController@destroy');
    // 添加收货地址
    $api->post('customer/addreses/create', 'AdressController@store');
    // 编辑收货地址
    $api->post('customer/addreses/update', 'AdressController@update');
    // 收货地址详情
    $api->get('customer/addreses/detail', 'AdressController@detail');

    /*-----------------------  红包  -----------------------*/
    // 红包列表; 1: 表示正常红包, 0 过期红包
    $api->get('customer/redpackages', 'RedPackageController@packages');




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
    $api->get('customer/suggests', 'SuggestController@index');


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
    //骑手入驻
    $api->post('rider/join', 'UserController@join');    //该接口不需要token

    $api->group([
        'middleware' => ['jwt.auth.and.refresh']
    ], function ($api) {
        //************************  用户相关Api  *******************************
        //修改密码
        $api->post('rider/password/reset', 'UserController@resetPassword');
        //更换绑定手机
        $api->post('rider/phone/reset', 'UserController@resetPhone');
        //骑手基本信息
        $api->get('rider/basic_info/get', 'UserController@getBasicInfo');
        //骑手本月战绩
        $api->get('rider/month_score/get', 'UserController@getMonthScore');
        //骑手实名认证
        $api->post('rider/certificate', 'UserController@certificate');
        //骑手实名信息
        $api->get('rider/certificate_info/get', 'UserController@getCertificateInfo');
        //骑手余额基本信息
        $api->get('rider/balance/get', 'UserController@getBalance');
        //获取银行流水
        $api->get('rider/bank_statement/get', 'UserController@getBankStatement');
        //骑手收款账户信息
        $api->get('rider/account/get', 'UserController@getAccountInfo');
        //骑手收款账户设置
        $api->post('rider/account/update', 'UserController@accountSet');
        //骑手评价信息
        $api->get('rider/evaluate/get', 'UserController@evaluate');
        //设置工作状态
        $api->post('rider/work_status/update', 'UserController@setWorkStatus');

        //************************  骑手意见相关Api  ***************************************
        //骑手意见列表
        $api->get('rider/suggestion/list/get', 'SuggestionController@getSuggestion');
        //骑手意见详情
        $api->get('rider/suggestion/details/get/{id}', 'SuggestionController@getSuggestionDetails')->where(['id' => '[0-9]+']);
        //骑手提交意见
        $api->post('rider/suggestion/post', 'SuggestionController@suggestionPost');
        //获取意见分类
        $api->get('rider/suggestion/cat/get', 'SuggestionController@getSuggestionCat');

        //************************  App 接口 ***************************************
        //获取app基本信息
        $api->get('rider/app/get', 'AppController@getInfo');
        //更新app
        $api->get('rider/app/update', 'AppController@update');
        //app历史版本
        $api->get('rider/app/version/list/get', 'AppController@getVersionList');
        //app版本详情
        $api->get('rider/app/version/details/get', 'AppController@getVersionDetails');
        //获取客服热线
        $api->get('rider/app/hotline/get', 'AppController@getHotline');
        //获取短信模板
        $api->get('rider/app/smstmpl/get', 'AppController@getSmsTmpl');

        //************************* 协议 接口 ***************************************
        //获取协议列表
        $api->get('rider/protocol/list/get', 'ProtocolController@getList');
        //获取协议详情
        $api->get('rider/protocol/details/get/{id}', 'ProtocolController@getDetails')->where(['id' => '[0-9]+']);

        //************************  订单相关Api  ***************************************
        //订单列表
        $api->get('rider/order/list/get/{status}', 'OrderController@getList')->where(['status' => '-?[0-9]+']);
        //获取订单详情
        $api->get('rider/order/details/get/{id}', 'OrderController@getDetails')->where(['id' => '[0-9]+']);
        //获取订单明细
        $api->get('rider/order/statement/get', 'OrderController@getOrderStatement');
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
        $api->get('rider/order/abnormity_cat/get', 'OrderController@getAbnormalCat');
        //订单异常报备
        $api->post('rider/order/abnormity/post', 'OrderController@abnormalPost');

        //************************  消息相关Api  ***************************************
        //获取订单消息
        $api->get('rider/ordermsg/list/get', 'MsgController@getOrdersMsg');
        //获取系统消息
        $api->get('rider/sysmsg/list/get', 'MsgController@getSysMsg');
        //获取系统消息详情
        $api->get('rider/sysmsg/details/{id}', 'MsgController@getSysMsgDetails')->where(['id' => '[0-9]+']);
        //获取短信验证码
        $api->post('rider/get_sms_code', 'MsgController@getSmsCode');

    });

});

/**
 * 商家后台APP 接口
 */
$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Business\V1',
    'middleware' => 'jwt.business.app'
], function ($api) {

    $api->group(['prefix' => 'business'], function ($api) {
        //注册
        $api->post('user/reg', 'LoginController@reg');
        //登录
        $api->post('user/login', 'LoginController@login');
        //退出登录
        $api->post('user/logout', 'LoginController@logout');
        //忘记密码
        $api->post('password/forget', 'LoginController@forgetPassword');

        //设置店铺信息
        $api->post('store/info/update', 'StoreController@setInfo');
        //获取人员规模分类
        $api->get('staff_size_cat/get', 'StoreController@getStaffSizeCat');
        //获取营业类别
        $api->get('business_cat/get', 'StoreController@getBusinessCat');

        $api->group([
            'middleware' => ['jwt.auth.and.refresh']
        ], function ($api) {
            //***************************** 银行卡 接口 **********************************
            //获取银行卡信息
            $api->get('bank_card_info/get', 'BankCardController@getBankCardInfo');
            //设置银行卡信息
            $api->post('bank_card_info/set', 'BankCardController@setBankCardInfo');
            //获取信用卡信息
            $api->get('credit_card_info/get', 'BankCardController@getCreditCardInfo');
            //设置信用卡信息
            $api->post('credit_card_info/set', 'BankCardController@setCreditCardInfo');

            //****************************** 店铺 接口 ************************************
            //获取店铺信息
            $api->get('store/info/get/{store_id}', 'StoreController@getInfo')->where(['store_id' => '[0-9]+']);
            //获取店铺营业状态
            $api->get('store/status/get/{store_id}/{type}', 'StoreController@getStoreStatus')->where(['store_id' => '[0-9]+', 'type' => '[0-9]+']);
            //设置店铺营业时间
            $api->post('store/time/update', 'StoreController@updateStoreTime');
            //上传商家图片
            $api->post('store/img/upload', 'StoreController@uploadStoreImg');
            //获取餐厅业务信息
            $api->get('store/service/get/{store_id}', 'StoreController@getService')->where(['store_id' => '[0-9]+']);
            //开启业务
            $api->post('store/service/open/{store_id}/{type}', 'StoreController@openService')->where(['store_id' => '[0-9]+', 'type' => '[0-9]+']);
            //关闭业务
            $api->post('store/service/close/{store_id}/{type}', 'StoreController@closeService')->where(['store_id' => '[0-9]+', 'type' => '[0-9]+']);
            //修改门店头像
            $api->post('store/head/edit', 'StoreController@editStoreHead');
            //修改门店名称
            $api->post('store/name/edit/{id}', 'StoreController@editStoreName');
            //修改门店联系电话
            $api->post('store/tel/edit/{id}', 'StoreController@editStoreTel');
            //修改门店地址
            $api->post('store/address/edit', 'StoreController@editStoreAddress');
            //修改门店公告
            $api->post('store/notice/edit/{id}', 'StoreController@editStoreNotice');
            //获取配送信息
            $api->get('store/delivery/get/{id}', 'StoreController@getDeliveryInfo');
            //设置配送信息
            $api->post('store/delivery/edit', 'StoreController@editDeliveryInfo');
            //设置经营类别
            $api->post('store/business/edit', 'StoreController@editStoreBusiness');
            //获取所有服务设施
            $api->get('installation/get/{id}', 'StoreController@getInstallation');
            //修改门店服务设施
            $api->post('store/installation/edit', 'StoreController@editStoreInstalltion');
            //开启自动接单
            $api->post('store/auto_take_order/open/{id}', 'StoreController@openAutoTakeOrder');
            //关闭自动接单
            $api->get('store/auto_take_order/close/{id}', 'StoreController@closeAutoTakeOrder');

            //******************************* 消息 接口 **************************************
            //获取验证码
            $api->post('get_sms_code', 'MsgController@getSmsCode');
            //获取订单消息列表
            $api->get('ordermsg/get/{store_id}', 'MsgController@getOrderMsgList')->where(['store_id' => '[0-9]+']);
            //获取系统消息列表
            $api->get('sysmsg/get', 'MsgController@getSysMsgList');
            //获取系统消息详情
            $api->get('sysmsg/details/get/{id}', 'MsgController@getSysMsgDetails')->where(['id' => '[0-9]+']);

            //***************************** APP 接口 *************************************
            //app检查更新
            $api->get('app/update', 'AppController@update');
            //获取app历史版本
            $api->get('app/version/list/get', 'AppController@getVersionList');
            //获取app历史版本详情
            $api->get('app/version/details/get/{id}', 'AppController@getVersionDetails');
            //获取常见问题列表
            $api->get('app/faqlist/get', 'AppController@getFAQList');
            //获取技术联系电话
            $api->get('app/hotline/get', 'AppController@getHotline');

            //****************************** 协议 接口 ************************************
            //获取协议列表
            $api->get('protocol/list/get', 'ProtocolController@getList');
            //获取协议详情
            $api->get('protocol/details/get/{id}', 'ProtocolController@getDetails')->where(['id' => '[0-9]+']);


            //**************************** 用户 接口 *****************************************
            //获取账户信息
            $api->get('account_info/get/{id}', 'UserController@getAccountInfo');
            //修改密码
            $api->post('password/reset/{id}', 'UserController@resetPassword');
            //更换绑定手机
            $api->post('phone/reset', 'UserController@resetPhone');
            //获取公司信息
            $api->get('company/info/get', 'UserController@getCompanyInfo');

            //**************************** 意见 接口 ****************************************
            //意见列表
            $api->get('suggestion/list/get', 'SuggestionController@getSuggestion');
            //意见详情
            $api->get('suggestion/details/get', 'SuggestionController@getSuggestionDetails');
            //意见提交
            $api->post('suggestion/post', 'SuggestionController@PostSuggestion');
            //获取意见分类
            $api->get('suggestion/cat/get', 'SuggestionController@getSuggestionCat');

            //**************************** 订单 接口 *******************************************
            //获取外卖订单列表
            $api->get('order/take_out/get/{store_id}/{status}', 'OrderController@getTakeOutOrderList');
            //获取定去订单列表
            $api->get('order/take_by_yourself/get/{store_id}/{status}', 'OrderController@getTakeByYourselfList');
            //获取待处理订单
            $api->get('order/pending/get/{store_id}/{status}', 'OrderController@getPendingList');
            //出餐完成
            $api->post('order/meal/finish/{order_id}', 'OrderController@FinishMeal');
            //同意退款
            $api->post('order/refund/approve/{order_id}', 'OrderController@approveRefund');
            //拒绝退款
            $api->post('order/refund/refund/{order_id}', 'OrderController@refushRefund');
            //获取可选拒绝退款理由
            $api->get('reason/refund/get', 'OrderController@getRefundReasons');
            //获取可选取消订单理由
            $api->get('reason/order_cancel/get', 'OrderController@getCancelOrderReasons');

            //***************************** 统计 接口 ***************************************************
            //获取每日统计
            $api->get('statistics/day/get/{time}', 'StatisticsController@getStatisticsOfDay');
        });
    });

});






















