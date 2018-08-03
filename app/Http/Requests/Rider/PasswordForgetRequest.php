<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/3
 * Time: 15:10
 */

namespace App\Http\Requests\Rider;


use Dingo\Api\Http\FormRequest;

class PasswordForgetRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'account' => 'required|regex:/^\d{10,11}$/',
            'verify_code' => 'required',
            'new_password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,32}$/',
        ];
    }
}