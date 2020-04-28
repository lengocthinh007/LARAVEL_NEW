<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Mail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

     public function getregister()
    {
        return view('backend.auth.login');
    }
    public function postregister(Request $request)
    {
          $this->validate($request,
            [
                'Name'=>'unique:users,name',
                'Email'=>'unique:users,Email',
            ],
            [
                'Name.unique'=>'Tên người dùng đã bị trùng',
                'Email.unique'=>'Email đã bị trùng'
                  
            ]);
        $user = new User();
        $user->name = $request->Name;
        $user->email = $request->Email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->Password);
        $user->save();
        if($user->id)
        {
            $email=$user->email;
            $code=bcrypt(md5(time().$email));
            $url = route('verify.account',['code'=>$code,'id'=>$user->id]);
            $user->code_active=$code;
            $user->time_active = Carbon::now();
            $user->save();

            $data=[
            'route'=>$url,
            ];

              Mail::send('Backend.Auth.verifyaccount', $data, function ($message) use ($email) {
                 $message->from('lengocthinh006@gmail.com', 'Thinhpro');
                 $message->to($email,$email);
                 $message->subject('Xác Nhận Tài Khoản!');
                 });

            return redirect()->intended('dang-nhap')->with(['level'=>'success','message'=>'Đăng ký thành công']);
        }
            return redirect()->back();
    }

    public function verifyaccount(Request $request)
      {
        $code = $request->code;
        $id = $request->id;
        $checkUser= User::where([
            'code_active'=>$code,
            'id'=>$id
        ])->first();
        if(!$checkUser)
        {
            return redirect('/')->with(['level'=>'danger','message'=>'Đường dẫn xác nhận không tồn tại']);
        }
        $checkUser->active=2;
        $checkUser->save();
        return redirect()->route('User.home')->with(['level'=>'success','message'=>'Xác  nhận tài khoản thành công']);
      }
}
