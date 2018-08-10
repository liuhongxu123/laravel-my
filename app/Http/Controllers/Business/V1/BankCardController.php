<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 11:52
 */

namespace App\Http\Controllers\Business\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Business\V1\SetBankCardInfoRequest;

/**
 * @Resource("商家后台APP--银行卡接口")
 */
class BankCardController extends Controller {

    /**
     * 获取银行卡信息
     * @Get("/bank_card_info/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "name": "户名",
     *          "account": "账户",
     *          "bank_cat": "开户行"
     *     }})
     */
    public function getBankCardInfo () {
        $data = [
            'name' => '蚂蚁',
            'account' => '345512428421',
            'bank_cat' => '中国工商银行骏景分行'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 设置银行卡信息
     * @Post("/bank_card_info/set")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="户名", required=true),
     *      @Parameter("account", description="账户", required=true),
     *      @Parameter("bank_cat", description="开户行", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function setBankCardInfo (SetBankCardInfoRequest $request) {
        return $this->returnJson(0, '保存成功');
    }

    /**
     * 获取信用卡信息
     * @Get("/credit_card_info/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "name": "姓名",
     *          "account": "信用卡账户",
     *     }})
     */
    public function getCreditCardInfo () {
        $data = [
            'name' => '蚂蚁',
            'account' => '345512428421'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 设置信用卡信息
     * @Post("/credit_card_info/set")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("name", description="姓名", required=true),
     *      @Parameter("account", description="信用卡账号", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function setCreditCardInfo (SetBankCardInfoRequest $request) {
        return $this->returnJson(0, '保存成功');
    }

}