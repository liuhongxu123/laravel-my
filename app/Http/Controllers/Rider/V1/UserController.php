<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/27
 * Time: 16:45
 */

namespace App\Http\Controllers\Rider\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\AccountSetRequest;
use App\Http\Requests\Rider\CertificateRequest;
use App\Http\Requests\Rider\PhoneResetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * @Resource("骑手端用户API")
 */
class UserController extends Controller {

    /**
     * 骑手基本信息
     * @Get("/api/rider/basicinfo")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getBasicInfo (Request $request) {
        $data = [
            'name' => '小小骑手大大',
            'score' => '92',
            'score_today' => '5',
            'score_month' => '12',
            'status' => '1',    //接单状态
            'avatar' => 'my.jpg',
        ];
        return $this->returnJson(0,'success', $data);
    }

    /**
     * 更换绑定手机
     * @Post("/api/rider/phone/reset")
     * @Version({"v1"})
     * @Request({"old_mobile":"旧手机号","new_mobile":"新手机号","verify_code":"验证码"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function resetPhone (PhoneResetRequest $request) {
        $old_mobile = '15611111111';
        $verify_code = '1234';
        $params = $request->all();
        if($params['old_mobile'] != $old_mobile){
            return $this->returnJson(1, '原手机号输入错误');
        }
        if($params['verify_code'] != $verify_code){
            return $this->returnJson(1, '验证码输入错误');
        }
        return $this->returnJson(0, '绑定成功');
    }

    /**
     * 骑手本月战绩
     * @Get("/api/rider/monthscore")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getMonthScore () {
        $data = [
            ['date' => '2018.01.02', 'finish' => 25, 'cancel' => 2, 'income' => 32],
            ['date' => '2018.01.03', 'finish' => 25, 'cancel' => 2, 'income' => 32],
            ['date' => '2018.01.04', 'finish' => 25, 'cancel' => 2, 'income' => 32],
            ['date' => '2018.01.05', 'finish' => 25, 'cancel' => 2, 'income' => 32],
            ['date' => '2018.01.06', 'finish' => 25, 'cancel' => 2, 'income' => 32]
        ];
        return $this->returnJson(0,'success', $data);
    }

    /**
     * 骑手实名认证
     * @Post("/api/rider/certificate")
     * @Version({"v1"})
     * @Request({"name":"ling","mobile":"15611111111","email":"aa@qq.com","address":"东圃米研","safe_code":"222xx",
     *          "driver_permit":"1.jpg","address_permit":"2.jpg","car_insurance":"3.jpg",
     *          "bank_code":"银行代码","band_account":"银行账号","cardholder":"持卡人姓名","card_type":"银行卡类型"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function certificate (CertificateRequest $request) {
        return $this->returnJson(0, '提交成功，等待审核');
    }

    /**
     * 骑手实名信息
     * @Get("/api/rider/certificateinfo")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getCertificateInfo () {
        $data = [
            'name' => 'ling',
            'mobile' => '1561111111',
            'email' => 'qq@qq.com',
            'address' => '广州',
            'safe_code' => '222xxx',
            'driver_permit' => '1.jpg',
            'address_permit' => '2.jpg',
            'car_insurance' => '3.jpg'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手基本余额信息
     * @Get("/api/rider/balance")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getBalance () {
        $data = [
            'balance' => 500,
            'balance_freeze' => 2,
            'details' => [
                ['date' => '2018.02.03', 'money'=>628, 'balance' => '2500'],
                ['date' => '2018.02.01', 'money'=>592, 'balance' => '2500'],
                ['date' => '2018.01.29', 'money'=>787, 'balance' => '2500']
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手余额明细
     * @Get("/api/rider/balance/details")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": {"type":"类型--type=1 打款 type=2 订单收入"},"data": ""})
     */
    public function getBalanceDetails () {
        $data = [
            [
                'month' => '2018.03',
                'income' => 250,
                'pay' => 15,
                'details' => [
                    ["datetime" => '2018.03.03 12:02:02','bank_no' => 'E1562262', 'bank_code' => '1234521212', 'money' => 25, 'type' => '1'],
                    ["datetime" => '2018.03.03 12:02:02','bank_no' => 'E1562262', 'bank_code' => '1234521212', 'money' => 25, 'type' => '2'],
                    ["datetime" => '2018.03.03 12:02:02','bank_no' => 'E1562262', 'bank_code' => '1234521212', 'money' => 25, 'type' => '1']
                ]
            ],
            [
                'month' => '2018.03',
                'income' => 250,
                'pay' => 15,
                'details' => [
                    ["datetime" => '2018.03.03 12:02:02','bank_no' => 'E1562262', 'bank_code' => '1234521212', 'money' => 25, 'type' => '1'],
                    ["datetime" => '2018.03.03 12:02:02','bank_no' => 'E1562262', 'bank_code' => '1234521212', 'money' => 25, 'type' => '2'],
                    ["datetime" => '2018.03.03 12:02:02','bank_no' => 'E1562262', 'bank_code' => '1234521212', 'money' => 25, 'type' => '1']
                ]
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手银行账户信息
     * @Get("/api/rider/account")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
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
     * @Post("/api/rider/account/set")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("bank_code", description="银行代码", required=true),
     *      @Parameter("account", description="银行账户", required=true),
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
     * @Get("/api/rider/evaluate")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("type",description="类型--type = 1 满意 type =2 不满意",default=0)
     * })
     * @Response(200, body={"code":0, "message": "", "data": ""})
     */
    public function evaluate (Request $request) {
        $type = $request->input('type',"0");
        $data = [
            ['content' => '很好', 'type' => 1, 'date' => '2018.03.06'],
            ['content' => '差评', 'type' => 2, 'date' => '2018.04.06'],
            ['content' => '不错', 'type' => 1, 'date' => '2018.10.06']
        ];
        if ($type !== "0") {
            $data = array_filter($data, function ($val) use ($type) {
                return $val['type'] == $type;
            });
        }
        return $this->returnJson(0, 'success', $data);
    }
}