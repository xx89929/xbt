<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'doctor_id' => 'required|integer',
            'pro_num' => 'required|integer',
            'store_id' => 'required|integer',
            'pro_id' => 'required|integer',
            'take_name' => 'required',
            'take_phone' => 'required',
            'take_address' => 'required',
            'pay_way' => 'required',
        ];
    }

    public function messages(){
        return [
            'doctor_id.required' => '参数错误',
            'pro_num.required' => '数量不正确',
            'store_id.required' => '参数错误',
            'pro_id.required' => '参数错误',
            'take_name.required' => '收货人名称必填',
            'take_phone.required' => '收货人电话必填',
            'take_address.required' => '收货人地址必填',
            'pay_way.required' => '付款方式必选',
        ];
    }
}
