<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriptionsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           
           // 'img' => ['required'],
            'msg_phone' => ['required','numeric'],
            'call_phone' => ['required','numeric'],
            'name' => ['required', 'regex:/^[\p{L}\p{M}\s.\-]+$/u'],
            

            //,Rule::unique('subscriptions')->ignore($this->subscription)
        ];

    }

    public function messages()
    {
        return [
            'name.regex' => 'يجب ادخاله حروف فقط   ',
           // 'img.required' => 'يجب تحميل ملف الصورة   ',
            'msg_phone.required' => 'يجب ادخال رقم مراسلة   ',
            'call_phone.required' => 'يجب ادخال رقم اتصال   ',
        ];
    }

}
