<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 16:15
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class EditStoreAddressRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'id' => 'required|integer',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required'
        ];
    }
}