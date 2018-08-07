<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/6
 * Time: 9:13
 */

namespace App\Http\Requests\Rider\V1;


use Dingo\Api\Http\FormRequest;

class GetSuggestionDetailsRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'id' => 'required'
        ];
    }
}