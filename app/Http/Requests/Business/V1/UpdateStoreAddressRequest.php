<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/14
 * Time: 9:55
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class UpdateStoreAddressRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'store_id' => 'required|integer',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required'
        ];
    }
}