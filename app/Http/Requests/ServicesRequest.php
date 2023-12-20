<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServicesRequest extends FormRequest
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
           
            'name' => ['required', 'regex:/^[\p{L}\p{M}\s.\-]+$/u'],
            

        ];

    }

    public function messages()
    {
        return [
            'name.regex' => 'يجب ادخاله حروف فقط   ',
        ];
    }

}
