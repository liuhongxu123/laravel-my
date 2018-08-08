<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
 * @Resource("版本")
 */
class VersionController extends Controller
{
    /**
     * 最新版本
     * 
     * @Get("api/customer/version/latest")
     * @Version("v1")
     */
    public function versionLatest()
    {
        $data = [
            'version' => '1.0.0',
            'type' => '',
            'download_url' => 'https:www.baidu.com',
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 版本列表
     * 
     * @Get("api/customer/versions")
     * @Version("v1")
     */
    public function versions()
    {
        $data = [
            [
                'version_id' => '1',
                'version_title' => '添加新功能呢',
                'created_time' => date('Y-m-d H:i:s'),
            ],
            [
                'version_id' => '1',
                'version_title' => '添加新功能呢',
                'created_time' => date('Y-m-d H:i:s'),
            ],
            [
                'version_id' => '1',
                'version_title' => '添加新功能呢',
                'created_time' => date('Y-m-d H:i:s'),
            ]

        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 版本详情
     * @Get("api/customer/version/info")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "version_id",
     *         description="版本ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     */
    public function versionInfo()
    {
        $data = [
            'version_id' => '1',
            'version_title' => '添加新功能呢',
            'version_info' => '<p>这里是html代码需要解析</p>',
            'created_time' => date('Y-m-d H:i:s'),
        ];
        return $this->returnJson(0, 'success', $data);
    }
}
