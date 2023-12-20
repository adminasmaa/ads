<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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


            'name' => [
                'required', 'string', 'regex:/^[\p{L}\p{M}\s.\-]+$/u',
                Rule::unique('roles')->ignore($this->role)
            ],
            /* 'order'=>['required','numeric','gt:0',Rule::unique('roles')->ignore($this->role)],*/
        ];
    }
    public function messages()
    {
        return [
            'name.regex' => 'هذا الحقل لابد ان يكون حروف فقط ',


        ];
    }

    public function withValidator($validator)
    {

        $validator->after(function ($validator) {

            if ($validator->failed()) {

                $validator->errors()->add('method', $this->method())->add('id', $this->role->id); // handle your new error message here

            }
        });

    }


}
