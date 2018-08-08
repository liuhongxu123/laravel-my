<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 10:16
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'mobile' => 'required|regex:/^\d{10,11}$/',
            'password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,32}$/',
            'verify_code' => 'required'
        ];
    }
}