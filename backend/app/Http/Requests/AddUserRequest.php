<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email' => 'required | email | unique:users,email',
            'password' =>'required | min:4',
            'fullname' => 'required | max: 255',
            'phone' => 'required | min:10 | max: 11',
            'address' => 'required'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Không đúng định dạng email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải lớn hơn 4 ký tự',
            'fullname.required' => 'Tên người dùng không được để trống',
            'fullname.max' => 'Tên người dùng không được quá 255 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.min' => 'số điện thoại 10 đến 11 số',
            'phone.max' => 'số điện thoại 10 đến 11 số',
            'address.required' => 'Địa chỉ không được để trống'

        ];
    }
}
