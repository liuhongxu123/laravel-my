<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Resource("用户APP-附近商家")
 */
class NearController extends Controller
{
    /**
     * 附近商家
     *
     * 用户端APP附近商家列表
     *
     * @Post("api/customer/near/stores")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_longitude",
     *         description="用户当前位置的经度",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "store_latitude",
     *         description="用户当前位置的经度",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function stores(Request $request)
    {
        $data = [
            [
                'store_id' => '1',
                'store_name' => '星巴克',
                'store_logo' => '1.png',
                'store_score' => '4.9',
                'store_avg_pay' => '13.6',
                'store_month_sale_num' => '633',
                'store_address' => '东圃/车陂',
                'store_longitude' => '37.96',
                'store_latitude' => '22.63',
                'store_tags' => '咖啡饮品'
            ],
            [
                'store_id' => '1',
                'store_name' => '星巴克',
                'store_logo' => '1.png',
                'store_score' => '4.9',
                'store_avg_pay' => '13.6',
                'store_month_sale_num' => '633',
                'store_address' => '东圃/车陂',
                'store_longitude' => '37.96',
                'store_latitude' => '22.63',
                'store_tags' => '咖啡饮品'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 附近商家主页信息
     *
     * 用户端APP附近商家主页信息
     *
     * @Post("api/customer/near/store/info")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_id",
     *         description="商家ID",
     *         type="string",
     *         required=true,
     *         default="1"
     *     )
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function storeInfo(Request $request)
    {
        $data = [
            [
                'store_id' => '1',
                'customer_id' => '1',
                'customer_name' => '还袋子',
                'customer_head' => '1.jpg',
                'comment_id' => '1',
                'comment_score' => '5',
                'comment_content' => '这里是评论内容, 很长很长',
                'comment_recommend_goods' => [
                    '评论',
                    '推荐',
                    '商品'
                ],
                'comment_img' => [
                    '1.jpg',
                    '2.jpg',
                    '3.jpg'
                ],
                'created_time' => '2018-01-03 12:45:32'
            ],
            [
                'store_id' => '1',
                'customer_id' => '1',
                'customer_name' => '还袋子',
                'customer_head' => '1.jpg',
                'comment_id' => '1',
                'comment_score' => '5',
                'comment_content' => '这里是评论内容, 很长很长',
                'comment_recommend_goods' => [
                    '评论',
                    '推荐',
                    '商品'
                ],
                'comment_img' => [
                    '1.jpg',
                    '2.jpg',
                    '3.jpg'
                ],
                'created_time' => '2018-01-03 12:45:32'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 附近商家评论列表
     *
     * 用户端APP附近商家主页评论列表
     *
     * @Get("api/customer/near/store/comments")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_id",
     *         description="商家ID",
     *         type="string",
     *         required=true,
     *         default="1"
     *     )
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function storeComments(Request $request)
    {
        $data = [
            [
                'store_id' => '1',
                'customer_id' => '1',
                'customer_name' => '还袋子',
                'customer_head' => '1.jpg',
                'comment_id' => '1',
                'comment_score' => '5',
                'comment_content' => '这里是评论内容, 很长很长',
                'comment_recommend_goods' => [
                    '评论',
                    '推荐',
                    '商品'
                ],
                'comment_img' => [
                    '1.jpg',
                    '2.jpg',
                    '3.jpg'
                ],
                'created_time' => '2018-01-03 12:45:32'
            ],
            [
                'store_id' => '1',
                'customer_id' => '1',
                'customer_name' => '还袋子',
                'customer_head' => '1.jpg',
                'comment_id' => '1',
                'comment_score' => '5',
                'comment_content' => '这里是评论内容, 很长很长',
                'comment_recommend_goods' => [
                    '评论',
                    '推荐',
                    '商品'
                ],
                'comment_img' => [
                    '1.jpg',
                    '2.jpg',
                    '3.jpg'
                ],
                'created_time' => '2018-01-03 12:45:32'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 附近商家添加评论
     *
     * 用户端APP附近商家添加评论
     *
     * @Post("api/customer/store/info/near")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_id",
     *         description="商家ID",
     *         type="string",
     *         required=true,
     *         default="1"
     *     )
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function createStoreComment(Request $request)
    {
        $data = [
            'store_id' => '1',
            'store_name' => '星巴克',
            'store_logo' => '1.png',
            'store_score' => '4.9',
            'store_avg_pay' => '13.6',
            'store_comment_num' => '20',
            'store_taste_score' => '4.6',
            'store_service_score' => '4.6',
            'store_environment_score' => '4.6',
            'store_package_score' => '4.6',
            'store_service_start_time' => '4.6',
            'store_service_end_time' => '4.6',
            'store_address' => '东圃/车陂',
            'store_phone' => '13800138001',
            'store_longitude' => '37.96',
            'store_latitude' => '22.63',
            'store_service_facility' => [
                '包厢',
                '轮椅',
                '电梯'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 附近商家推荐菜品
     *
     * 用户端APP附近商家推荐菜品
     *
     * @Post("api/customer/near/store/recommend/goods")
     * @Version({"v1"})
     * @Parameters({
     *     @Parameter(
     *         "store_id",
     *         description="商家ID",
     *         type="string",
     *         required=true,
     *         default="1"
     *     )
     * })
     *
     * @Response(200, body={"code":0, "message": "", "data"=""})
     */
    public function storeGoodsRecommend(Request $request)
    {
        $data = [
            'store_id' => '1',
            'store_name' => '星巴克',
            'store_logo' => '1.png',
            'store_score' => '4.9',
            'store_avg_pay' => '13.6',
            'store_comment_num' => '20',
            'store_taste_score' => '4.6',
            'store_service_score' => '4.6',
            'store_environment_score' => '4.6',
            'store_package_score' => '4.6',
            'store_service_start_time' => '4.6',
            'store_service_end_time' => '4.6',
            'store_address' => '东圃/车陂',
            'store_phone' => '13800138001',
            'store_longitude' => '37.96',
            'store_latitude' => '22.63',
            'store_service_facility' => [
                '包厢',
                '轮椅',
                '电梯'
            ]
        ];
        return $this->returnJson(0, 'success', $data);
    }
}
