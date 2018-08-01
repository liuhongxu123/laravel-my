<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 14:20
 */

namespace App\Http\Controllers\Rider\V1;


use App\Http\Controllers\Controller;

/**
 * @Resource("App")
 */
class AppController extends Controller {

    /**
     * app基本信息
     * @Get("/api/rider/app/info")
     * @Version({"v1"})
     * @Request({})
     */
    public function getInfo () {
        $data = [
            'photo' => '1.jpg',
            'version' => 'v1.1.0'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * app更新
     * @Get("/api/rider/app/update")
     * @Version({"v1"})
     * @Request({})
     */
    public function update () {
        return $this->returnJson(0, '已是最新版本');
    }

    /**
     * app历史版本列表
     * @Get("/api/rider/app/versions")
     * @Version({"v1"})
     * @Request({})
     */
    public function versions () {
        $data = [
            ['title' => 'v2.1.1版本主要更新', 'date' => '06.12'],
            ['title' => 'v2.1.6版本主要更新', 'date' => '10.08']
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * app版本详情
     * @Get("/api/rider/app/version/$id")
     * @Version({"v1"})
     * @Request({})
     */
    public function version ($id) {
        $data = [
            'content' => '1.jpg'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取隐私政策信息
     * @Get("/api/rider/app/privacy_policy")
     * @Version({"v1"})
     */
    public function getPrivacyPolicy () {
        $data = [
            'content' => '这是隐私政策信息'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取骑手协议
     * @Get("/api/rider/app/rider_protocol")
     * @Version({"v1"})
     * @Request({})
     */
    public function getRiderProtocol () {
        $data = [
            'content' => '这是骑手协议的内容'
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 获取热线
     * @Get("/api/rider/app/hotline")
     * @Version({"v1"})
     * @Request({})
     */
    public function getHotline () {
        $data = [
            ['name' => '服务热线', 'tel' => '2135131667'],
            ['name' => '客服热线', 'tel' => '1234567882']
        ];
        return $this->returnJson(0, 'success', $data);
    }
}