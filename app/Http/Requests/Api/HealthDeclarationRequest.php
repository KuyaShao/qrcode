<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class HealthDeclarationRequest extends FormRequest
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
            'q1a'=>'required',
            'q1b'=>'required',
            'q1c'=>'required',
            'q1d'=>'required',
            'q1e'=>'required',
            'q1f'=>'required',
            'q1g'=>'required',
            'q2'=>'required',
            'q3'=>'required',
            'q4'=>'required',
            'q5'=>'required',
            'q5a'=>'',
            'q6'=>'required',
            'q7'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'q1a.required'=>'Question 1A was required',
            'q1b.required'=>'Question 1B was required',
            'q1c.required'=>'Question 1C was required',
            'q1d.required'=>'Question 1D was required',
            'q1e.required'=>'Question 1E was required',
            'q1f.required'=>'Question 1F was required',
            'q1g.required'=>'Question 1G was required',
            'q2.required'=>'Question 2 was required',
            'q3.required'=>'Question 3 was required',
            'q4.required'=>'Question 4 was required',
            'q5.required'=>'Question 5 was required',
            'q6.required'=>'Question 6 was required',
            'q7.required'=>'Question 7 was required',
        ];
    }
}
