<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/31
 * Time: 13:38
 */

namespace App\Http\Requests\Rider\V1;


use Dingo\Api\Http\FormRequest;

class LoginRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'account' => 'required|regex:/^\d{10,11}$/',
            'password' => 'required'
        ];
    }
}