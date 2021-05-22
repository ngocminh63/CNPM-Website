<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
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
            'cate_name' => 'required | unique:categories,cate_name',
        ];
    }
    public function messages()
    {
        return [
            'cate_name.required' => 'Tên danh mục không được để trống',
            'cate_name.unique' => 'Danh mục đã tồn tại'
        ];
    }
}
