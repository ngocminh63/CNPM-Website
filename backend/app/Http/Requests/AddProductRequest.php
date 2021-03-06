<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'code' => 'required | unique:products,code',
            'name' => 'required',
            'price' => 'required | integer',
            'image' => 'required',
            'categories_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'code.required' => 'Bạn chưa nhập mã sản phẩm',
            'code.unique' => 'Mã sản phẩm đã tồn tại',
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'price.required' => 'Bạn chưa nhập giá sản phẩm',
            'price.integer' => 'Giá sản phẩm chỉ có ký tự số',
            'image.required' => 'Ảnh sản phẩm không được để trống',
            'categories_id' => 'Chọn lại trường danh mục sản phẩm'
        ];
    }
}
