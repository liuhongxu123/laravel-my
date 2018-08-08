<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 16:15
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class EditStoreNameRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'id' => 'required|integer',
            'store_name' => 'required'
        ];
    }
}