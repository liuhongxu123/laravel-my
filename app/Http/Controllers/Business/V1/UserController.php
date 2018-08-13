<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 17:28
 */

namespace App\Http\Controllers\Business\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Business\V1\ResetPasswordRequest;
use App\Http\Requests\Business\V1\ResetPhoneRequest;

/**
 * @Resource("商家后台APP--用户接口")
 */
class UserController extends Controller {

    /**
     * 获取账户信息
     * @Get("/account_info/get/$id")
     * @Parameters({
     *      @Parameter("id", description="用户id", required=true)
     *     })
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *      "account": "主账户",
     *      "email": "绑定邮箱",
     *      "credit_card": "信用卡信息",
     *      "bank_card": "银行卡信息",
     *      "company": "公司信息"
     *     }})
     */
    public function getAccountInfo () {
        $data = [
            'account' => '18655665124',
            'email' => 'qq@qq.com',
            'credit_card' => '1223452212',
            'bank_card' => '1245422121',
            'company' => '蚂蚁智慧餐饮有限公司'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 修改密码
     * @Post("/password/reset/$id")
     * @Parameters({
     *      @Parameter("id", description="用户id", required=true),
     *      @Parameter("old_password", description="原始密码", required=true),
     *      @Parameter("new_password", description="新密码", required=true),
     *      @Parameter("new_password_confirmation", description="确认新密码", required=true)
     *     })
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function resetPassword (ResetPasswordRequest $request) {
        $params = $request->all();
        $old_password = '123456a';
        if($params['old_password'] != $old_password){
            return $this->returnJson(1, '原密码输入错误');
        }
        return $this->returnJson(0, '密码修改成功');
    }

    /**
     * 更换绑定手机
     * @Post("/phone/reset")
     * @Version({"v1"})
     * @Request({"old_mobile":"旧手机号","new_mobile":"新手机号","verify_code":"验证码"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function resetPhone (ResetPhoneRequest $request) {
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
     * 获取公司信息
     * @Get("/company/info/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "registration_name": "公司注册名",
     *          "address": "公司地址",
     *          "tax_registration_certificate": "税务登记号",
     *          "tax_rate_area": "税率地区",
     *          "tax_rete_set": "税率设置"
     *     }})
     */
    public function getCompanyInfo () {
        $data = [
            'registration_name' => '蚂蚁智慧餐饮有限公司',
            'company_address' => '美国纽约xxxxx',
            'tax_registration_certificate' => '21354521122',
            'tax_rate_area' => '纽约',
            'tax_reta_set' => '10%'
        ];
        return $this->returnJson(0, 'success', $data);
    }

}























