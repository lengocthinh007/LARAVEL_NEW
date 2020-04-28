<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class passwordrequest extends FormRequest
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
             
                     'Password_confirm'=>'same:Password'
        ];
    }
     public function messages(){
        return[
                    'Password_confirm.same'=>'Mật khẩu xác nhận không đúng'
        ];
    }
}
