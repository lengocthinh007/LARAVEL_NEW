<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Transaction;
use App\User;
use App\Http\Requests\passwordrequest;
use Hash;

class Usercontroller extends Controller
{
    public function home()
      {
      	$Transaction = Transaction::where('user_id',get_data_user('web'));
      	$listtransaction=$Transaction;
      	$Transaction=$Transaction->addselect('id','pay_type','total','address','phone','created_at','status')->get();
      	$totaltransaction =$listtransaction->select('id')->count();
      	$totaltransactiondone =$listtransaction->where('status',Transaction::STATUS_DONE)->select('id')->count();

      	$viewdata=[
      		'Transaction'=> $Transaction,
      		'totaltransaction'=>$totaltransaction,
      		'totaltransactiondone'=>$totaltransactiondone
      	];

      	return view('User.home',$viewdata);
      }

      public function getinfor()
      {
      	$data = User::find(get_data_user('web'))->toArray();
      	return view('User.infor',compact('data'));
      }

      public function saveinfor(Request $request)
      {
      	// $user=User::where('id',get_data_user('web'))->update($request->except('_token'));

        $User = User::find(get_data_user('web'));
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone = $request->phone;
        $User->address = $request->address;
          if($request->img){
             if(isset($User->avatar)){
                     unlink("public/Avatar/".$User->avatar);
                }
            $file = $request->File('img');
            $filename = $file->getClientOriginalName();
            $Hinh = $filename;
            while(file_exists("public/Avatar/".$Hinh))
            {
                $Hinh = Str::random(4)."_".$filename;
            }
            $file->move("public/Avatar",$Hinh);
            $User->avatar = $Hinh;
             }
        $User->save();
        $notification = array(
                'message' => 'Cập Nhật Thành Công!',
                'alert-type' => 'success'
            );
      	return redirect()->back()->with($notification);
      }

      public function updatepassword()
      {
      	return view('User.updatepassword');
      }

      public function savepassword(passwordrequest $passwordrequest)
      {
      	if(Hash::check($passwordrequest->Password_old,get_data_user('web','password')))
      	{
      		$user=User::find(get_data_user('web'));
      		$user->password=bcrypt($passwordrequest->Password);
      		$user->save();
      		$notification = array(
                'message' => 'Cập Nhật Thành Công!',
                'alert-type' => 'success'
            );
      		return redirect()->back()->with($notification);
      	}
      	$notification = array(
                'message' => 'Mật khẩu cũ không đúng',
                'alert-type' => 'warning'
            );
      	return redirect()->back()->with($notification);
      }
}
