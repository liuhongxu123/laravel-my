<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/10
 * Time: 10:36
 */

namespace App\Http\Controllers\Business\V1;


use App\Http\Controllers\Controller;

/**
 * @Resource("商家后台APP--协议接口")
 */
class ProtocolController extends Controller {

    /**
     * 获取协议列表
     * @Get("/protocol/list/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *      "id": "协议id",
     *      "title": "协议标题"
     *     }}})
     */
    public function getList () {
        $data = [
            [
                'id' => 1,
                'title' => '隐私政策',
            ],
            [
                'id' => 2,
                'title' => '商户协议',
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取协议内容（退款规则获取）
     * @Get("/protocol/details/get/$id")
     * @Parameters({
     *      @Parameter("id", description="协议的id", required=true, type="integer")
     *     })
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {
     *      "title": "协议标题",
     *      "content": "协议内容，该内容为富文本，包含HTML标签"
     *     }})
     */
    public function getDetails () {
        $data = [
            'title' => '协议标题',
            'content' => '<p>这是协议的内容，这是协议的内容</p>'
        ];
        return $this->returnJson(0, 'success', $data);
    }
}


















