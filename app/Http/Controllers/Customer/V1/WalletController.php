<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    // 1. 信用卡
    // 2. 借记卡
    public function cards()
    {
        $data = [
            [
                'card_id' =>'1',
                'card_type' =>'1',
                'card_host_name' =>'我是户主',
                'card_type' => '1',
                'card_num' =>'123456798',
                'card_validity_time' =>'2369-12-3 12:36:23',
            ],[
                'card_id' =>'1',
                'card_type' =>'1',
                'card_host_name' =>'我是户主',
                'card_type' => '1',
                'card_num' =>'123456798',
                'card_validity_time' =>'2369-12-3 12:36:23',
            ],
            [
                'card_id' =>'1',
                'card_type' =>'1',
                'card_host_name' =>'我是户主',
                'card_type' => '1',
                'card_num' =>'123456798',
                'card_validity_time' =>'2369-12-3 12:36:23',
            ],
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 添加借记卡
     * [createDebitCard description]
     * @return [type] [description]
     */
    public function createDebitCard()
    {
        return $this->returnJson(0, 'success', $data);
        
    }


    /**
     * 添加信用卡
     * [createCreditCard description]
     * @return [type] [description]
     */
    public function createCreditCard()
    {
        return $this->returnJson(0, 'success', $data);
        
    }

    /**
     * 常见问题列表
     * [questions description]
     * @return [type] [description]
     */
    public function questions()
    {
        $data = [
            [
                'question_id' => '12',
                'questions_title' => '问题标题',
            ],
            [
                'question_id' => '12',
                'questions_title' => '问题标题',
            ],
            [
                'question_id' => '12',
                'questions_title' => '问题标题',
            ],
            [
                'question_id' => '12',
                'questions_title' => '问题标题',
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    
    }

    /**
     * 问题详情
     * [questionDetail description]
     * @return [type] [description]
     */
    public function questionDetail()
    {
        $data = [
            'question_id' => 1,
            'question_title' => '问题标题',
            'question_detail' => '<p>这里是html代码, 需要解析</p>',
            'created_at' =>'2369-12-3 12:36:23',
        ];
        return $this->returnJson(0, 'success', $data);
    }

    


}
