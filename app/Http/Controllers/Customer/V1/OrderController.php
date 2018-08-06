<?php

namespace App\Http\Controllers\Customer\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * 订单列表
     *
     * 订单类型: 1 堂食订单; 2 店取订单; 3 外卖订单
     * 商家头像
     * 商家名
     * 商家ID
     * 商品列表 arr
     *      商品名
     *      商品数量
     *总价
     * 订单状态
     *      订单完成 已接单 配送中 订单已取消
     *
     */
    public function orders()
    {

    }

    public function orderInfo()
    {

    }
}
