<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryPost extends FormRequest
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
            'category_name'=>'required|unique:categories',
        ];
    }
    // Custom message
    public function messages()
    {
        return [
            'category_name.required'=>'This is required field',
            'category_name.unique'=>'This category already exist',
        ];
    }
}
