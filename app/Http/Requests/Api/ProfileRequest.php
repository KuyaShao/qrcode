<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'birthday'=>'required',
            'contact_number'=>'bail|required|numeric|min:11',
            'street'=>'required',
            'business_name'=>'',
            'business_type'=>'',
            'barangay'=>'required',
            'city'=>'required',
            'province'=>'required',
        ];
    }
}
