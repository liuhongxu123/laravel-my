<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 13:42
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class SetCreditCardInfoRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'name' => 'required',
            'account' => 'required'
        ];
    }
}