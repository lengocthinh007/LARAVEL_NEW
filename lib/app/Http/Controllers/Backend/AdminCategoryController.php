<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Http\Requests\caterequest;

class AdminCategoryController extends Controller
{
      public function getaddcate(){
    	$parent = Category::select('id','name','parent_id')->where('parent_id',0)->get()->toArray();

    	return view('Backend.Category.addcate',compact('parent'));
    }
     	public function postaddcate(caterequest $request){
   	     $this-> InsertOrupdate($request);
   	     $notification = array(
                'message' => 'Thêm Thành Công!',
                'alert-type' => 'success'
            );
   		 return redirect()->intended('admin/category/')->with($notification);
   		
   	}
   	 public function listcate(){
    $data = Category::select('id','name','parent_id')->orderBy('id','DESC')->get()->toArray();
   		return view('Backend.Category.listcate',compact('data'));
    }
      public function getdelete(Request $request,$id){
      	if($request->ajax())
      	 {
      	 	$Product= Product::where('cate_id',$id)->count();
	        $parent = Category::where('parent_id',$id)->count();
	        if($parent==0 && $Product==0) 
	          {
		         Category::destroy($id);

		         $notification = array(
		                'message' => 'Xóa Thành Công!',
		                'alert-type' => 'success'
		            );
		           return $id;
		       }
		       else
		       {
		       
		        	return "fail";
		       }
          }
      }
        public function getedit($id){
      $data=Category::findOrFail($id)->toArray();
      // $parent = cates::select('id','name','parent_id')->get()->toArray();
      $parent = Category::where('id', '<>', $id)->where('parent_id',0)->get()->toArray();
      return view('Backend.Category.editcategory',compact('parent','data'));
    }
     public function postedit(caterequest $request,$id){
      // $url_segment = \Request::segment(4);
      //  $this->validate($request,
      //       [
      //           'name'=>'unique:cates,name,'.$url_segment.',id'
      //       ],
      //       [
      //           'name.unique'=>'Tên danh mục đã bị trùng'
                  
      //       ]);
        $this-> InsertOrupdate($request,$id);
         $notification = array(
                'message' => 'Cập Nhật Thành Công!',
                'alert-type' => 'success'
            );
       return redirect()->intended('admin/category/')->with($notification);
     
    }
     public function InsertOrupdate($request,$id=""){
      $category = new Category;
      if($id)  $category = Category::find($id);
      $category->name = $request->name;
      $category->alias = changeTitle($request->name);
      $category->parent_id = $request->parent_id;
      $category->keywords = $request->keywords;
      $category->description = $request->description;
      $category->save();
     }
}
