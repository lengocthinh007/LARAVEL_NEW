<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use App\Http\Requests\Userrequest;
use Illuminate\Support\Str;


class AdminUserController extends Controller
{
    public function index(){
    	$user = User::whereraw(1);
    	$user = $user->orderBy('id','DESC')->get();
    	$viewdata = [
    		'user'=>$user,
    	];
    	return view ('Backend.User.list',$viewdata);
    }

      public function getadd()
      {
    	   return view('Backend.User.add');
      }
     	public function postadd(Userrequest $request){
   	     $this-> InsertOrupdate($request);
   	     $notification = array(
                'message' => 'Thêm Thành Công!',
                'alert-type' => 'success'
            );
   		 return redirect()->intended('admin/user/')->with($notification);
   		
   	}

     public function getedit($id){
        $data= User::find($id);
                return view('Backend.User.edit',compact('data'));
       }

       public function postedit(Userrequest $request,$id){
                  
         $this-> InsertOrupdate($request,$id);
          $notification = array(
                'message' => 'Cập Nhật Thành Công!',
                'alert-type' => 'success'
            );
         return redirect()->intended('admin/user/')->with($notification);
    }
    
   	 public function InsertOrupdate($request,$id=""){
            $User = new User;
            if($id) {
                $User = User::find($id);
            }
        $User->name = $request->name;
        $User->password =  $request->password;
        $User->email = $request->email;
        $User->phone = $request->phone;
        $User->address = $request->address;
        $User->active = $request->active;
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
      }

       public function delete($id){
        $User = User::find($id);
        $User->delete($id);
        $notification = array(
                'message' => 'Xóa Thành Công!',
                'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
     
}
