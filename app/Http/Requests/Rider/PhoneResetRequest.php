<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 9:50
 */

namespace App\Http\Requests\Rider;


use Dingo\Api\Http\FormRequest;

class PhoneResetRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'old_mobile' => 'required|regex:/^\d{10,11}$/',
            'new_mobile' => 'required|regex:/^\d{10,11}$/',
            'verify_code' => 'required'
        ];
    }
}