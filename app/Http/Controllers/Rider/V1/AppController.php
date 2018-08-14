<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 14:20
 */

namespace App\Http\Controllers\Rider\V1;


use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\V1\GetVersionDetailsRequest;

/**
 * @Resource("骑手APP接口")
 */
class AppController extends Controller {

    /**
     * app更新
     * @Get("/api/rider/app/update")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": ""})
     */
    public function update () {
        return $this->returnJson(0, '已是最新版本');
    }

    /**
     * app历史版本列表
     * @Get("/api/rider/app/version/list/get")
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
     * app历史版本详情
     * @Get("/api/rider/app/version/details/get/$id")
     * @Parameters({
     *      @Parameter("id", description="版本id", required=true, type="integer")
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
     * 获取热线
     * @Get("/api/rider/app/hotline/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "name": "热线名称",
     *          "tel": "热线电话"
     *     }}})
     */
    public function getHotline () {
        $data = [
            ['name' => '服务热线', 'tel' => '2135131667'],
            ['name' => '客服热线', 'tel' => '1234567882']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取短信模板
     * @Get("/api/rider/app/smstmpl/get")
     * @Version({"v1"})
     * @Response(200, body={"code":0, "message": "","data": {{
     *          "content": "短信模板内容"
     *     }}})
     */
    public function getSmsTmpl (){
        $data = [
            ['content' => '默认/自定义'],
            ['content' => '货品马上送到(10分钟内)'],
            ['content' => '由于天气原因要稍晚送到'],
        ];
        return $this->returnJson(0, 'success', $data);
    }
}