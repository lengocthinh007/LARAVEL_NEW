<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Userrequest extends FormRequest
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
             'name'=>'required|unique:users,name,'.$this->segment(4).',id',
                     'password'=>'required',
                     'email'=>'required',
                     'phone'=>'required',
                     'address'=>'required',
                     'img'=>'image',
                     'active'=>'required'
        ];
    }
     public function messages(){
        return[
                    'name.required'=>'Bạn chưa nhập tên',
                    'name.unique'=>'Tên bị trùng',
                    'password.required'=>'Bạn chưa nhập mật khẩu',
                    'active.required'=>'Chưa chọn',
                    'img.image'=>'Chỉ chọn ảnh',
                    'email.required'=>'Bạn chưa nhập email',
                    'phone.required'=>'Bạn chưa nhập số sdt',
                    'address.required'=>'Bạn chưa nhập địa chỉ',

        ];
    }
}
