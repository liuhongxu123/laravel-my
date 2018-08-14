<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/14
 * Time: 10:08
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class UpdateDeliveryRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'store_id' => 'required|integer',
            'district_zip_code' => 'required'
        ];
    }
}