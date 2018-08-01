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
use App\Http\Requests\Rider\PasswordResetRequest;
use App\Http\Requests\Rider\PhoneResetRequest;
use App\Http\Requests\Rider\SuggestionPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * @Resource("User")
 */
class UserController extends Controller {

    /**
     * 骑手基本信息
     * @Get("/api/rider/basic_info")
     * @Version({"v1"})
     * @Request({})
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
     * @Get("/api/rider/month_score")
     * @Version({"v1"})
     * @Request({})
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
     * @Request({"name":"ling","mobile":"15611111111","email":"aa@qq.com","address":"东圃米研","safe_code":"222xx","driver_permit":"1.jpg","address_permit":"2.jpg","car_insurance":"3.jpg",
     *          "bank_code":"银行代码","band_account":"银行账号","cardholder":"持卡人姓名","card_type":"银行卡类型"})
     */
    public function certificate (CertificateRequest $request) {
        return $this->returnJson(0, '提交成功，等待审核');
    }

    /**
     * 骑手实名信息
     * @Get("/api/rider/certificate_info")
     * @Version({"v1"})
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
     *
     */
    public function getOrders () {

    }

    /**
     * 骑手余额信息
     * @Get("/api/rider/balance")
     * @Version({"v1"})
     */
    public function balance () {
        $data = [
            'balance' => 500,
            'balance_freeze' => 2,
            'details' => [
                ['date' => '2018.02.03', 'money'=>628],
                ['date' => '2018.02.01', 'money'=>592],
                ['date' => '2018.01.29', 'money'=>787]
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手余额明细
     * @Get("/api/rider/balance_details")
     * @Version({"v1"})
     */
    public function balanceDetails () {
        $data = [

        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手账户信息
     * type = 1 支票 type = 2 存储
     * @Get("/api/rider/account_info")
     * @Version({"v1"})
     */
    public function accountInfo () {
        $data = [
            'bank_code' => '124542',
            'bank_account' => '1252 12451 1545',
            'cardholder' => '程晓华',
            'card_type' => 1
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手账户设置
     * type = 1 支票 type = 2 存储
     * @Post("/api/rider/account/set")
     * @Version({"v1"})
     */
    public function accountSet (AccountSetRequest $request) {
        return $this->returnJson(0, '设置成功');
    }

    /**
     * 骑手评价信息
     * type = 1 满意 type =2 不满意
     * @Get("/api/rider/evaluate")
     * @Version({"v1"})
     */
    public function evaluate ($type = 0) {
        $data = [
            ['content' => '很好', 'type' => 1, 'date' => '2018.03.06'],
            ['content' => '差评', 'type' => 2, 'date' => '2018.04.06'],
            ['content' => '不错', 'type' => 1, 'date' => '2018.10.06']
        ];
        if ($type !== 0) {
            $data = array_filter($data, function ($val) use ($type) {
                return $val['type'] == $type;
            });
        }
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手意见列表
     * @Get("/api/rider/suggestion")
     * @Version({"v1"})
     */
    public function suggestions () {
        $data = [
            ['content' => '来单不响', 'date' => '06.03'],
            ['content' => '来单不响', 'date' => '06.03']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手意见详情
     * @Get("/api/rider/suggestion/$id")
     * @Version({"v1"})
     */
    public function suggestion () {
        $data = [
            'type' => 1,
            'content' => '这是意见',
            'photo' => [
                ['name' => '1.jpg'],
                ['name' => '2.jpg']
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 骑手意见提交
     * @Post("/api/rider/suggestion/post")
     * @Version({"v1"})
     * @Request({})
     */
    public function suggestionPost (SuggestionPostRequest $request) {
        return $this->returnJson(0, '意见提交成功');
    }
}