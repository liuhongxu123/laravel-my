<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuggestController extends Controller
{


    public function index()
    {
        $data = [
            [
                'suggest_id' => 1,
                'suggest_type' => '手机卡顿',
                'suggest_desc' => '卡啊, 卡啊,卡啊, 卡啊,卡啊, 卡啊,卡啊, 卡啊',
                'suggest_img' => [
                    '1.jpg',
                    '1.jpg',
                    '1.jpg',
                    '1.jpg'
                ],
                'created_time' => '2018-3-26 4:52:36',
            ],
            [
                'suggest_id' => 1,
                'suggest_type' => '手机卡顿',
                'suggest_desc' => '卡啊, 卡啊,卡啊, 卡啊,卡啊, 卡啊,卡啊, 卡啊',
                'suggest_img' => [
                    '1.jpg',
                    '1.jpg',
                    '1.jpg',
                    '1.jpg'
                ],
                'created_time' => '2018-3-26 4:52:36',
            ],
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * suggest_type string 建议类型
     * suggest_desc string 问题描述
     * suggest_img  arr  截图  
     * @return [type] [description]
     */
    public function store()
    {
        return $this->returnJson(0, 'success', $data);
    }


}
