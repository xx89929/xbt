<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderPayShow extends FormRequest
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
            'pro_id' => 'required',
            'store_id' => 'required',
            'doctor_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'doctor_id.required' => '医生必须选择',
            'store_id.required' => '店铺必须选择',
            'pro_id.required' => '参数错误',
        ];
    }
}
