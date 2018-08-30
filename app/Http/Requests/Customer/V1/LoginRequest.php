<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/1
 * Time: 17:34
 */

namespace App\Http\Requests\Customer\V1;


use Dingo\Api\Http\FormRequest;

class LoginRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'customer_phone' => 'required',
            'customer_password' => 'required',
        ];
    }
}