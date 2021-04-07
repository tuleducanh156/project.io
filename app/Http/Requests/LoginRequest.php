<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name'=>'required|max: 50',
            'email'=>'required|max:200',
            'password'=> 'required|max:20',
            'phone'=>'required',
            'message'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'required'=>': attribute không được để trống',
            'max'=>': attribute không được quá : max ký tự'
        ];
    }
}
