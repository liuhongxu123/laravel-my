<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Resource("用户APP-堂食")
 */
class StoreController extends Controller
{
    /**
     * 商家信息
     *
     * @Get("api/customer/dine/store/info")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_id",
     *         description="商家ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function dineStoreInfo()
    {
        $data = [
            'store_id' => 1,
            'store_name' => '肯德基',
            'store_placard' => '这里是商家公告',
            'store_logo' => '1.jpg',
        ];
        $this->returnJson(0, 'success', $data);
    }


    /**
     * 分类列表
     *
     * @Get("api/customer/dine/store/menus")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_id",
     *         description="商家ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function dineStoreType()
    {
        $data = [
            [
                'type_id' => '1',
                'type_name' => '汉堡1',
            ],[
                'type_id' => '2',
                'type_name' => '汉堡2',
            ],[
                'type_id' => '3',
                'type_name' => '汉堡3',
            ],[
                'type_id' => '4',
                'type_name' => '小吃',
            ],
        ];

        $this->returnJson(0, 'success', $data);
    }

    /**
     * 菜品列表
     *
     * @Get("api/customer/dine/store/menus")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_id",
     *         description="商家ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "type_id",
     *         description="分类ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function dineStoreMenuGoods()
    {
        $data = [
            [
                'goods_id' => '1',
                'goods_name' => '巨无霸',
                'goods_img' => '巨无霸',
                'goods_desc' => '这里是商品描述, 很长很长, 超出来了,超出来了,超出来了,',
                'goods_month_sale_num' => '20',
                'goods_norm' => [
                    [
                        'norm_id' => '1',
                        'norm_name' => '小份',
                        'norm_price' => 20,
                        
                    ],
                    [
                        'norm_id' => '2',
                        'norm_name' => '大份',
                        'norm_price' => 29,
                        
                    ]
                ],
                'goods_price' => '20',
            ],
            [
                'goods_id' => '1',
                'goods_name' => '巨无霸',
                'goods_img' => '巨无霸',
                'goods_desc' => '这里是商品描述, 很长很长, 超出来了,超出来了,超出来了,',
                'goods_month_sale_num' => '20',
                'goods_norm' => [
                    [
                        'norm_id' => '1',
                        'norm_name' => '小份',
                        'norm_price' => 20,
                        
                    ],
                    [
                        'norm_id' => '2',
                        'norm_name' => '大份',
                        'norm_price' => 29,
                        
                    ]
                ],
                'goods_price' => '20',
            ],
            [
                'goods_id' => '1',
                'goods_name' => '巨无霸',
                'goods_img' => '巨无霸',
                'goods_desc' => '这里是商品描述, 很长很长, 超出来了,超出来了,超出来了,',
                'goods_month_sale_num' => '20',
                'goods_norm' => [
                    [
                        'norm_id' => '1',
                        'norm_name' => '小份',
                        'norm_price' => 20,
                        
                    ],
                    [
                        'norm_id' => '2',
                        'norm_name' => '大份',
                        'norm_price' => 29,
                        
                    ]
                ],
                'goods_price' => '20',
            ],
            [
                'goods_id' => '1',
                'goods_name' => '巨无霸',
                'goods_img' => '巨无霸',
                'goods_desc' => '这里是商品描述, 很长很长, 超出来了,超出来了,超出来了,',
                'goods_month_sale_num' => '20',
                'goods_norm' => [
                    [
                        'norm_id' => '1',
                        'norm_name' => '小份',
                        'norm_price' => 20,
                        
                    ],
                    [
                        'norm_id' => '2',
                        'norm_name' => '大份',
                        'norm_price' => 29,
                        
                    ]
                ],
                'goods_price' => '20',
            ]
            
        ];
        $this->returnJson(0, 'success', $data);
    }

    /**
     * 菜品详情
     *
     * @Get("api/customer/dine/store/goods/info")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_id",
     *         description="商家ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "type_id",
     *         description="菜品ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function dineGoodsInfo()
    {
        $data = [
            'goods_id' => '1',
            'goods_name' => '巨无霸',
            'goods_img' => '1.jpg',
            'goods_desc' => '这里是商品描述, 很长很长, 超出来了,超出来了,超出来了,',
            'goods_month_sale_num' => '2030',
            'goods_norm' => [
                [
                    'norm_id' => '1',
                    'norm_name' => '小份',
                    'norm_price' => 20,
                    
                ],
                [
                    'norm_id' => '2',
                    'norm_name' => '大份',
                    'norm_price' => 29,
                    
                ]
            ],
            'goods_price' => '20',
        ];
        $this->returnJson(0, 'success', $data);
    }

    /**
     * 菜品评论
     *
     * @Get("api/customer/dine/store/goods/info")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_id",
     *         description="商家ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "type_id",
     *         description="菜品ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "page",
     *         description="页码",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *      @Parameter(
     *         "page_nums",
     *         description="每页显示的总条数",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function dineGoodsComments()
    {
        $data = [
            'count' => '100',
            'comments' => [
                [
                    'comment_id' => '1',
                    'customer_id' => '1',
                    'customer_name' => 'zhangsan',
                    'customer_ing' => '1.jpg',
                    'comment_content' => '这里是评论的内容',
                    'created_time' => '1992-26-36 12:54:63',
                    'comment_img' => [
                        '1.jpg',
                        '1.jpg',
                        '1.jpg',
                        '1.jpg',
                    ]
                ],
                [
                    'comment_id' => '1',
                    'customer_id' => '1',
                    'customer_name' => 'zhangsan',
                    'customer_ing' => '1.jpg',
                    'comment_content' => '这里是评论的内容',
                    'created_time' => '1992-26-36 12:54:63',
                    'comment_img' => [
                        '1.jpg',
                        '1.jpg',
                        '1.jpg',
                        '1.jpg',
                    ]
                ]
            ]
        ];
        $this->returnJson(0, 'success', $data);
    }
}
