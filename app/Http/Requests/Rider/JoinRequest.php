<?php
/**
 * 骑手入驻验证类
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/2
 * Time: 14:54
 */

namespace App\Http\Requests\Rider;


use Dingo\Api\Http\FormRequest;

class JoinRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'desc' => 'max:50',
            'read_and_confirm' => 'required',
            'avatar' => 'required'
        ];
    }

}