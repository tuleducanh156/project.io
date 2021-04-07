<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|max: 500',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'required'=>': không được để trống name',
            'max'=>':  không được qúa max ký tự',
            'mines'=>':file định dạng không đúng',

        ];
    }
}
