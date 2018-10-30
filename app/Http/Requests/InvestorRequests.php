<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvestorRequests extends FormRequest
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

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'firstname.required' => 'First Name is required',
            'lastname.required' => 'Last Name is required',
            'phone.required' => 'Phone Number is required',
            'email.required' => 'Email is required',
            'nationality.required' => 'Nationality is required',
            'gender.required' => 'Gender is required',
            'amount.required' => 'Amount in dollar is required',
        ];
    }
}
