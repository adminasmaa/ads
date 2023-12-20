<?php

namespace App\Http\Requests\hr;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
    if ($this->method() == 'POST'){
        // dd($this->account_name[0]);
        return [
            'ar_name'=>['required','string','max:255','regex:/\p{Arabic}+/u'],
            'en_name'=>['required','string','regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/','max:255',new Uppercase],
            'user_name'=>['required','string','max:255'],
            'email'=>['sometimes','nullable',Rule::unique('hr_employees')->ignore($this->employee)],
            'password'=>[ 'required','confirmed'],
            'cid'=>['required','min_digits:14','max_digits:14',Rule::unique('hr_employees')->ignore($this->employee),'integer'],
            'birthDate'=>['required'],
            'pass_number'=>['required','min_digits:14','max_digits:14',Rule::unique('hr_employees')->ignore($this->employee),'integer'],
            'user_img'=>['required'],
            'cid_img'=>['required'],
            'pass_img'=>['sometimes'],
            'pass_date'=>['sometimes'],
            'jobTitle'=>['sometime'],
            'type'=>['sometimes'],
            'date_expiry'=>['sometimes'],
            'permit_img'=>['sometimes'],
            'start_date'=>['sometimes'],
            'date_of_hiring'=>['required'],
            'salary'=>['sometimes'],
            'sal_per_work'=>['sometimes'],
            'status_note'=>['sometimes'],
            'qual_img'=>['sometimes'],
            'work_time_from'=>['nullable'],
            'work_time_to'=>['nullable','after:work_time_from','required_with:work_time_from'],
            'Living'=>['sometimes'],
            'home_address'=>['sometimes'],


            'bank_account'=>['sometimes'],

            'account_name.0'=>['sometimes'],
            'account_number.0'=>['required_with:account_name.0'],
            'account_details.0'=>['required_with:account_name.0'],
            'account_name.1'=>['sometimes'],
            'account_number.1'=>['required_with:account_name.1'],
            'account_details.1'=>['required_with:account_name.1'],
            'addr_emp'=>['sometimes'],
            'cid_address'=>['sometimes','min_digits:14','max_digits:14','nullable',Rule::unique('hr_employees')->ignore($this->employee)],
            'phone_one'=>['sometimes','numeric','nullable',Rule::unique('hr_employees')->ignore($this->employee)],
            'phone_two'=>['sometimes','numeric','nullable',Rule::unique('hr_employees')->ignore($this->employee)],
            'phones.*' =>['sometimes','nullable','numeric'],

           'job_title_id'=>['required'],
           'branch_id'=>['required'],
           'qual_id'=>['sometimes'],
           'bank_id'=>['sometimes'],
           'profession_id'=>['required'],
           'nation_id'=>['sometimes'],
           'emp_state_id'=>['required'],
           'banks'=>['sometimes'],
           'uniform'=>['sometimes'],
           'type_role'=>['required']
         ];
         }elseif ($this->method() == 'PUT'){
            return [
            'ar_name'=>['required','string','max:255'],
            'en_name'=>['required','string','regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)?$/','max:255',new Uppercase],
            'user_name'=>['required','string','max:255'],
            'email'=>['sometimes','nullable',Rule::unique('hr_employees')->ignore($this->employee)],
            'password'=>[ 'sometimes'],
            'cid'=>['required','min_digits:14','max_digits:14',Rule::unique('hr_employees')->ignore($this->employee),'integer'],
            'birthDate'=>['required'],
            'pass_number'=>['sometimes','min_digits:14','max_digits:14','integer',Rule::unique('hr_employees')->ignore($this->employee)],
            'pass_date'=>['sometimes'],
            'jobTitle'=>['sometime'],
            'type'=>['sometimes'],
            'date_expiry'=>['sometimes'],
            'start_date'=>['sometimes'],
            'date_of_hiring'=>['required'],
            'salary'=>['sometimes'],
            'sal_per_work'=>['sometimes'],
            'status_note'=>['sometimes'],
             'work_time_from'=>['nullable'],
            'work_time_to'=>['nullable','after:work_time_from','required_with:work_time_from'],
            'Living'=>['sometimes'],
            'home_address'=>['sometimes'],


            'bank_account'=>['sometimes'],
            'account_name.0'=>['sometimes'],
            'account_number.0'=>['required_with:account_name.0'],
            'account_details.0'=>['required_with:account_name.0'],
            'account_name.1'=>['sometimes'],
            'account_number.1'=>['required_with:account_name.1'],
            'account_details.1'=>['required_with:account_name.1'],

            'addr_emp'=>['sometimes'],
            'cid_address'=>['sometimes','min_digits:14','max_digits:14','nullable',Rule::unique('hr_employees')->ignore($this->employee)],
            'phone_one'=>['sometimes','numeric','nullable',Rule::unique('hr_employees')->ignore($this->employee)],
            'phone_two'=>['sometimes','numeric','nullable',Rule::unique('hr_employees')->ignore($this->employee)],
            'phones.*' =>['sometimes','nullable','numeric'],
           'job_title_id'=>['required'],
           'branch_id'=>['required'],
           'qual_id'=>['sometimes'],
           'bank_id'=>['sometimes'],
           'profession_id'=>['required'],
           'nation_id'=>['sometimes'],
           'emp_state_id'=>['required'],
           'banks'=>['sometimes'],
           'uniform'=>['sometimes'],
           'type_role'=>['required']
         ];
         }
    }
    public function messages(){
        return [
        'en_name.regex'=>'هدا الحقل لابد ان يكون حروف كابتل',

        'work_time_to.after'=>'وقت العمل الى يجب انا يكون بعد وقت العمل من',
        ];
    }


    public function withValidator($validator)
    {
            $validator->after(function ($validator) {
                if ($validator->failed()) {
                    $validator->errors()->add('method', $this->method()); // handle your new error message here
                }
            });
    }
}
