<?php
/**
 * Created by PhpStorm.
 * User: dev-t
 * Date: 2018/8/8
 * Time: 10:48
 */

namespace App\Http\Requests\Business\V1;


use Dingo\Api\Http\FormRequest;

class PostStoreInfoRequest extends FormRequest {

    public function authorize () {
        return true;
    }

    public function rules () {
        return [
            'store_name' => 'required|max:20',
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'staff_size' => 'required',
            'business_cat' => "required",
            'link_name' => 'required',
            'link_tel' => 'required|regex:/^\d{10,11}$/',
            'email' => 'required|email',
            'credit_card_name' => 'required',
            'credit_card_account' => 'required',
            'bank_card_name' => 'required',
            'bank_card_account' => 'required',
            'bank_cat' => 'required',
            'registration_name' => 'required',
            'company_address' => 'required',
            'tax_rate_area' => 'required',
            'tax_registration_certificate' => 'required',
            'tax_reta_set' => 'required',
            'read_and_confirm' => 'required|digits:1'
        ];
    }
}