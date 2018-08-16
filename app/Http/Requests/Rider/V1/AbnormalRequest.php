<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/1
 * Time: 17:34
 */

namespace App\Http\Requests\Rider\V1;


use Dingo\Api\Http\FormRequest;

class AbnormalRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'cat_id' => 'required',
            'content' => 'required|max:300',
            'photo.*' => 'required'
        ];
    }
}