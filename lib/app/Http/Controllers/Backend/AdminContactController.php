<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Contact;
use Carbon\Carbon;

class AdminContactController extends Controller
{
     public function getcontact()
      {
      	return view('Frontend.contact');
      }
       public function postcontact(Request $request)
      {
      	if($request->ajax())
            {
                  $data = $request->except('_token');
                  $data['created_at'] = $data['updated_at'] = Carbon::now();
                  Contact::insert($data);

                  return "Gửi Thành Công";
            }
      }
}
