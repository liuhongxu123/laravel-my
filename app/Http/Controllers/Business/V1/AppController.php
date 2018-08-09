<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/9
 * Time: 13:56
 */

namespace App\Http\Controllers\Business\V1;


use App\Http\Controllers\Controller;

/**
 * @Resource("商家后台APP--APP接口")
 */
class AppController extends Controller {

    /**
     * app基本信息
     * @Get("/app/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *     "photo": "app缩略图",
     *     "version": "版本号"
     *
     * }})
     */
    public function getInfo () {
        $data = [
            'photo' => '1.jpg',
            'version' => '欧本富商家v1.1.0'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * app检查更新
     * @Get("/app/update")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function update () {
        return $this->returnJson(0, '已是最新版本');
    }

    /**
     * 获取app历史版本列表
     * @Get("/app/version/list/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *      "id": "版本id",
     *      "title": "版本更新标题信息",
     *      "date": "版本更新日期"
     * }})
     */
    public function getVersionList () {
        $data = [
            ['id' => 1, 'title' => 'v2.1.1版本主要更新', 'date' => '2018-06-06 14:14:12'],
            ['id' => 2, 'title' => 'v2.1.6版本主要更新', 'date' => '2018-06-06 14:14:12']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取app历史版本详情
     * @Get("/app/version/details/get/$id")
     * @Parameters({
     *      @Parameter("id", description="版本id", required=true)
     *     })
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "content": "更新内容"
     *     }})
     */
    public function getVersionDetails () {
        $data = [
            'content' => asset('storage/rider/suggestion/@origin/20180806/dFqTRWtcMV5yd3XLT3OYqnlnzbbC8MRw5KOu004y.jpeg')
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取隐私政策信息
     * @Get("/app/privacy_policy/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "content": "政策内容"
     *     }})
     */
    public function getPrivacyPolicy () {
        $data = [
            'content' => '这是隐私政策的内容'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取商户协议
     * @Get("/app/business_protocol/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *          "content": "骑手协议内容"
     *     }})
     */
    public function getBusinessProtocol () {
        $data = [
            'content' => '这是商户协议的内容'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取常见问题列表
     * @Get("/app/faqlist/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *      "title": "问题描述",
     *      "content": "解决办法"
     *     }}})
     */
    public function getFAQList () {
        $data = [
            ['title' => '用户退款，怎么处理？', 'content' => '这是处理的方法，这是处理的方法'],
            ['title' => '遇到差评怎么办？', 'content' => '这是处理的方法，这是处理的方法']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取技术联系电话
     * @Get("/app/hotline/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *
     *     }})
     */
    public function getHotline () {
        $data = [
            'mobile' => '1524214821'
        ];
        return $this->returnJson(0, 'success', $data);
    }

}


















