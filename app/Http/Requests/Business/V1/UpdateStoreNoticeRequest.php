<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/14
 * Time: 10:00
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class UpdateStoreNoticeRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'store_id' => 'required|integer',
            'notice' => 'required'
        ];
    }
}