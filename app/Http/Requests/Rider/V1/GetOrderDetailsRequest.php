<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/3
 * Time: 17:34
 */

namespace App\Http\Requests\Rider\V1;


use Dingo\Api\Http\FormRequest;

class GetOrderDetailsRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'id' => 'required|integer'
        ];
    }
}