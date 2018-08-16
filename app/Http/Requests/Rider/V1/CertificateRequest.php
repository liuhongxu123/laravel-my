<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/7/30
 * Time: 9:52
 */

namespace App\Http\Requests\Rider\V1;


use Dingo\Api\Http\FormRequest;

class CertificateRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'name' => 'required',
            'mobile' => 'required|regex:/^\d{10,11}$/',
            'email' => 'required|email',
            'provice' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'safe_code' => 'required',
            'driver_permit' => 'required',
            'address_permit' => 'required',
            'car_insurance' => 'required',
            'bank_code' => 'required',
            'bank_account' => 'required',
            'cardholder' => 'required',
            'card_type' => 'required',
        ];
    }
}