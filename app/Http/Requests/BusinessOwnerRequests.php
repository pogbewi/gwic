<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessOwnerRequests extends FormRequest
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
            'title' => 'required',
            'firstname' => 'required ',
            'lastname' => 'required ',
            'phone' => 'required ',
            'businessname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'address_two' => 'nullable',
            'nationality' => 'required ',
            'operation_countries' => 'required',
            'city' => 'required ',
            'gender' => 'required',
            'amount_needed' => 'required',
            'status' => 'required',
            'viewed' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'firstname.required' => 'First Name is required',
            'lastname.required' => 'Last Name is required',
            'phone.required' => 'Phone Number is required',
            'businessname.required' => 'Your Business Name is required',
            'email.required' => 'Email is required',
            'address.required' => 'Your Address is required',
            'nationality.required' => 'Nationality is required',
            'operation_countries.required' => 'Countries of Operation is required',
            'city.required' => 'City is required',
            'gender.required' => 'Gender is required',
            'amount_needed.required' => 'Amount You need in dollar is required',
            'status.required' => 'Status of Business is required',
        ];
    }
}
