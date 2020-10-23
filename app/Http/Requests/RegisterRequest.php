<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstName'=>'bail|required|max:255',
            'middleName'=>'bail|required|max:255',
            'lastName'=>'bail|required|max:255',
            'password'=>'bail|confirmed|required|min:8',
            'privacy'=>'required',
            'email'=>'bail|required|unique:users'
        ];
    }

    public function messages()
    {
        return[
           'firstName.required'=>'First Name was required please fill it up!',
           'middleName.required'=>'Middle Name was required please fill it up!',
           'lastName.required'=>'Last Name was required please fill it up!',
           'password.required'=>'Password was required please fill it up!',
           'email.required'=>'Email Address was required please fill it up!'
        ];
    }
}
