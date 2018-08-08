<?php

namespace App\Http\Controllers\Customer\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @Resource("地址")
 */
class AdressController extends Controller
{
 
    /**
     * 用户收货地址列表(token)
     *
     * 1/男; 2/女
     * 
     * @Get("api/customer/addreses")
     * @Version("v1")
     */
    public function index()
    {
        $data = [
            [
                'address_id' => 1,
                'address_name' => '这里是收货地址',
                'address_desc' => '门牌号',
                'customer_name' => '张三',
                'customer_sex' => 1,
                'customer_phone' => 13800138001,
            ],
            [
                'address_id' => 1,
                'address_name' => '这里是收货地址',
                'address_desc' => '门牌号',
                'customer_name' => '张三',
                'customer_sex' => 1,
                'customer_phone' => 13800138001,
            ],
            [
                'address_id' => 1,
                'address_name' => '这里是收货地址',
                'address_desc' => '门牌号',
                'customer_name' => '张三',
                'customer_sex' => 1,
                'customer_phone' => '13800138001',
            ]
        ];

        return $this->returnJson(0, 'success', $data);
    }

    /**
     * 添加收货地址
     *
     * @Post("api/customer/addreses/create")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "customer_name",
     *         description="收货人姓名",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "customer_sex",
     *         description="性别",
     *         type="int",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "customer_phone",
     *         description="电话",
     *         type="array",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "address_name",
     *         description="地址名",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "address_desc",
     *         description="门牌号",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     * })
     * 
     */
    public function store()
    {
        return $this->returnJson(0, 'success', $data);
        
    }

    /**
     * 收货地址详情
     *
     * @Get("api/customer/addreses/detail")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "address_id",
     *         description="地址ID",
     *         type="string",
     *         required=true,
     *         default=""
     *     )
     * })
     * 
     */
    public function detail()
    {
        return $this->returnJson(0, 'success', $data);
        
    }

    /**
     * 修改收货地址
     *
     * @Post("api/customer/addreses/update")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "customer_name",
     *         description="收货人姓名",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "customer_sex",
     *         description="性别",
     *         type="int",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "customer_phone",
     *         description="电话",
     *         type="array",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "address_name",
     *         description="地址名",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     *     @Parameter(
     *         "address_desc",
     *         description="门牌号",
     *         type="string",
     *         required=true,
     *         default=""
     *     ),
     * })
     * 
     */
    public function update()
    {
        return $this->returnJson(0, 'success', $data);
        
    }

    /**
     * 删除收货地址
     *
     * @Post("api/customer/address/destroy")
     * @Version("v1")
     * @Parameters({
     *     @Parameter(
     *         "address_id",
     *         description="地址ID",
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
