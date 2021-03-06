<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/13
 * Time: 13:59
 */

namespace App\Http\Controllers\Rider\V1;

use App\Http\Controllers\Controller;

/**
 * @Resource("骑手协议接口")
 */
class ProtocolController extends Controller {

    /**
     * 获取协议列表
     * @Get("/api/rider/protocol/list/get")
     * @Versions({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {"list":{{
     *      "id": "协议id",
     *      "title": "协议标题"
     *     }}}})
     */
    public function getList () {
        $data = [
            'list' => [
                [
                    'id' => 1,
                    'title' => '隐私政策',
                ],
                [
                    'id' => 2,
                    'title' => '商户协议',
                ]
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取协议内容
     * @Get("/api/rider/protocol/details/get")
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
            'content' => <<<html
<h1>这是骑手协议的标题</h1>
<p>这是内容，很多很多的内容这是内容，很多很多的内容这是内容，很多很多的内容这是内容，很多很多的内容这是内容，很多很多的内容这是内容，很多很多的内容这是内容，很多很多的内容这是内容，很多很多的内容</p>
html

        ];
        return $this->returnJson(0, 'success', $data);
    }
}