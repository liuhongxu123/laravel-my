<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 12:00
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class SetBankCardInfoRequest extends FormRequest {

    public function auhtorize () {
        return true;
    }

    public function rules () {
        return [
            'name' => 'required',
            'account' => 'required',
            'bank_cat' => 'requirednm n '
        ];
    }
}