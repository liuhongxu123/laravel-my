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
     * app检查更新
     * @Get("/app/update")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *      "version": "版本号",
     *      "download_url": "版本下载地址"
     *     }})
     */
    public function update () {
        $data = [
            'version' => 'v1.0',
            'download_url' => 'http://www.aaa.com'
        ];
        return $this->returnJson(0, 'success', $data);
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
     *          "content": "富文本内容，包含HTML标签，需要解析"
     *     }})
     */
    public function getVersionDetails () {
        $data = [
            'content' => '<p>版本详情，版本详情，这是详情</p>'
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
     *      "mobile": "技术热线电话"
     *     }})
     */
    public function getHotline () {
        $data = [
            'mobile' => '1524214821'
        ];
        return $this->returnJson(0, 'success', $data);
    }

}


















