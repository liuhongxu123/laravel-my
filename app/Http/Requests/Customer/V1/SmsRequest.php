<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/1
 * Time: 17:54
 */

namespace App\Http\Requests\Customer\V1;


use Dingo\Api\Http\FormRequest;

class SmsRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'mobile' => 'required|regex:/^\d{10,11}$/',
            'sms_type' => 'required|integer'
        ];
    }
}