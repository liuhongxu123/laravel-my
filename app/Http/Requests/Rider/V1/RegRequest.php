<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 9:39
 */

namespace App\Http\Requests\Rider\V1;

use Dingo\Api\Http\FormRequest;

class RegRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'name' => 'required',
            'mobile' => 'required|regex:/^\d{10,11}$/',
            'password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,32}$/',
            'verify_code' => 'required'
        ];
    }
}