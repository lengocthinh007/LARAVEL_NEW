<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productrequest extends FormRequest
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
             'name'=>'required|unique:products,name,'.$this->segment(4).',id',
                     'content'=>'required',
                     'price'=>'required|max:10',
                     'Sale'=>'required|max:10',
                     'pro_number'=>'required|max:10',
                     'img'=>'image',
                     'cate'=>'required|not_in:0',
                     'description'=>'required'
        ];
    }
     public function messages(){
        return[
                    'name.required'=>'Bạn chưa nhập tên sản phẩm',
                    'name.unique'=>'Tên sản phẩm đã bị trùng',
                    'content.required'=>'Bạn chưa nhập mô tả',
                    'cate.required'=>'Chưa chọn danh mục',
                     'cate.not_in'=>'Chưa chọn danh mục',
                    'img.image'=>'Chỉ chọn ảnh',
                    'description.required'=>'Chưa nhập mô tả',
                    'price.required'=>'Bạn chưa nhập giá',
                    'price.max'=>'Giới hạn 10 chữ số',
                    'Sale.max'=>'Giới hạn 10 chữ số',
                    'pro_number.max'=>'Giới hạn 10 chữ số',
                    'Sale.required'=>'Bạn chưa nhập giá khuyến mãi',
                    'pro_number.required'=>'Bạn chưa nhập số lượng',

        ];
    }
}
