<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Product_img;
use Illuminate\Support\Str;
use App\Http\Requests\productrequest;
use Image;

class AdminProductController extends Controller
{
     public function listProduct(Request $request){
        $data = Product::select('id','name','price','cate_id','pro_total_rating','pro_total_number','created_at','pro_active','pro_hot','pro_sale','image','pro_number');
         $cate = Category::select('id','name','parent_id')->get()->toArray();
         $data = $data->orderBy('id','DESC')->get();
        return view('backend.Product.listproduct',compact('data','cate'));
    }
       public function getadd(){
    	$cate = Category::select('id','name','parent_id')->get()->toArray();
    	return view('Backend.Product.addproduct',compact('cate'));
    }
     public function postadd(productrequest $request){
    	
    	 $this-> InsertOrupdate($request);
    	 $notification = array(
                'message' => 'Thêm Thành Công!',
                'alert-type' => 'success'
            );
     	 return redirect()->intended('admin/product/')->with($notification);
    }
    public function postedit(productrequest $request,$id){
                  
         $this-> InsertOrupdate($request,$id);
         return redirect()->intended('admin/product/')->with(['level'=>'success','message'=>'Sửa thành công']);
    }
      public function getdelete(Request $request,$id){
     
        $product_img =  Product_img::select('image')->where('product_id',$id)->get()->toArray();
        if(!empty($product_img)){
        foreach ( $product_img as $value) {
             unlink("public/HinhDetails/".$value["image"]);
        }
        }
        $product = Product::find($id);
      
        if(isset($product->image)) unlink("public/Hinh/".$product->image);
         $product->delete($id);
          return $id;
       
      }
       public function getedit($id){
        $cate = Category::select('id','name','parent_id')->get()->toArray();
        $data= Product::find($id);
                return view('Backend.Product.editproduct',compact('cate','data'));
       }
    
       public function getdelimg(Request $request,$id){
        if($request->ajax()){
            $idHinh= $id;
            $image_detail= Product_img::find($idHinh);
            if(!empty($image_detail)){
                if(file_exists("public/HinhDetails/small/".$image_detail->image)){
                     unlink("public/HinhDetails/small/".$image_detail->image);
                     unlink("public/HinhDetails/large/".$image_detail->image);
                }
                $image_detail->delete();
            }
            return "OK";
        }

       }
         public function InsertOrupdate($request,$id=""){
            $product = new Product;
            if($id) {
                $product = Product::find($id);
            }
        $product->name = $request->name;
        $product->alias = changeTitle($request->name);
        $product->price = $request->price;
        $product->pro_sale = $request->Sale;
        $product->pro_number = $request->pro_number;
        $product->pro_content = $request->content ?  $request->content : '';
        $product->description = $request->description ?  $request->description : '';
        $product->cate_id = $request->cate;
          if($request->img){
             if(isset($product->image)){
                     unlink("public/Hinh/".$product->image);
                }
            $file = $request->File('img');
            $filename = $file->getClientOriginalName();
            $Hinh = $filename;
            while(file_exists("public/Hinh/".$Hinh))
            {
                $Hinh = Str::random(4)."_".$filename;
            }
            $file->move("public/Hinh",$Hinh);
            $product->image = $Hinh;
             }
        $product->save();
         }

           public function action($action,$id){
            if($action){
                $product = Product::find($id);
                switch ($action) {
                    case 'active':
                        $product->pro_active = $product->pro_active ? 0 : 1;
                        break;
                    case 'hot':
                        $product->pro_hot = $product->pro_hot ? 0 : 1;
                        break;    
                }
                $product->save();
            }
            return redirect()->back();
        }
          public function addimg(Request $request,$id)
          {
                  
                    $result = array();
                    if($request->file('images'))
                    {
                       foreach ($request->file('images') as $file) 
                          {
                            $product_img = new Product_img();
                            if(isset($file))
                             {
                                $duoi = $file->getClientOriginalExtension();
                                 if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
                                    {
                                        $result[] = array(
                                            'id' => '',
                                            'img' => 'hinhloi.png',
                                        );
                                    }
                                 else
                                   {
                                      $filename = $file->getClientOriginalName();
                                      $Hinh = $filename;
                                      while(file_exists("public/HinhDetails/small/".$Hinh))
                                          {
                                              $Hinh = rand() . '.' . $filename;
                                          }
                                         
                                      $product_img->image = $Hinh;
                                      $product_img->product_id=$id;
                                      // $file->move("public/HinhDetails",$Hinh);
                                      $large_path='public/HinhDetails/large/'.$Hinh;
                                      $small_path='public/HinhDetails/small/'.$Hinh;
                                      Image::make($file->getRealPath())->resize(150,150)->save($small_path);
                                      Image::make($file->getRealPath())->resize(300,300)->save($large_path);
                                      $product_img->save();
                                       $result[] = array(
                                            'id' => $product_img->id,
                                            'img' => $product_img->image,
                                        );
                                    }
                              }

                           }
                          
                        return json_encode($result);
                    }
              
          }

      public function get_imgdetails(Request $request)
       {
          if($request->ajax())
          { 
             $id = $request->id;
             $data =  Product_img::select('id','image')->where('product_id',$id)->get();
             $result = array();
                if($data)
                  {
                    foreach ($data as $row) {
                        $result[] = array(
                        'id' => $row->id,
                        'img' => $row->image,
                    );
                    }
                  }
              return json_encode($result);
          }
       }
}
