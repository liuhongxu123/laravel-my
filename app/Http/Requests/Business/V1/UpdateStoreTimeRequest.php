<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/13
 * Time: 17:27
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class UpdateStoreTimeRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'store_id' => 'required|integer',
            'work_day' => 'required',
            'work_time' => 'required'
        ];
    }
}