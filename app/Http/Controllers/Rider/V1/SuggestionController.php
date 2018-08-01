<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/1
 * Time: 11:22
 */

namespace App\Http\Controllers\Rider\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\SuggestionPostRequest;

/**
 * @Resource("骑手意见相关API")
 */
class SuggestionController extends Controller {

    /**
     * 骑手意见列表
     * @Get("/api/rider/suggestion")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getSuggestion () {
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
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function getSuggestionDetails () {
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
     * @Request("type=意见类型&content=内容&photo=图片", contentType="multipart/form-data")
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function suggestionPost (SuggestionPostRequest $request) {
        return $this->returnJson(0, '意见提交成功');
    }
}