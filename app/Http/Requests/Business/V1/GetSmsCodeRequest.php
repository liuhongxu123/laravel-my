<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 9:46
 */
namespace App\Http\Requests\Business\V1;
use Dingo\Api\Http\FormRequest;

class GetSmsCodeRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'mobile' => 'require|regex:/^\d{10,11}$/',
            'sms_type' => 'required'
        ];
    }
}