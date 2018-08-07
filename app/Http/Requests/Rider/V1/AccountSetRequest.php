<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 11:20
 */

namespace App\Http\Requests\Rider\V1;


use Dingo\Api\Http\FormRequest;

class AccountSetRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'bank_code' => 'required',
            'bank_account' => 'required',
            'cardholder' => 'required',
            'card_type' => 'required'
        ];
    }
}