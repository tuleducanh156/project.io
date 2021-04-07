<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|max:250',
            'price'=> 'required|integer',
            'category'=>'required',
            'brand'=>'required',
            'sale'=>'required',
            'numsale'=>'integer|max:20',
            'namecompany'=>'required',
            // 'image'=>'required',
            'detail'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute không được để trống ô nao cả',
        ];
    }
    // public function attribute()
    // {
    //     return [
    //         'name'=>'Name',
    //         'price'=>'price'
    //         'category'=>'category',
    //         'brand'=>'required',
    //         'sale'=>'required',
    //         'numsale'=>'integer|max:20',
    //         'namecompany'=>'required',
    //         'image'=>'required',
    //         'detail'=>'required'
    //     ];
    // }
}
