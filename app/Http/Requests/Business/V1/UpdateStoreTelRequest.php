<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/14
 * Time: 9:51
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class UpdateStoreTelRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'store_id' => 'required',
            'store_tel' => 'required'
        ];
    }
}