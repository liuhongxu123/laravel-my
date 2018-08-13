<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/13
 * Time: 17:43
 */

namespace App\Http\Requests\Business\V1;

use Dingo\Api\Http\FormRequest;

class UploadStoreImgRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'store_id' => 'required|integer',
            'store_img' => 'required'
        ];
    }
}