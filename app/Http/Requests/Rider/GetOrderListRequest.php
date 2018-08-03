<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/3
 * Time: 14:34
 */

namespace App\Http\Requests\Rider;

use Dingo\Api\Http\FormRequest;

class GetOrderListRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'status' => 'required|integer'
        ];
    }

    public function messages(){
        return [
            'status.required' => '订单状态不能为空'
        ];
    }
}