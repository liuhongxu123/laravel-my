<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 9:45
 */

namespace App\Http\Requests\Rider;


use Dingo\Api\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class PasswordResetRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        if ($this->input('is_verify_code', false)) {
            $rules = [
                'account' => 'required|regex:/^\d{10,11}$/',
                'verify_code' => 'required',
                'new_password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,32}$/',
            ];
        }else {
            $rules = [
                'old_password' => 'required',
                'new_password' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,32}$/|confirmed',
                'new_password_confirmation' => 'required|regex:/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,32}$/'
            ];
        }
        return $rules;
    }
}