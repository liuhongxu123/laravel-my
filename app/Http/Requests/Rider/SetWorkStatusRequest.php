<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/3
 * Time: 16:46
 */

namespace App\Http\Requests\Rider;


use Dingo\Api\Http\FormRequest;

class SetWorkStatusRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'work_status' => 'required'
        ];
    }
}