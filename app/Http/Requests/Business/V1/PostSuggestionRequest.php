<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 14:03
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class PostSuggestionRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'cat_id' => 'required',
            'content' => 'required|max:500',
            'photo.*' => 'required|file|image'
        ];
    }
}