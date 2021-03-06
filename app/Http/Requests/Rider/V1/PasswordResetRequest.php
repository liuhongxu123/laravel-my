<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 9:45
 */

namespace App\Http\Requests\Rider\V1;


use Dingo\Api\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class PasswordResetRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'old_password' => 'required',
            'new_password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,32}$/|confirmed',
            'new_password_confirmation' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,32}$/'
        ];
    }
}