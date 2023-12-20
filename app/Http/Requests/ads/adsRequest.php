<?php

namespace App\Http\Requests\ads;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class adsRequest extends FormRequest
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
        $array1 = [
            'name' => ['required', 'string', 'max:255', 'regex:/\p{Arabic}+/u'],

            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'img1' => [$this->method() == 'PUT' ? 'sometimes' : 'required'],

        ];

        return $array1;
    }

    public function messages()
    {
        return [
            'required_without_all' => 'يجب ادخال واحد من العناصر[" اسم الحملة"," نوع الحملة","تاريخ بداية الحملة ","تاريخ نهاية الحملة "]',
            'name.regex' => 'يجب ادخله بالحروف باللغة  العربية',

        ];
    }

}