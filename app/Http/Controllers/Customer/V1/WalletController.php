<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Resource("电子钱包")
 */
class WalletController extends Controller
{

    /**
     * 卡列表
     *
     * 1/信用卡; 2/借记卡
     *
     * @Get("api/customer/wallet/cards")
     * @Version("v1")
     */
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
     *
     * @Post("api/customer/wallet/debit/card")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "card_type",
     *         description="卡类型",
     *         type="int",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "card_host_name",
     *         description="持卡人姓名",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "card_num",
     *         description="卡号",
     *         type="array",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "card_host_phone",
     *         description="预留手机号",
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
     * })
     * 
     */
    public function createDebitCard()
    {
        return $this->returnJson(0, 'success', $data);
    }


    /**
     * 添加信用卡
     *
     * @Post("api/customer/wallet/credit/card")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "card_type",
     *         description="卡类型",
     *         type="int",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "card_host_name",
     *         description="持卡人姓名",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "card_num",
     *         description="卡号",
     *         type="array",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "card_validity_time",
     *         description="卡有效期",
     *         type="string",
     *         required=true,
     *         default="2018-12-25 12:32:12"
     *     ),
     * })
     * 
     */
    public function createCreditCard()
    {
        return $this->returnJson(0, 'success', $data);
        
    }

    /**
     * 常见问题列表
     * 
     * @Get("api/customer/wallet/questions")
     * @Version("v1")
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
     *
     * @Get("api/customer/wallet/question/detail")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "question_id",
     *         description="问题ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
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
