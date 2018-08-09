<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Resource("用户APP-收藏")
 */
class CollectController extends Controller
{
    /**
     * 收藏列表(token)
     *
     * @Get("customer/collects")
     * @Version("v1")
     */
    public function collects()
    {
        $data = [
            [
                'collect_id' => '1',
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
                'collect_id' => '1',
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
           
        ];
        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 删除收藏
     *
     * @Post("api/customer/collect/delete")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "collect_id",
     *         description="收藏ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     * 
     */
    public function destroy()
    {
        return $this->returnJson(0, 'success', $data);
    }
}
