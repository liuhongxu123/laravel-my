<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 10:30
 */

namespace App\Http\Controllers\Business\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Business\V1\PostStoreInfoRequest;
use App\Http\Requests\Business\V1\UpdateDeliveryRequest;
use App\Http\Requests\Business\V1\UpdateStoreAddressRequest;
use App\Http\Requests\Business\V1\UpdateStoreBusinessRequest;
use App\Http\Requests\Business\V1\UpdateStoreHeadRequest;
use App\Http\Requests\Business\V1\UpdateStoreInstallationRequest;
use App\Http\Requests\Business\V1\UpdateStoreNameRequest;
use App\Http\Requests\Business\V1\UpdateStoreNoticeRequest;
use App\Http\Requests\Business\V1\UpdateStoreTelRequest;
use App\Http\Requests\Business\V1\UpdateStoreTimeRequest;
use App\Http\Requests\Business\V1\UploadStoreImgRequest;

/**
 * @Resource("商家后台APP--门店接口")
 */
class StoreController extends Controller {

    /**
     * 上传店铺信息（无需token）
     * @Post("/store/info/update")
     * @Versions({"v1"})
     * @Parameters({
     *          @Parameter("store_name", description="店铺名称", required=true),
     *          @Parameter("province", description="省份", required=true),
     *          @Parameter("city", description="市", required=true),
     *          @Parameter("district", description="区", required=true),
     *          @Parameter("address", description="详细地址", required=true),
     *          @Parameter("staff_size", description="人员规模", required=true),
     *          @Parameter("business_cat", description="营业类别", required=true),
     *          @Parameter("link_name", description="联系人姓名", required=true),
     *          @Parameter("link_tel", description="联系电话", required=true),
     *          @Parameter("email", description="邮箱地址", required=true),
     *          @Parameter("credit_card_name", description="行用卡姓名", required=true),
     *          @Parameter("credit_card_account", description="行用卡账户", required=true),
     *          @Parameter("bank_card_name", description="银行卡姓名", required=true),
     *          @Parameter("bank_card_account", description="银行卡账户", required=true),
     *          @Parameter("bank_cat", description="开户行", required=true),
     *          @Parameter("registration_name", description="公司注册名", required=true),
     *          @Parameter("company_address", description="公司地址", required=true),
     *          @Parameter("tax_rate_area", description="税率地区", required=true),
     *          @Parameter("tax_rate_number", description="税率登记号", required=true),
     *          @Parameter("tax_rate_set", description="税率设置", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function setInfo (PostStoreInfoRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 获取人员规模分类（无需token）
     * @Get("/staff_size_cat/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "id": "分类id",
     *          "size": "人数"
     *     }}})
     */
    public function getStaffSizeCat () {
        $data = [
            ['id' => '1', 'size' => '1-20'],
            ['id' => '2', 'size' => '20-60'],
            ['id' => '3', 'size' => '60-90']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取营业类别（无需token）
     * @Get("/business_cat/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "id": "分类id",
     *          "name": "类别名称"
     *     }}})
     */
    public function getBusinessCat () {
        $data = [
            ['id' => '1', 'name' => '甜点饮品'],
            ['id' => '2', 'size' => '生活超市'],
            ['id' => '3', 'size' => '香锅/烤鱼'],
            ['id' => '4', 'size' => '包子/粥']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取商家店铺信息
     * @Get("/store/info/get/$store_id")
     * @Parameters({
     *      @Parameter("store_id", description="店铺id", required=true, type="integer")
     *     })
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "take_out_food_status": "外卖业务状态 1 营业中 0 已停业",
     *          "store_food_status": "店取业务状态 1 营业中 0 已停业",
     *          "store_head": "店铺头像",
     *          "store_name": "店铺名称",
     *          "service": "参订业务",
     *          "link_tel": "餐厅电话",
     *          "address": "餐厅地址",
     *          "notice": "餐厅公告",
     *          "distribution_scope": "配送范围",
     *          "business_cat": "经营品类",
     *          "installation": "服务设施",
     *          "store_img": "商家图片"
     *     }})
     */
    public function getInfo () {
        $data = [
            'take_out_food_status' => 1,
            'store_food_status' => 0,
            'store_head' => 'img.jpg',
            'store_name' => '麦当劳欢乐餐厅',
            'service' => [
                ['id' => 1, 'name' => '扫码'],
                ['id' => 2, 'name' => '外卖'],
                ['id' => 3, 'name' => '自取']
            ],
            'link_tel' => "18696650021",
            'address' => '广东省广州市天河区商业大厦',
            'notice' => '这是公告，这是公告',
            'distribution_scope' => 'newyork2134454',
            'business_cat' => [
                ['id' => 1, 'name' => '扫码'],
                ['id' => 2, 'name' => '外卖'],
                ['id' => 3, 'name' => '自取']
            ],
            'installation' => [
                ['id' => 1, 'name' => '甜点饮品'],
                ['id' => 1, 'name' => '快餐小吃'],
                ['id' => 1, 'name' => '冒菜']
            ],
            'store_img' => ['1.jpg', '2.jpg', '3.jpg']
        ];
        return $this->returnJson(0, 'success', $data);
    }


    /**
     * 获取店铺营业状态
     * @Get("/store/status/get/$store_id/$type")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="店铺id", required=true, type="integer"),
     *      @Parameter("type", description="获取类型 1 外卖 2 店取", required=true, type="integer")
     *     })
     * @Response(200, body={"code":0, "message": "","data": {
     *      "status": "营业状态 1 营业总 0 停业",
     *      "work_time": "营业时间段的数组",
     *      "work_day": "营业日 约定 0 代表周日 1 代表周一 类推"
     *     }})
     */
    public function getStoreStatus ($store_id, $type) {
        $data = [
            'status' => 1,
            'work_time' => [
                '9:00-12:00',
                '13:00-20:30'
            ],
            'work_day' => [0, 1, 3, 5]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 设置店铺营业时间
     * @Get("/store/status/update")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="店铺id", required=true, type="integer"),
     *      @Parameter("work_day", description="营业日（数组）", required=true, type="integer"),
     *      @Parameter("work_time", description="营业时间（数组）", required=true, type="integer")
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function updateStoreTime (UpdateStoreTimeRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 上传商家图片
     * @Post("/store/img/upload")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="店铺id", required=true, type="integer"),
     *      @Parameter("store_img", description="门店图片（数组）", required=true, type="integer"),
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function uploadStoreImg (UploadStoreImgRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 获取餐厅业务信息
     * @Get("/store/service/get/$store_id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": {
     *      "scan_service": "扫码业务",
     *      "take_out_food_service": "外卖业务",
     *      "help_yourself_service": "自取业务",
     *      "dine_in_service": "堂吃业务"
     *     }})
     */
    public function getService () {
        $data = [
            'scan_service' => 1,
            'take_out_food_service' => 0,
            'help_yourself_service' => 1,
            'dine_in_service' => 1
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 开启业务
     * @Post("/store/service/open/$store_id/$type")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true, type="integer"),
     *      @Parameter("type", description="服务类型 1=扫码服务 2=外卖服务 3=自取服务 4=堂吃服务")
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     *
     */
    public function openService ($type) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 关闭业务
     * @Get("/store/service/close/$store_id/$type")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true, type="integer"),
     *      @Parameter("type", description="服务类型 1=扫码服务 2=外卖服务 3=自取服务 4=堂吃服务")
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     *
     */
    public function closeService () {
        return $this->returnJson(0, 'success');
    }

    /**
     * 修改门店头像
     * @Post("/store/head/update")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true),
     *      @Parameter("store_head", description="图片", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     *
     */
    public function updateStoreHead (UpdateStoreHeadRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 修改门店名称
     * @Post("/store/name/update")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true),
     *      @Parameter("store_name", description="门店名称", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     *
     */
    public function updateStoreName (UpdateStoreNameRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 修改门店联系电话
     * @Post("/store/tel/update")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true),
     *      @Parameter("link_tel", description="提交一个电话号数组", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     *
     */
    public function updateStoreTel (UpdateStoreTelRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 修改门店地址
     * @Post("/store/address/update")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="门店id", required=true),
     *      @Parameter("province", description="省份", required=true),
     *      @Parameter("city", description="市", required=true),
     *      @Parameter("district", description="区", required=true),
     *      @Parameter("address", description="详细地址", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     *
     */
    public function updateStoreAddress (UpdateStoreAddressRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 修改门店公告
     * @Post("/store/notice/update")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true),
     *      @Parameter("notice", description="公告内容", required=true),
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     *
     */
    public function updateStoreNotice (UpdateStoreNoticeRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 获取配送信息
     * @Get("/store/delivery/get/$store_id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": {
     *      "delivery_team": "配送团队",
     *      "district_zip_code": "地区邮编",
     *      "distribution_scope": "配送范围 1=生效中",
     *      "cost_of_delivery": "起送费用"
     *     }})
     *
     */
    public function getDeliveryInfo () {
        $data = [
            'delivery_team' => '商家配送',
            'district_zip_code' => 'NEWYORK122154',
            'distribution_scope' => 1,
            'cost_of_delivery' => 15
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 设置配送信息
     * @Post("/store/delivery/update")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true),
     *      @Parameter("district_zip_code", description="地区邮编", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function updateDeliveryInfo (UpdateDeliveryRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 设置经营类别
     * @Post("/store/business/update")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("id", description="门店id", required=true),
     *      @Parameter("main_business", description="主营品类", required=true),
     *      @Parameter("secondary_business", description="辅营品类", required=false)
     *     })
     */
    public function updateStoreBusiness (UpdateStoreBusinessRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 获取所有服务设施
     * @Get("/installation/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *      "id": "设施id",
     *      "name": "设施名称"
     *     }}})
     */
    public function getInstallation () {
        $data = [
            ['id' => 1, 'name' => 'WIFI'],
            ['id' => 2, 'name' => '宝宝椅子'],
            ['id' => 3, 'name' => '户外座椅']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 修改门店服务设施
     * @Post("/store/installation/update")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true),
     *      @Parameter("installation", description="设施数组", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function updateStoreInstalltion (UpdateStoreInstallationRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 开启自动接单
     * @Post("/store/auto_take_order/open/$store_id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function openAutoTakeOrder () {
        return $this->returnJson(0, 'success');
    }

    /**
     * 关闭自动接单
     * @Post("/store/auto_take_order/close/$store_id")
     * @Versions({"v1"})
     * @Parameters({
     *      @Parameter("store_id", description="门店id", required=true)
     *     })
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function closeAutoTakeOrder () {
        return $this->returnJson(0, 'success');
    }

}




















