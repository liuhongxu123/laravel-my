<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/1
 * Time: 11:22
 */

namespace App\Http\Controllers\Business\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Business\V1\PostSuggestionRequest;

/**
 * @Resource("商家后台APP--意见接口")
 */
class SuggestionController extends Controller {

    /**
     * 意见列表
     * @Get("/suggestion/list/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *      "content": "意见内容",
     *      "date": "提交意见时间"
     * }}})
     */
    public function getSuggestion () {
        $data = [
            [
                'content' => '来单不响，真的是不响，等了好久都不响，来单不响，来单不响，来单不响，来单不响啊，不响啊',
                'date' => '2018-03-21 12:12:12'
            ],
            ['content' => '来单不响', 'date' => '2018-03-21 12:12:12']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 意见详情
     * @Get("/suggestion/details/get/$id")
     * @Version({"v1"})
     * @Parameters({
     *      @Parameter("id", description="意见id")
     *     })
     * @Response(200, body={"code":0, "message": "","data": {
     *      "cat_id": "意见分类id",
     *      "content": "意见具体内容",
     *      "photo": {{
     *          "path": "图片路径"
     *     }}
     *     }})
     */
    public function getSuggestionDetails () {
        $data = [
            'cat_id' => 1,
            'content' => '这是意见的内容，这里有很多的内容，此处省略好多字',
            'photo' => [
                ['path' => asset('storage/rider/suggestion/@origin/20180806/dFqTRWtcMV5yd3XLT3OYqnlnzbbC8MRw5KOu004y.jpeg')],
                ['path' => asset('storage/rider/suggestion/@origin/20180806/dFqTRWtcMV5yd3XLT3OYqnlnzbbC8MRw5KOu004y.jpeg')]
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 意见提交
     * @Post("/suggestion/post")
     * @Version({"v1"})
     * @Request("cat_id=意见类型id&content=意见内容&photo=附加图片", contentType="multipart/form-data")
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function PostSuggestion (PostSuggestionRequest $request) {
        return $this->returnJson(0, 'success');
    }

    /**
     * 获取意见分类
     * @Get("/suggestion/cat/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *      "id": "类别ID",
     *      "name": "类别名称"
     *     }}})
     */
    public function getSuggestionCat () {
        $data = [
            ["id" => 1, 'name' => '软件使用问题'],
            ["id" => 2, 'name' => '其他问题']
        ];
        return $this->returnJson(0, 'success', $data);
    }
}