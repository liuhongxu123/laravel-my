<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdressController extends Controller
{
    /**
     * 用户收货地址列表
     * 1/男, 2/女
     * @return [type] [description]
     */
    public function index()
    {
        $data = [
            [
                'address_id' => 1,
                'address_name' => '这里是收货地址',
                'customer_name' => '张三',
                'customer_sex' => 1,
                'customer_phone' => 13800138001,
            ],
            [
                'address_id' => 1,
                'address_name' => '这里是收货地址',
                'customer_name' => '张三',
                'customer_sex' => 1,
                'customer_phone' => 13800138001,
            ],
            [
                'address_id' => 1,
                'address_name' => '这里是收货地址',
                'customer_name' => '张三',
                'customer_sex' => 1,
                'customer_phone' => 13800138001,
            ]
        ];

        return $this->returnJson(0, 'success', $data);
    }

    public function store()
    {
        return $this->returnJson(0, 'success', $data);
        
    }

    public function detail()
    {
        return $this->returnJson(0, 'success', $data);
        
    }

    public function update()
    {
        return $this->returnJson(0, 'success', $data);
        
    }

    public function destroy()
    {
        return $this->returnJson(0, 'success', $data);
        
    }
}
