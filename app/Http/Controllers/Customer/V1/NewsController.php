<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Resource("消息通知")
 */
class NewsController extends Controller
{
    /**
     * 订单消息(token)
     *
     * @Get("/api/customer/news/orders")
     * @Version("v1")
     */
    public function orderNews()
    {
        $data = [
            [
                'news_id' => 4,
                'order_id' =>444,
                'news_desc' => '消息简述, 消息简述, 消息简述',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'news_id' => 4,
                'order_id' =>444,
                'news_desc' => '消息简述, 消息简述, 消息简述',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'news_id' => 4,
                'order_id' =>444,
                'news_desc' => '消息简述, 消息简述, 消息简述',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'news_id' => 4,
                'order_id' =>444,
                'news_desc' => '消息简述, 消息简述, 消息简述',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 系统消息(token)
     *
     * @Get("/api/customer/news/system")
     * @Version("v1")
     */
    public function systemNews()
    {
        $data = [
            [
                'news_id' => 4,
                'order_id' =>444,
                'news_desc' => '消息简述, 消息简述, 消息简述',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'news_id' => 4,
                'order_id' =>444,
                'news_desc' => '消息简述, 消息简述, 消息简述',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'news_id' => 4,
                'order_id' =>444,
                'news_desc' => '消息简述, 消息简述, 消息简述',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'news_id' => 4,
                'order_id' =>444,
                'news_desc' => '消息简述, 消息简述, 消息简述',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 系统详情
     *
     * @Post("api/customer/news/system/detail")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "news_id",
     *         description="消息ID",
     *         type="int",
     *         required=true,
     *         default=""
     *     )
     * })
     * @return [type] [description]
     */
    public function systemDetail()
    {
         $data = [
            [
                'news_id' => 4,
                'order_id' =>444,
                'news_detail' => "<p>这里是html代码, 包含图片, 需要解析<img src='1.jpg' /></p>",
                'created_at' => date('Y-m-d H:i:s'),
            ],
            
        ];
        return $this->returnJson(0, 'success', $data);
    }
}
