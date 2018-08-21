<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/27
 * Time: 16:45
 */

namespace App\Http\Controllers\Rider\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\V1\AccountSetRequest;
use App\Http\Requests\Rider\V1\CertificateRequest;
use App\Http\Requests\Rider\V1\JoinRequest;
use App\Http\Requests\Rider\V1\PasswordResetRequest;
use App\Http\Requests\Rider\V1\PhoneResetRequest;
use App\Http\Requests\Rider\V1\SetWorkStatusRequest;
use App\Http\Services\Rider\V1\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

/**
 * @Resource("骑手用户接口")
 */
class UserController extends Controller {

    /**
     * 骑手基本信息
     * @Get("/api/rider/basic_info/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "real_name": "真实姓名",
     *          "score": "综合评分",
     *          "today_count": "今日单量",
     *          "today_income": "今日收入",
     *          "month_count": "本月单量",
     *          "month_income": "本月收入",
     *          "work_status": "工作状态 work_status=1 接单状态 work_status=0 休息状态",
     *          "is_certificate": "是否实名 1 是 0 否 -1 实名未通过",
     *          "avatar": "头像地址"
     *     }})
     */
    public function getBasicInfo () {
        $data = [
            'real_name' => '小小骑手大大',
            'score' => 92,
            'today_count' => 5,
            'today_income' => 12,
            'month_count' => 20,
            'month_income' => 100,
            'work_status' => 1,    //接单状态
            'is_certificate' => 0,
            'avatar' => asset('storage/rider/user_head/@origin/20180815/wK2cfpY4EtwEN9iZ2s4Sa8pIIaZlMFpIcM3Q5IEw.jpeg'),
        ];
        return $this->returnJson(0,'success', $data);
    }

    /**
     * 骑手修改密码
     * @Post("/api/rider/password/reset")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("old_password", description="旧密码", required=true),
     *      @Parameter("new_password", description="新密码", required=true),
     *      @Parameter("new_password_confirmation", description="重复密码", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function resetPassword (PasswordResetRequest $request) {
        /*$params = $request->all();
        $old_password = '123456a';
        if($params['old_password'] != $old_password){
            return $this->returnJson(1, '原密码输入错误');
        }*/
        return $this->returnJson(0, 'success');
    }

    /**
     * 更换绑定手机
     * @Post("/api/rider/phone/reset")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("old_mobile", description="旧手机号", required=true),
     *      @Parameter("new_mobile", description="新手机号", required=true),
     *      @Parameter("verify_code", description="验证码", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function resetPhone (PhoneResetRequest $request) {
        /*$old_mobile = '15611111111';
        $verify_code = '1234';
        $params = $request->all();
        if($params['old_mobile'] != $old_mobile){
            return $this->returnJson(1, '原手机号输入错误');
        }
            if($params['verify_code'] != $verify_code){
            return $this->returnJson(1, '验证码输入错误');
        }*/
        return $this->returnJson(0, 'success');
    }

    /**
     * 骑手设置工作状态
     * @Post("/api/rider/work_status/update")
     * @Parameters({
     *      @Parameter("work_status", description="工作状态 work_status=1 开工，work_status=0 休息状态")
     * })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function setWorkStatus (SetWorkStatusRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 获取本月战绩
     * @Get("/api/rider/month_score/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {"list":{{
     *          "date": "日期",
     *          "finish": "完成单量",
     *          "cancel": "取消单量",
     *          "income_sum": "总收入"
     *     }}}})
     */
    public function getMonthScore () {
        $data = [
            'list' => [
                ['date' => '2018.01.02 12:12:00', 'finish' => 25, 'cancel' => 2, 'income_sum' => 32],
                ['date' => '2018.01.03 12:12:00', 'finish' => 25, 'cancel' => 2, 'income_sum' => 32],
                ['date' => '2018.01.04 12:12:00', 'finish' => 25, 'cancel' => 2, 'income_sum' => 32],
                ['date' => '2018.01.05 12:12:00', 'finish' => 25, 'cancel' => 2, 'income_sum' => 32],
                ['date' => '2018.01.06 12:12:00', 'finish' => 25, 'cancel' => 2, 'income_sum' => 32]
            ]
        ];
        return $this->returnJson(0,'success', $data);
    }

    /**
     * 骑手入驻
     * @Post("/api/rider/join")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("rid", description="骑手id", required=true),
     *      @Parameter("name", description="姓名", required=true),
     *      @Parameter("mobile", description="手机号", required=true),
     *      @Parameter("email", description="邮箱", required=true),
     *      @Parameter("desc", description="个人简介", required=true),
     *      @Parameter("avatar", description="头像", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function join (JoinRequest $request) {
       /* $origin_path = 'rider/user_head/@origin/'.date('Ymd', time());
        $cut_path = storage_path('app/public/rider/user_head/@34_34/').date('Ymd',time());  //剪切图保存位置
        $file = $request->file('avatar');
        if (($fres = UploadService::saveOne($file, $origin_path, true, $cut_path))['err'] === 1) {
            return $this->returnJson(0, $fres['msg']);
        }
        $data = [
            'avatar' => $fres['path']
        ];*/
        return $this->returnJson(0, 'success');
    }

    /**
     * 骑手实名认证
     * @Post("/api/rider/certificate")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("name", description="姓名", required=true),
     *      @Parameter("mobile", description="手机号", required=true),
     *      @Parameter("email", description="邮箱", required=true),
     *      @Parameter("province", description="省", required=true),
     *      @Parameter("city", description="市", required=true),
     *      @Parameter("district", description="区", required=true),
     *      @Parameter("address", description="详细地址", required=true),
     *      @Parameter("safe_code", description="社会安全码", required=true),
     *      @Parameter("driver_permit", description="驾驶证图url", required=true),
     *      @Parameter("address_permit", description="地址证明图url", required=true),
     *      @Parameter("car_insurance", description="车险证明图", required=true),
     *      @Parameter("bank_code", description="银行代码", required=true),
     *      @Parameter("band_account", description="银行账户", required=true),
     *      @Parameter("cardholder", description="持卡人姓名", required=true),
     *      @Parameter("card_type", description="银行卡类型", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function certificate (CertificateRequest $request) {
        //file_put_contents(storage_path('app/public/aa.jpg'),base64_decode($request->input('driver_permit')));
        return $this->returnJson(0, 'success');
    }

    /**
     * 骑手实名信息
     * @Get("/api/rider/certificate_info/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "real_name": "真实姓名",
     *          "mobile": "电话",
     *          "email": "邮件",
     *          "address": "居住地址",
     *          "safe_code": "社会安全号码",
     *          "driver_permit": "驾驶证",
     *          "address_permit": "地址证明",
     *          "car_insurance": "汽车保险"
     *     }})
     */
    public function getCertificateInfo () {
        $data = [
            'real_name' => 'ling',
            'mobile' => '1561111111',
            'email' => 'qq@qq.com',
            'address' => '广州',
            'safe_code' => '222xxx',
            'driver_permit' => asset('storage/rider/certificate/@origin/20180802/HPPx5gNMp10LNeFgCFPplOk9amw4fI1SbQHJnQ9H.jpeg'),
            'address_permit' => asset('storage/rider/certificate/@origin/20180802/NphqNb3eoHRkLmiLLleyVTAAUniZl47YjfvxmXPX.jpeg'),
            'car_insurance' => asset('storage/rider/certificate/@origin/20180802/ogfBPJlCAzHKAvv1pP8sJEK3ZcyoDWK6OcneWoSn.jpeg')
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手基本余额信息
     * @Get("/api/rider/balance/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "balance": "余额",
     *          "balance_freeze": "冻结余额",
     *          "details": {{
     *              "date": "日期",
     *              "money": "收入金额",
     *              "balance": "余额"
     *     }}
     *     }})
     */
    public function getBalance () {
        $data = [
            'balance' => 500,
            'balance_freeze' => 2,
            'details' => [
                ['date' => '2018-02-03 20:12:00', 'money'=>628, 'balance' => '2500'],
                ['date' => '2018-02-01 20:12:00', 'money'=>592, 'balance' => '2500'],
                ['date' => '2018-01-29 20:12:00', 'money'=>787, 'balance' => '2500']
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手余额明细（将修改为订单明细）
     * @Get("/api/rider/balance/details")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("month", description="月份(传参方式形如：2018-03 的月份)")
     *     })
     * @Response(200, body={"code":0, "message": "","data": {"list":{{
     *          "date": "日期",
     *          "order_no": "订单号",
     *          "receiver": "收货人",
     *          "receiver_mobile": "联系电话",
     *          "remark": "备注",
     *          "sum": "合计",
     *          "origin": "取货",
     *          "destination": "送货",
     *          "type": ""
     *     }}}})
     */
    public function getBalanceDetails () {
        $data = [
            'list' => [
                [
                    "date" => '2018-03-03 12:02:02',
                    'order_no' => 'No1234567',
                    'receiver' => 'ling',   //收货人
                    'receiver_mobile' => '15611111111', //收货人电话
                    'remark' => '您好码放多备一份餐具',
                    'sum' => 25, //金额合计
                    'origin' => '广州市天河区旭景西街商业大厦',
                    'destination' => '广州市天河区员村三横路5号',
                    'type' => '1'
                ],
                [
                    "date" => '2018-03-03 12:02:02',
                    'order_no' => 'No1234567',
                    'receiver' => 'ling',   //收货人
                    'receiver_mobile' => '15611111111', //收货人电话
                    'mark' => '您好码放多备一份餐具',
                    'sum' => 25, //金额合计
                    'origin' => '广州市天河区旭景西街商业大厦',
                    'destination' => '广州市天河区员村三横路5号',
                    'type' => '2'
                ],
                [
                    "date" => '2018-03-03 12:02:02',
                    'order_no' => 'No1234567',
                    'receiver' => 'ling',   //收货人
                    'receiver_mobile' => '15611111111', //收货人电话
                    'mark' => '您好码放多备一份餐具',
                    'sum' => 25, //金额合计
                    'origin' => '广州市天河区旭景西街商业大厦',
                    'destination' => '广州市天河区员村三横路5号',
                    'type' => '1'
                ]
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取银行流水
     * @Get("api/rider/bank_statement/get")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("month", description="月份(传参方式形如：2018-03 的月份)")
     *     })
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "month": "月份",
     *          "item": {{
     *              "date": "日期",
     *              "bank_no": "银行账单",
     *              "bank_code": "银行代号",
     *              "money": "打款金额"
     *     }}
     *     }}})
     */
    public function getBankStatement () {
        $data = [
            [
                'month' => '2018-01-01 00:00:00',
                'item' => [
                    [
                        'date' => '2018-01-01 15:30:00',
                        'bank_no' => 'E15021212410',
                        'bank_code' => '12315452',
                        'money' => 124
                    ],
                    [
                        'date' => '2018-08-01 15:30:00',
                        'bank_no' => 'E15021212410',
                        'bank_code' => '12315452',
                        'money' => 12
                    ]
                ]
            ],
            [
                'month' => '2018-02-01 00:00:00',
                'item' => [
                    [
                        'date' => '2018-01-01 15:30:00',
                        'bank_no' => 'E15021212410',
                        'bank_code' => '12315452',
                        'money' => 124
                    ],
                    [
                        'date' => '2018-08-01 15:30:00',
                        'bank_no' => 'E15021212410',
                        'bank_code' => '12315452',
                        'money' => 12
                    ]
                ]
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手银行账户信息
     * @Get("/api/rider/account/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "bank_code": "银行代码",
     *          "bank_account": "银行账户",
     *          "cardholder": "持卡人姓名",
     *          "card_type": "存储类型"
     *     }})
     */
    public function getAccountInfo () {
        $data = [
            'bank_code' => '124542',
            'bank_account' => '1252 12451 1545',
            'cardholder' => '程晓华',
            'card_type' => 1
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手收款账户设置
     * @Post("/api/rider/account/update")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("bank_code", description="银行代码", required=true),
     *      @Parameter("bank_account", description="银行账户", required=true),
     *      @Parameter("cardholder", description="持卡人姓名", required=true),
     *      @Parameter("card_type", description="银行卡类型--type = 1 支票 type = 2 存储", required=true, type="integer")
     * })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function accountSet (AccountSetRequest $request) {
        return $this->returnJson(0, '设置成功');
    }

    /**
     * 骑手评价信息
     * @Get("/api/rider/evaluate/get")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("type",description="类型--type = 1 满意 type =2 不满意",default=0, type="integer")
     * })
     * @Response(200, body={"code":0, "message": "", "data": {"list":{{
     *          "content": "评级内容",
     *          "type": "评价类型--type=1 满意 type=2 不满意",
     *          "date": "评价日期"
     *     }}}})
     */
    public function evaluate (Request $request) {
        $type = intval($request->input('type',0));
        switch ($type) {
            case 0:
                $data = [
                    'list' => [
                        ['content' => '很好', 'type' => 1, 'date' => '2018-03-06 14:12:00'],
                        ['content' => '差评', 'type' => 2, 'date' => '2018-04-06 15:45:12'],
                        ['content' => '不错', 'type' => 1, 'date' => '2018-10-06 10:00:00']
                    ]
                ];
                break;
            case 1:
                $data = [
                    'list' => [
                        ['content' => '很好', 'type' => 1, 'date' => '2018-03-06 14:12:00'],
                        ['content' => '不错', 'type' => 1, 'date' => '2018-10-06 10:00:00']
                    ]
                ];
                break;
            case 2:
                $data = [
                    'list' => [
                        ['content' => '差评', 'type' => 2, 'date' => '2018-04-06 15:45:12']
                    ]
                ];
                break;
        }

        return $this->returnJson(0, 'success', $data);
    }
}