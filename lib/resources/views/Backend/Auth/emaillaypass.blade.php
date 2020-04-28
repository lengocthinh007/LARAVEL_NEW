@extends('Frontend.master')
@section('title','Lấy lại password')
@section('main')
<div class="container">
      <div class="row justify-content-center">
<div class="col-md-8 col-md-offset-2" style="margin-top: 50px">
   @include('errors.note2')
 <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Vui lòng nhập mail lấy lại mật khẩu</label>
                    <input required type="email" placeholder="email" name="email" class="form-control"
                    value=""
                    >
                  </div>
                  <button type="submit" class="btn btn-primary">Xác Nhận</button>
             
               {{csrf_field()}}
            </form>
          </div>
    </div>
  </div>
@stop
